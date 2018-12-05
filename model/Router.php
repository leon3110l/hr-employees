<?php
/**
 * Router class
 */
class Router {
    /**
     * the constructor
     */
    public function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];
        if(HTTP_DIR) {
            $url = str_replace(HTTP_DIR, "", $_SERVER["REQUEST_URI"]);
        }
        $url = explode("?", $url)[0];
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
        $classname = "home";
        $method = "home";
        if(isset($packets[0]) && !empty($packets[0]))
            $classname = $packets[0];
        if(isset($packets[1]) && !empty($packets[1]))
            $method = $packets[1];
        $classname = ucfirst($classname) . "Controller";
        $this->sendToDestination($classname, $method, array_slice($packets, 2));
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