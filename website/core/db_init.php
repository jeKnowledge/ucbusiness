<?php

/*
*   Require all necesary files and connect to the database
*/

require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
require 'core/Router.php';
require 'core/Request.php';

return new QueryBuilder(
    Connection::make($web_app['database']), $web_app['tables']
);

?>
