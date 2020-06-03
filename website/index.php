<?php

$web_app = require 'config.php';

$database = require 'core/db_init.php';

$router = new Router;
require 'routes.php';

session_start();

if (!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = $web_app["info"]["default_lang"];           // If the session variable doesn't exist set it to the default language
}
if (!isset($_SESSION["cookie_banner"])) {
    $_SESSION["cookie_banner"] = true;                          // If the session variable doesn't exist set it to true
}

require $router->direct(Request::getUri(), Request::getMethod());
