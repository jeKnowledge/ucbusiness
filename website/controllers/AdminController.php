<?php

class AdminController {

    protected $database;

    function __construct($database) {
        $this->database = $database;
    }

    public function home() {
        require 'views/templates/admin_view.php';
    }

    public function add_event() {
        $this->database->insert(
            'Events',
            [
                'Title' => htmlspecialchars($_POST['Title']),
                'TitleEn' => htmlspecialchars($_POST['TitleEn']),
                'Description' => htmlspecialchars($_POST['Description']),
                'DescriptionEn' => htmlspecialchars($_POST['DescriptionEn']),
                'Location' => htmlspecialchars($_POST['Location']),
                'Date' => htmlspecialchars($_POST['Date']),
                'Time' => htmlspecialchars($_POST['Time']),
                'CoverImage' => 'https://cnet4.cbsistatic.com/img/IEl7fi0yMTSI_xHxE5qukK5lyGs=/47x131:1849x1278/940x0/2019/01/09/e30a81d2-f4e7-4439-98bf-61e288e16007/gettyimages-1045983738-1.jpg'
            ]
        );

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin';
        header("Location: http://{$host}/{$uri}");
        exit;
    }

    public function add_image() {
        $this->database->insert(
            'Images',
            [
                'Url' => htmlspecialchars($_POST['Url']),
                'IsCover' => htmlspecialchars($_POST['IsCover']),
                'EventId' => htmlspecialchars($_POST['EventId'])
            ]
        );
    }
    
    public function add_video() {
        $this->database->insert(
            'Videos',
            [
                'Url' => htmlspecialchars($_POST['Url']),
                'EventId' => htmlspecialchars($_POST['EventId'])
            ]
        );
    }

    public function add_role() {
        $this->database->insert(
            'Roles',
            [
                'Name' => htmlspecialchars($_POST['Name']),
                'NameEn' => htmlspecialchars($_POST['NameEn']),
                'Position' => htmlspecialchars($_POST['Position'])
            ]
        );
    }

    public function add_member() {
        $this->database->insert(
            'Members',
            [
                'Name' => htmlspecialchars($_POST['Name']),
                'Email' => htmlspecialchars($_POST['Email']),
                'Image' => htmlspecialchars($_POST['Image']),
                'RoleId' => htmlspecialchars($_POST['RoleId'])
            ]
        );
    }

    public function add_user() {
        $this->database->insert(
            'Users',
            [
                'Name' => htmlspecialchars($_POST['Name']),
                'Email' => htmlspecialchars($_POST['Email']),
                'Password' => htmlspecialchars($_POST['Password']),
                'IsAdmin' => htmlspecialchars($_POST['IsAdmin']),
                'IsStaff' => htmlspecialchars($_POST['IsStaff'])
            ]
        );
    }

}

?>
