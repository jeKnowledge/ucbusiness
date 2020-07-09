<?php

class AdminController {

    protected $database;
    protected $user;

    function __construct($database) {
        $this->database = $database;
    }

    public function dashboard() {
        $users = $this->database->selectAll('Users', 'IsAdmin desc, FirstName asc');
        $events = $this->database->select('Events', NULL, 'DatePosted desc', 10);
        $roles = $this->database->select('Roles', NULL, 'RolePosition', 5);
        $members = $this->database->selectCustom(
            'SELECT 
            member.*, role.RoleName
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
            $users = $this->database->selectAll('Users', 'IsAdmin desc, FirstName asc');
            
            if ($users) {
                $results = TRUE;
            } else {
                $results = FALSE;
            }

            require 'views/templates/admin_list.php';
        }
        else {
            $user = $this->database->get('Users', 'Id', urldecode(htmlspecialchars($_GET['q'])));

            if ($user) {
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

    public function roles() {
        $type = 'Roles';

        if (!isset($_GET['q'])) {
            $roles = $this->database->selectAll('Roles', 'RolePosition asc');
            
            if ($roles) {
                $results = TRUE;
            } else {
                $results = FALSE;
            }

            require 'views/templates/admin_list.php';
        }
        else {
            $role = $this->database->get('Role', 'RoleId', urldecode(htmlspecialchars($_GET['q'])));

            if ($role) {
                require 'views/templates/admin_element.php';
            } else {
                die('Não existe bro');
            }
        }
    }

    public function members() {
        $type = 'Members';

        if (!isset($_GET['q'])) {
            $members = $this->database->selectCustom(
                'SELECT 
                member.* , role.RoleName
                FROM Members member
                INNER JOIN Roles role ON member.RoleId = role.RoleId
                ORDER BY
                role.RolePosition,
                member.MemberName
                '
            );
            
            if ($members) {
                $results = TRUE;
            } else {
                $results = FALSE;
            }

            require 'views/templates/admin_list.php';
        }
        else {
            $member = $this->database->get('Members', 'MemberId', urldecode(htmlspecialchars($_GET['q'])));

            if ($member) {
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
