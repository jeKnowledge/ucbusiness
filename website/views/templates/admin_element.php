<!DOCTYPE html>
<html lang="en">
    <head>
      <?php require 'views/templates/admin_head.php'; ?>
      <title><?= "Admin Page: ".$type ?></title>
    </head>
    <body>
      <?php require 'views/templates/admin_navbar.php'; ?>

        <?php
            switch ($type) {
                case 'Users':
                    require 'views/templates/forms/users_form.php';
                    break;

                case 'Events':
                    require 'views/templates/forms/events_form.php';
                    break;

                case 'Roles':
                    require 'views/templates/forms/roles_form.php';
                    break;

                case 'Members':
                    require 'views/templates/forms/members_form.php';
                    break;

                default:
                    break;
            }
        ?>


    </body>
</html>
