<?php

class PagesController {

    protected $database;

    function __construct($database) {
        $this->database = $database;
    }

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
            $events = $this->database->selectAll('Events', 'Event');
            require 'views/templates/insight.php';
        }
        else {
            require 'views/templates/new.php';
        }
    }

    //  AJAX requests

    public function change_language() {
        if (isset($_POST["lang"]) && ($_POST["lang"]=="pt" || $_POST["lang"]=="en")) {
            $_SESSION["lang"] = $_POST["lang"];
        }
    }

    public function hide_cookie_banner() {
        if (isset($_POST["hide"]) && $_POST["hide"]) {
            $_SESSION["cookie_banner"] = false;
        }
    }

    public function send_email() {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);

        $message = wordwrap($message, 70, "\r\n");

        mail("jfacc31@gmail.com", $name, $message);
    }

}


?>
