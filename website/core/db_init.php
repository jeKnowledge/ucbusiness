<?php

$config = require 'config.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
require 'core/Router.php';

return new QueryBuilder(
    Connection::make($config['database'])
);