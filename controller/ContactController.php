<?php

require "model/TemplatingSystem.php";
require "model/HTMLElements.php";

class ContactController {

    public function __construct() {
        
    }

    public function test() {
        var_dump(func_get_args());
    }

}
