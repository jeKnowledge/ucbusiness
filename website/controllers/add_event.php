<?php

$database->insertEvent('events',
    [
        'title' => htmlspecialchars($_POST['title']),
        'description' => htmlspecialchars($_POST['description']),
        'place' => htmlspecialchars($_POST['place']),
        'eventDate' => htmlspecialchars($_POST['eventDate']),
        'eventTime' => htmlspecialchars($_POST['eventTime'])
    ]
);

$host = $_SERVER['HTTP_HOST'];
$uri = 'admin';
header("Location: http://{$host}/{$uri}");
exit;
