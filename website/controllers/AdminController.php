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
        $this->database->insertEvent(
            [
                'Title' => htmlspecialchars($_POST['Title']),
                'Description' => htmlspecialchars($_POST['Description']),
                'Place' => htmlspecialchars($_POST['Place']),
                'Date' => htmlspecialchars($_POST['Date']),
                'Time' => htmlspecialchars($_POST['Time']),
                'Duration' => htmlspecialchars($_POST['Duration']),
                'CoverImage' => 'https://cnet4.cbsistatic.com/img/IEl7fi0yMTSI_xHxE5qukK5lyGs=/47x131:1849x1278/940x0/2019/01/09/e30a81d2-f4e7-4439-98bf-61e288e16007/gettyimages-1045983738-1.jpg'
            ]
        );

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin';
        header("Location: http://{$host}/{$uri}");
        exit;
    }

}

?>
