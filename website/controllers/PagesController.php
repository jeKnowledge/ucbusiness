<?php

class PagesController {

    public function home() {
        require 'views/templates/index_view.php';
    }

    public function about() {
        require 'views/templates/about_us_view.php';
    }

    public function contacts() {
        require 'views/templates/contacts_view.php';
    }

    public function events() {
        if (!isset($_GET['q'])) {
            require 'views/templates/insight.php';
        }
        else {
            require 'views/templates/new.php';
        }
    }

}


?>
