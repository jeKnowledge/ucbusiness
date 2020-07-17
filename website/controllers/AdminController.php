<?php

class AdminController {

    protected $database;
    protected $user;

    function __construct($database) {
        $this->database = $database;

        if (isset($_SESSION['loggedIn'])) {
            $this->user = $this->database->get('Users', 'Id='.$_SESSION['loggedIn']);
        }
    }

    public function login() {
        $email = htmlspecialchars($_POST['Email']);
        $password = htmlspecialchars($_POST['Password']);

        $user = $this->database->get('Users', 'Email="'.$email.'"');

        if ($user && $user->IsActive) {
            if (password_verify($password, $user->Password)) {
                $_SESSION['loggedIn'] = $user->Id;
            }
        }

        $host = $_SERVER['HTTP_HOST'];
        header("Location: //{$host}/admin");
        exit;
    }

    public function logout() {

        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        }
        
        $host = $_SERVER['HTTP_HOST'];
        header("Location: //{$host}/");
        exit;
    }

    public function dashboard() {

        if (!$this->user || !$this->user->IsActive) {
            require 'views/templates/admin_login.php';
            die();
        }

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
        if (!$this->user || !$this->user->IsActive) {
            require 'views/templates/admin_login.php';
            die();
        }

        if (!$this->user->IsAdmin) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin';
            header("Location: http://{$host}/{$uri}");
            exit;
        }

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
            $user = $this->database->get('Users', 'Id='.urldecode(htmlspecialchars($_GET['q'])));
            $new_element = FALSE;

            if ($user) {
                require 'views/templates/admin_element.php';
            } else {
                require 'views/templates/admin_error.php';
            }
        }
    }

    public function events() {
        if (!$this->user || !$this->user->IsActive) {
            require 'views/templates/admin_login.php';
            die();
        }

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
            $event = $this->database->get('Events', 'EventId='.urldecode(htmlspecialchars($_GET['q'])));
            $new_element = FALSE;

            if ($event) {
                $videos = $this->database->select('EventAssets', 'EventId = '.$event->EventId.' and IsVideo = 1', NULL, NULL);
                $images = $this->database->select('EventAssets', 'EventId = '.$event->EventId.' and IsImage = 1', 'IsCover desc', NULL);

                require 'views/templates/admin_element.php';
            } else {
                require 'views/templates/admin_error.php';
            }
        }
    }

    public function roles() {
        if (!$this->user || !$this->user->IsActive) {
            require 'views/templates/admin_login.php';
            die();
        }

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
            $role = $this->database->get('Roles', 'RoleId='.urldecode(htmlspecialchars($_GET['q'])));
            $new_element = FALSE;

            if ($role) {
                require 'views/templates/admin_element.php';
            } else {
                require 'views/templates/admin_error.php';
            }
        }
    }

    public function members() {
        if (!$this->user || !$this->user->IsActive) {
            require 'views/templates/admin_login.php';
            die();
        }

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
            $member = $this->database->get('Members', 'MemberId='.urldecode(htmlspecialchars($_GET['q'])));
            $new_element = FALSE;

            if ($member) {
                $roles = $this->database->selectAll('Roles', 'RolePosition asc');
                require 'views/templates/admin_element.php';
            } else {
                require 'views/templates/admin_error.php';
            }
        }
    }

    public function newUser() {
        if (!$this->user || !$this->user->IsActive) {
            require 'views/templates/admin_login.php';
            die();
        }

        if (!$this->user->IsAdmin) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin';
            header("Location: http://{$host}/{$uri}");
            exit;
        }

        $type = 'Users';
        $new_element = TRUE;
        require 'views/templates/admin_element.php';
    }

    public function newEvent() {
        if (!$this->user || !$this->user->IsActive) {
            require 'views/templates/admin_login.php';
            die();
        }

        $type = 'Events';
        $new_element = TRUE;
        require 'views/templates/admin_element.php';
    }

    public function newRole() {
        if (!$this->user || !$this->user->IsActive) {
            require 'views/templates/admin_login.php';
            die();
        }

        $type = 'Roles';
        $new_element = TRUE;
        require 'views/templates/admin_element.php';
    }

    public function newMember() {
        if (!$this->user || !$this->user->IsActive) {
            require 'views/templates/admin_login.php';
            die();
        }

        $type = 'Members';
        $roles = $this->database->selectAll('Roles', 'RolePosition asc');
        $new_element = TRUE;
        require 'views/templates/admin_element.php';
    }

    public function add_event() {
        $this->database->insert(
            'Events',
            [
                'Title' => htmlspecialchars($_POST['Title']),
                'TitleEn' => htmlspecialchars($_POST['TitleEn']),
                'Description' => htmlentities(htmlspecialchars($_POST['Description'])),
                'DescriptionEn' => htmlentities(htmlspecialchars($_POST['DescriptionEn'])),
                'Location' => htmlspecialchars($_POST['Location']),
                'Date' => htmlspecialchars($_POST['Date']),
                'Time' => htmlspecialchars($_POST['Time']),
                'DatePosted' => date('Y-m-d H:i:s'),
            ]
        );

        $title = htmlspecialchars($_POST['Title']);
        $event = $this->database->get('Events', "Title='{$title}'");

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/events?q='.$event->EventId;
        header("Location: http://{$host}/{$uri}");
        exit;
    }

    public function updateEvent() {
        if (htmlspecialchars($_POST['action']) == 'Update') {

            $title = htmlspecialchars($_POST['Title']);
            $title_en = htmlspecialchars($_POST['TitleEn']);
            $description = htmlentities(htmlspecialchars($_POST['Description']));
            $description_en = htmlentities(htmlspecialchars($_POST['DescriptionEn']));
            $location = htmlspecialchars($_POST['Location']);
            $date = htmlspecialchars($_POST['Date']);
            $time = htmlspecialchars($_POST['Time']);

            $this->database->update(
                'Events',
                [
                    "Title='{$title}'",
                    "TitleEn='{$title_en}'",
                    "Description='{$description}'",
                    "DescriptionEn='{$description_en}'",
                    "Location='{$location}'",
                    "Date='{$date}'",
                    "Time='{$time}'"
                ],
                "EventId=".htmlspecialchars($_POST['Id'])
            );
    
            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin/events?q='.htmlspecialchars($_POST['Id']);
            header("Location: http://{$host}/{$uri}");
            exit;
        } else if (htmlspecialchars($_POST['action'] == 'Delete')) {
            $this->database->delete('EventAssets', 'EventId='.htmlspecialchars($_POST['Id']));
            $this->database->delete('Events', 'EventId='.htmlspecialchars($_POST['Id']));
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin/events';
            header("Location: http://{$host}/{$uri}");
            exit;
        }
    }

    public function add_video() {
        $this->database->insert(
            'EventAssets',
            [
                'AssetUrl' => htmlspecialchars($_POST['AssetUrl']),
                'IsCover' => 0,
                'IsImage' => 0,
                'IsVideo' => 1,
                'EventId' => htmlspecialchars($_POST['Id'])
            ]
        );

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/events?q='.htmlspecialchars($_POST['Id']);
        header("Location: http://{$host}/{$uri}");
        exit;
    }

    public function remove_video() {
        $this->database->delete('EventAssets', 'AssetId = '.htmlspecialchars($_POST['Id']));

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/events?q='.htmlspecialchars($_POST['EventId']);
        header("Location: http://{$host}/{$uri}");
        exit;
    }

    public function add_image() {
        $this->database->insert(
            'EventAssets',
            [
                'AssetUrl' => htmlspecialchars($_POST['AssetUrl']),
                'IsCover' => 0,
                'IsImage' => 1,
                'IsVideo' => 0,
                'EventId' => htmlspecialchars($_POST['Id'])
            ]
        );

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/events?q='.htmlspecialchars($_POST['Id']);
        header("Location: http://{$host}/{$uri}");
        exit;
    }

    public function update_image() {
        if (htmlspecialchars($_POST['action']) == 'Update') {
            $coverImage = $this->database->get('EventAssets', 'EventId='.$_POST['EventId'].' and IsCover=1');
            
            if ($coverImage) {
                $this->database->update(
                    'EventAssets',
                    [
                        'IsCover=0'
                    ],
                    'AssetId='.$coverImage->AssetId
                );
            }

            $this->database->update(
                'EventAssets',
                [
                    'IsCover=1'
                ],
                "AssetId=".htmlspecialchars($_POST['Id'])
            );

        } else if (htmlspecialchars($_POST['action']) == 'Delete') {
            $this->database->delete('EventAssets', 'AssetId = '.htmlspecialchars($_POST['Id']));
        }

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/events?q='.htmlspecialchars($_POST['EventId']);
        header("Location: http://{$host}/{$uri}");
        exit;
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

    public function updateRole() {
        if (htmlspecialchars($_POST['action']) == 'Update') {

            $role_name = htmlspecialchars($_POST['Name']);
            $role_name_en = htmlspecialchars($_POST['NameEn']);
            $role_position = htmlspecialchars($_POST['Position']);

            $this->database->update(
                'Roles',
                [
                    "RoleName='{$role_name}'",
                    "RoleNameEn='{$role_name_en}'",
                    "RolePosition='{$role_position}'"
                ],
                "RoleId=".htmlspecialchars($_POST['Id'])
            );
    
            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin/roles?q='.htmlspecialchars($_POST['Id']);
            header("Location: http://{$host}/{$uri}");
            exit;
        } else if (htmlspecialchars($_POST['action']) == 'Delete') {
            $this->database->delete('Roles', 'RoleId = '.htmlspecialchars($_POST['Id']));
        
            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin/roles';
            header("Location: http://{$host}/{$uri}");
            exit;
        }
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

    public function updateMember() {
        if (htmlspecialchars($_POST['action']) == 'Update') {

            $member_name = htmlspecialchars($_POST['Name']);
            $member_email = htmlspecialchars($_POST['Email']);
            $member_image = htmlspecialchars($_POST['Image']);
            $role_id = htmlspecialchars($_POST['RoleId']);

            $this->database->update(
                'Members',
                [
                    "MemberName='{$member_name}'",
                    "MemberEmail='{$member_email}'",
                    "MemberImage='{$member_image}'",
                    "RoleId='{$role_id}'"
                ],
                "MemberId=".htmlspecialchars($_POST['Id'])
            );
    
            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin/members?q='.htmlspecialchars($_POST['Id']);
            header("Location: http://{$host}/{$uri}");
            exit;
        } else if (htmlspecialchars($_POST['action']) == 'Delete') {
            $this->database->delete('Members', 'MemberId = '.htmlspecialchars($_POST['Id']));
        
            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin/members';
            header("Location: http://{$host}/{$uri}");
            exit;
        }
    }

    public function add_user() {
        $is_admin = 0;
        if (isset($_POST['IsAdmin'])) {
            $is_admin = 1;
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
                'IsActive' => 1
            ]
        );

        $host = $_SERVER['HTTP_HOST'];
        $uri = 'admin/users';
        header("Location: http://{$host}/{$uri}");
        exit;
    }

    public function updateUser() {
        if (htmlspecialchars($_POST['action']) == 'Update') {
            $is_admin = 0;
            $is_staff = 0;
            $is_active = 0;
            if (isset($_POST['IsAdmin'])) {
                $is_admin = 1;
            }
            if (isset($_POST['IsActive'])) {
                $is_active = 1;
            }

            $first_name = htmlspecialchars($_POST['FirstName']);
            $last_name = htmlspecialchars($_POST['LastName']);
            $email = htmlspecialchars($_POST['Email']);
            
            if (isset($_POST['ChangePassword'])) {
                $password = htmlspecialchars($_POST['Password']);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $this->database->update(
                    'Users',
                    [
                        "FirstName='{$first_name}'",
                        "LastName='{$last_name}'",
                        "Email='{$email}'",
                        "Password='{$hashed_password}'",
                        "IsAdmin='{$is_admin}'",
                        "IsActive='{$is_active}'"
                    ],
                    "Id=".htmlspecialchars($_POST['Id'])
                );
            } else {
                $this->database->update(
                    'Users',
                    [
                        "FirstName='{$first_name}'",
                        "LastName='{$last_name}'",
                        "Email='{$email}'",
                        "IsAdmin='{$is_admin}'",
                        "IsActive='{$is_active}'"
                    ],
                    "Id=".htmlspecialchars($_POST['Id'])
                );
            }

            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin/users?q='.htmlspecialchars($_POST['Id']);
            header("Location: http://{$host}/{$uri}");
            exit;
        } else if (htmlspecialchars($_POST['action']) == 'Delete') {
            $this->database->delete('Users', 'Id = '.htmlspecialchars($_POST['Id']));
        
            $host = $_SERVER['HTTP_HOST'];
            $uri = 'admin/users';
            header("Location: http://{$host}/{$uri}");
            exit;
        }
    }
}

?>
