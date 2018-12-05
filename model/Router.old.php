<?php

require "Config.php";

/**
 * The router class
 * Routes to a controller and calls a method
 */

class Router {

    /**
     * the default route
     */
    public $default = ["home", "home"];

    public function __construct() {

        $url = $_SERVER["REQUEST_URI"];

        if(Config::DEV) {
            $url = str_replace(Config::DEV_DIR, "", $_SERVER["REQUEST_URI"]);
        }

        $this->url = $this->parseUrl($url);
    }

    /**
     * parses the url
     *
     * @param string $url the url you want to parse
     * @return array the parsed array
     */
    public function parseUrl(string $url) {
        return explode("/", trim($url, "/"));
    }

    /**
     * routes to the controller and calls the method
     *
     * @return void
     */
    public function route() {

        $controllerName = ucfirst($this->url[0]) . "Controller";
        $file = dirname(__DIR__) . "/controller/" . $controllerName . ".php";

        $method = $this->url[1] ?? $this->default[1];

        if(!file_exists($file) || empty($this->url[0])) {
            $controllerName = ucfirst($this->default[0]) . "Controller";
            $file = dirname(__DIR__) . "/controller/" . $controllerName . ".php";

            $method = $this->default[1];
        }

        require $file;
        $controller = new $controllerName();
        $params = array_slice($this->url, 2);
        $controller->$method(...$params);
    }

    /**
     * sets the default route
     *
     * @param string $controller the controller name without Controller
     * @param string $method the method you want to run
     * @return void
     */
    public function setDefault($controller, $method) {
        $this->default = compact($controller, $method);
    }

}
