<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/abous_us.css">
    <link rel="stylesheet" href="views/assets/styles/css/admin_view.css">

    <?php require 'views/templates/base_head.php'; ?>

    <title>About Us</title>
  </head>
  <body>
    <?php require 'views/templates/navbar.php'; ?>


    <div class="about">

    <h1>
        Team
    </h1>
  </div>

  <?php if ($team_members) : ?>
    <?php $first_member = array_shift($team_members); ?>
    <section id="team">
      <div class="member1">
        <img src=<?= $first_member->MemberImage ?> alt=<?= $first_member->MemberName ?>/>
            <div class="member1-info">
              <h4><?= $first_member->MemberName ?></h4>
              <h5>
                <?= $first_member->RoleName ?>
              </h5>
              <h5><?= $first_member->MemberEmail ?></h5>
            </div>
      </div>

      <div id="team-grid">
          <?php foreach ($team_members as $team_member) : ?>    
            <div class="member">
              <img src=<?= $team_member->MemberImage ?> alt=<?= $team_member->MemberName ?>/>
                <div class="member-info">
                    <h4><?= $team_member->MemberName ?></h4>
                    <p><?= $team_member->RoleName ?><p>
                    <p><?= $team_member->MemberEmail ?></p>
                </div>
            </div>
          <?php endforeach ?>
      </div>
    </section>
  <?php endif ?>

  <?php require 'views/templates/footer.php'; ?>
  </body>

  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
