<?php

define("APP_DIR", __DIR__);
define("DEV", true);
define("DEV_DIR", "");

require "model/Router.php";

$router = new Router();