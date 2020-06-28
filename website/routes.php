<?php

//  -----   Public Website Routes    -----

$router->get([
    '' => 'PagesController@home',
    'about' => 'PagesController@about',
    'contacts' => 'PagesController@contacts',
    'events' => 'PagesController@events',
    'admin' => 'AdminController@home'
]);

//  -----   Private Website Routes  -----

$router->post([
    'changeLanguage' => 'PagesController@change_language',
    'hideCookieBanner' => 'PagesController@hide_cookie_banner',
    'sendEmail' => 'PagesController@send_email',
    'addEvent' => 'AdminController@add_event'
]);

?>
