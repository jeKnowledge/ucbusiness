<?php

//  -----   Public Website Routes    -----

$router->get([
    '' => 'PagesController@home',
    'about' => 'PagesController@about',
    'contacts' => 'PagesController@contacts',
    'events' => 'PagesController@events',
    'admin' => 'AdminController@dashboard',
    'admin/users' => 'AdminController@users',
    'admin/users/new' => 'AdminController@newUser',
    'admin/events' => 'AdminController@events',
    'admin/events/new' => 'AdminController@newEvent',
    'admin/roles' => 'AdminController@dashboard',
    'admin/roles/new' => 'AdminController@newRole',
    'admin/members' => 'AdminController@dashboard',
    'admin/members/new' => 'AdminController@newMember',
    'admin/images/new' => 'AdminController@newImage'
]);

//  -----   Private Website Routes  -----

$router->post([
    'changeLanguage' => 'PagesController@change_language',
    'hideCookieBanner' => 'PagesController@hide_cookie_banner',
    'sendEmail' => 'PagesController@send_email',
    'addUser' => 'AdminController@add_user',
    'addEvent' => 'AdminController@add_event',
    'addImage' => 'AdminController@add_Image',
    'addVideo' => 'AdminController@addVideo',
    'addRole' => 'AdminController@add_role',
    'addMember' => 'AdminController@add_member'
]);

?>
