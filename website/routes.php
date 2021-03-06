<?php

//  -----   Public Website Routes    -----

$router->get([
    '' => 'PagesController@home',
    'about' => 'PagesController@about',
    'contacts' => 'PagesController@contacts',
    'events' => 'PagesController@events',
    'logout' => 'AdminController@logout',
    'admin' => 'AdminController@dashboard',
    'admin/users' => 'AdminController@users',
    'admin/users/new' => 'AdminController@newUser',
    'admin/events' => 'AdminController@events',
    'admin/events/new' => 'AdminController@newEvent',
    'admin/roles' => 'AdminController@roles',
    'admin/roles/new' => 'AdminController@newRole',
    'admin/members' => 'AdminController@members',
    'admin/members/new' => 'AdminController@newMember'
]);

//  -----   Private Website Routes  -----

$router->post([
    'changeLanguage' => 'PagesController@change_language',
    'hideCookieBanner' => 'PagesController@hide_cookie_banner',
    'sendEmail' => 'PagesController@send_email',
    'login' => 'AdminController@login',
    'addUser' => 'AdminController@add_user',
    'addEvent' => 'AdminController@add_event',
    'addVideo' => 'AdminController@add_video',
    'addImage' => 'AdminController@add_image',
    'addRole' => 'AdminController@add_role',
    'addMember' => 'AdminController@add_member',
    'updateUser' => 'AdminController@updateUser',
    'updateEvent' => 'AdminController@updateEvent',
    'updateImage' => 'AdminController@update_image',
    'removeVideo' => 'AdminController@remove_video',
    'updateRole' => 'AdminController@updateRole',
    'updateMember' => 'AdminController@updateMember'
]);

?>
