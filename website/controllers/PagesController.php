<?php

class PagesController {

    protected $database;
    protected $translations;

    function __construct($database, $translations) {
        $this->database = $database;
        $this->translations = $translations;
    }

    public function home() {
        $events = $this->database->selectCustom(
            'SELECT
            *
            FROM Events
            LEFT OUTER JOIN EventAssets USING(EventId)
            WHERE IsCover = 1 OR IsCover IS NULL
            ORDER BY DatePosted desc
            LIMIT 3'
        );
        require 'views/templates/index_view.php';
    }

    public function about() {
        $team_members = $this->database->selectCustom(
            'SELECT 
            member.*, role.*
            FROM Members member
            INNER JOIN Roles role ON member.RoleId = role.RoleId
            ORDER BY
            role.RolePosition,
            member.MemberName
            '
        );

        require 'views/templates/about_us_view.php';
    }

    public function contacts() {
        require 'views/templates/contacts_view.php';
    }

    public function events() {
        if (!isset($_GET['q'])) {
            $events = $this->database->selectCustom(
                'SELECT
                *
                FROM Events
                LEFT OUTER JOIN EventAssets USING(EventId)
                WHERE IsCover = 1 OR IsCover IS NULL
                ORDER BY DatePosted desc'
            );
            require 'views/templates/events.php';
        }
        else {
            $event = $this->database->get('Events', 'Title="'.urldecode(htmlspecialchars($_GET['q'])).'"');

            if ($event) {
                $cover_image = $this->database->selectCustom(
                    "SELECT
                        *
                    FROM EventAssets
                    WHERE EventId = ".$event->EventId." AND IsCover = 1"
                );
                
                $gallery = $this->database->select('EventAssets', 'EventId = '.$event->EventId, 'IsVideo desc, IsCover desc', NULL);

                require 'views/templates/event.php';
            } else {
                require 'views/templates/error.php';
            }
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
        $message_body = htmlspecialchars($_POST["message"]);

        $message = sprintf(
            "From: %s\nE-mail: %s\n\n%s",
            $name,
            $email,
            $message_body
        );

        mail("ucbusiness@uc.pt", "Website form submition", $message);

        header("Refresh:0");
    }

}


?>
