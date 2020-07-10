<?php

class PagesController {

    protected $database;

    function __construct($database) {
        $this->database = $database;
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
            member.MemberName, member.MemberImage, member.MemberEmail, role.RoleName
            FROM Members member
            INNER JOIN Roles role ON member.RoleId = role.RoleId
            ORDER BY
            role.RolePosition,
            member.MemberName
            '
        );

        if ($team_members) {
            $first_member = array_shift($team_members);
        }

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
            require 'views/templates/insight.php';
        }
        else {
            $event = $this->database->get('Events', 'Title', urldecode(htmlspecialchars($_GET['q'])));

            if ($event) {
                $cover_image = $this->database->selectCustom(
                    "SELECT
                        *
                    FROM EventAssets
                    WHERE EventId = ".$event->EventId." AND IsCover = 1"
                );
                
                $gallery = $this->database->select('EventAssets', 'EventId = '.$event->EventId, 'IsVideo desc, IsCover desc', NULL);

                require 'views/templates/new.php';
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
        $message = htmlspecialchars($_POST["message"]);

        $message = wordwrap($message, 70, "\r\n");

        mail("jfacc31@gmail.com", $name, $message);
    }

}


?>
