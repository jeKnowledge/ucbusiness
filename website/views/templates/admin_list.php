<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'views/templates/admin_head.php'; ?>
        <title><?= "Admin Page: ".$type ?></title>
    </head>
    <body>
      <?php require 'views/templates/admin_navbar.php'; ?>
      <div id="table-showmore">
        <div class="head-table">
            <h2><?= $type ?></h2>
            <div class="buttons">
                <?php
                    switch ($type) {
                        case 'Users':
                            $text = "User";
                            $new_uri = "/admin/users/new";
                            break;
    
                        case 'Events':
                            $text = "Event";
                            $show_uri = "/events";
                            $new_uri = "/admin/events/new";
                            break;
    
                        case 'Roles':
                            $text = "Role";
                            $new_uri = "/admin/roles/new";
                            break;
    
                        case 'Members':
                            $text = "Member";
                            $show_uri = "/about";
                            $new_uri = "/admin/members/new";
                            break;
    
                        default:
                            break;
                    }
                ?>

                <?php if ($type == 'Events' || $type == 'Members') : ?>    
                    <a href="<?= $show_uri ?>">
                    <button type="button"> Show website</button>
                    </a>
                    <a href="<?= $new_uri ?>">
                    <button type="button"> + New <?= $text ?></button>
                    </a>
                <?php else: ?>
                    <a href="<?= $new_uri ?>">
                    <button type="button"> + New <?= $text ?></button>
                    </a>
                <?php endif ?>
            </div>
            </div>
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
