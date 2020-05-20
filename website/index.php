<?php

$web_app = require 'config.php';

$database = require 'core/db_init.php';

$router = new Router;
require 'routes.php';

require $router->direct(Request::getUri(), Request::getMethod());
