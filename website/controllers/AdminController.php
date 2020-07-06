<?php

class AdminController {

    protected $database;
    protected $user;

    function __construct($database) {
        $this->database = $database;
    }

    public function dashboard() {
        $admins = $this->database->select('Users', 'IsAdmin = 1', 'FirstName desc', 5);
        $staff_members = $this->database->select('Users', 'IsStaff = 1', 'FirstName desc', '10');
        $events = $this->database->select('Events', NULL, 'DatePosted desc', 10);
        $roles = $this->database->select('Roles', NULL, 'RolePosition', 5);
        $team_members = $this->database->selectCustom(
            'SELECT 
            member.MemberName, member.MemberEmail, role.RoleName
            FROM Members member
            INNER JOIN Roles role ON member.RoleId = role.RoleId
            ORDER BY
            role.RolePosition,
            member.MemberName
            '
        );
        require 'views/templates/admin_view.php';
    }

    public function users() {
        $type = 'Users';

        if (!isset($_GET['q'])) {
            $admins = $this->database->select('Users', 'IsAdmin = 1', 'FirstName asc', NULL);
            $staff_members = $this->database->select('Users', 'IsStaff = 1', 'FirstName asc', NULL);
            
            if ($admins or $staff_members) {
                $results = TRUE;
            } else {
                $results = FALSE;
            }

            require 'views/templates/admin_list.php';
        }
        else {
            $event = $this->database->get('Events', 'Id', urldecode(htmlspecialchars($_GET['q'])));

            if ($event) {
                require 'views/templates/admin_element.php';
            } else {
                die('Não existe bro');
            }
        }
    }

    public function events() {
        $type = 'Events';

        if (!isset($_GET['q'])) {
            $events = $this->database->selectAll('Events', 'DatePosted desc');
            
            if ($events) {
                $results = TRUE;
            } else {
                $results = FALSE;
            }

            require 'views/templates/admin_list.php';
        }
        else {
            $event = $this->database->get('Events', 'EventId', urldecode(htmlspecialchars($_GET['q'])));

            if ($event) {
                require 'views/templates/admin_element.php';
            } else {
                die('Não existe bro');
            }
        }
    }

    public function newUser() {
        $type = 'Users';
        require 'views/templates/admin_new_element.php';
    }

    public function newEvent() {
        $type = 'Events';
        require 'views/templates/admin_new_element.php';
    }

    public function newRole() {
        $type = 'Roles';
        require 'views/templates/admin_new_element.php';
    }

    public function newMember() {
        $type = 'Members';
        $roles = $this->database->selectAll('Roles', 'RolePosition asc');
        require 'views/templates/admin_new_element.php';
    }

    public function newImage() {
        $type = 'Images';
        require 'views/templates/admin_new_element.php';
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
                'DatePosted' => date('Y-m-d H:i:s'),
            ]
        );

        $event = $this->database->get('Events', 'Title', htmlspecialchars($_POST['Title']));

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/events?q='.$event->EventId;
        header("Location: http://{$host}/{$uri}");
        exit;
    }

    public function add_image() {
        $iscover = 0;
        if (isset($_POST['IsCover'])) {
            $iscover = 1;
        }
        $this->database->insert(
            'Images',
            [
                'ImageUrl' => htmlspecialchars($_POST['ImageUrl']),
                'IsCover' => $iscover,
                'EventId' => htmlspecialchars($_POST['EventId'])
            ]
        );

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/events';
        header("Location: http://{$host}/{$uri}");
        exit;
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
                'RoleName' => htmlspecialchars($_POST['Name']),
                'RoleNameEn' => htmlspecialchars($_POST['NameEn']),
                'RolePosition' => htmlspecialchars($_POST['Position'])
            ]
        );

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/roles';
        header("Location: http://{$host}/{$uri}");
        exit;
    }

    public function add_member() {
        $this->database->insert(
            'Members',
            [
                'MemberName' => htmlspecialchars($_POST['Name']),
                'MemberEmail' => htmlspecialchars($_POST['Email']),
                'MemberImage' => htmlspecialchars($_POST['Image']),
                'RoleId' => htmlspecialchars($_POST['RoleId'])
            ]
        );

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/members';
        header("Location: http://{$host}/{$uri}");
        exit;
    }

    public function add_user() {
        $is_admin = 0;
        $is_staff = 0;
        if (isset($_POST['IsAdmin'])) {
            $is_admin = 1;
        }
        if (isset($_POST['IsStaff'])) {
            $is_staff = 1;
        }

        $password = htmlspecialchars($_POST['Password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $this->database->insert(
            'Users',
            [
                'FirstName' => htmlspecialchars($_POST['FirstName']),
                'LastName' => htmlspecialchars($_POST['LastName']),
                'Email' => htmlspecialchars($_POST['Email']),
                'Password' => $hashed_password,
                'IsAdmin' => $is_admin,
                'IsStaff' => $is_staff,
                'IsActive' => 1
            ]
        );

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/users';
        header("Location: http://{$host}/{$uri}");
        exit;
    }

}

?>
