<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="/views/assets/styles/css/general.css">
      <link rel="stylesheet" href="/views/assets/styles/css/colors.css">
      <link rel="stylesheet" href="/views/assets/styles/css/admin_view.css">
      <?php require 'views/templates/base_head.php'; ?>
      <title><?= "Admin Page: ".$type ?></title>
    </head>
    <body>
      <div id="header">
        <div id="header_left">
          <img id="logo_ucb" src="/views/assets/images/ucb_white.png" alt="logo_uc" />
          <h2>Admin page</h2>
        </div>

        <div id="header_right">
            <h3> Olá @user </h3>
            <button type="button"> Log out</button>
        </div>

      </div>

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
