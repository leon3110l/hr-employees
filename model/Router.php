<?php

/**
 * Router class
 */
class Router {

    public function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];

        if(DEV) {
            $url = str_replace(DEV_DIR, "", $_SERVER["REQUEST_URI"]);
        }

        $packets = (explode("/", trim($url, "/")));

        $this->determineDestination($packets);
    }

    /**
     * 
     * determines the dest
     * 
     * @param array $packets
     * @return void
     */
    public function determineDestination($packets){
        if (isset($packets[0]) && !empty($packets[0]) && isset($packets[1]) && !empty($packets[1])) {
            $this->sendToDestination($packets[0], $packets[1], array_slice($packets, 2));
        } else {
            echo "verkeerde url";
        }
    }

    /**
     * 
     * sends the stuff to the dest
     * 
     * @param string $classname name of the class
     * @param string $method name of the method
     * @param array $params params for the method
     * 
     * @param void
     */
    public function sendToDestination($classname,$method,$params) {
        $class = APP_DIR . '/controller/' . $classname . '.php';
        require_once($class);
        //Create object and call method
        $obj = new $classname();
            die(call_user_func_array(array($obj, $method),$params));
    }
}

?>