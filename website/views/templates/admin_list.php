<!DOCTYPE html>
<html lang="en">
    <head>
      <link rel="stylesheet" href="/views/assets/styles/css/general.css">
      <link rel="stylesheet" href="/views/assets/styles/css/colors.css">
      <link rel="stylesheet" href="/views/assets/styles/css/admin_view.css">
      <?php require 'views/templates/base_head.php'; ?>
        <title><?= "Admin Page: ".$type ?></title>
    </head>
    <body>
      <div id="table-showmore">
        <h2><?= $type ?></h2>
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
            <h4>Nothing to show...</h4>
        <?php endif ?>
        </table>
      </div>
    </body>
</html>
