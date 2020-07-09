<!DOCTYPE html>
<html lang="en">
    <head>
      <link rel="stylesheet" href="views/assets/styles/css/general.css">
      <link rel="stylesheet" href="views/assets/styles/css/colors.css">
      <link rel="stylesheet" href="views/assets/styles/css/admin_view.css">
        <title><?= "Admin Page: ".$type ?></title>
    </head>
    <body>
        <h1><?= $type ?></h1>
        <table>
        <?php if ($results) : ?>
            <?php
                switch ($type) {
                    case 'Users':
                        require 'views/templates/tables/users_table.php';
                        break;

                    case 'Events':
                        require 'views/templates/tables/events_table.php';
                        break;

                    case 'Roles':
                        require 'views/templates/tables/roles_table.php';
                        break;

                    case 'Members':
                        require 'views/templates/tables/members_table.php';
                        break;

                    default:
                        break;
                }
            ?>
        <?php else : ?>
            <h3>Nothing to show...</h3>
        <?php endif ?>
        </table>
    </body>
</html>
