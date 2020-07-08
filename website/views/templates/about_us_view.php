<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/abous_us.css">

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
  <section id="team">
    <?php if ($first_member) : ?>
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
    <?php endif ?>

    <?php if ($team_members) : ?>
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
    <?php endif ?>

  </section>

    <?php require 'views/templates/footer.php'; ?>
  </body>

  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
