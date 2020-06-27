<?php

//  -----   Public Website Routes    -----

$router->get([
    '' => 'PagesController@home',
    'about' => 'PagesController@about',
    'contacts' => 'PagesController@contacts',
    'events' => 'PagesController@events',
    'event' => 'controllers/event.php',
    'admin' => 'controllers/admin.php'
]);

//  -----   Private Website Routes  -----

$router->post([
    'addEvent' => 'controllers/add_event.php',
    'changeLanguage' => 'controllers/change_language.php',
    'hideCookieBanner' => 'controllers/hide_cookie_banner.php',
    'sendEmail' => 'controllers/send_email.php'
]);
