<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="keywords" content="uc, business, coimbra, portugal, invest, partnership, value, students, investigator">
    <link rel="stylesheet" href="views/assets/styles/css/style.css">
    <?php require 'views/templates/base_head.php'; ?>

    <title>UC Business</title>
  </head>
  <body>

<?php require 'views/templates/navbar.php'; ?>

    <video id="video-ucb" muted autoplay controls loop playsinline>
      <source src="views/assets/images/video.mp4" type="video/MP4">
       Your browser does not support the HTML5 video tag. Try updating your browser or using a different one.
    </video>


    <section id="news">
      <h1>
          <?= $this->translations["home"][$_SESSION["lang"]]["events"]["Title"] ?>
      </h1>
      <div id="news-container">
          <?php foreach ($events as $event) : ?>
            <div class="new">
                <?php if ($event->AssetUrl) : ?>
                  <img src=<?= $event->AssetUrl ?> />
                <?php else : ?>
                  <img src="views/assets/images/ucb_cover.png">
                <?php endif ?>
                <h3>
                  <?php
                    if ($_SESSION["lang"] == "en") {
                      echo $event->TitleEn;
                    } else {
                      echo $event->Title;
                    }
                  ?>
                </h3>
                <p>
                    <?php
                        if ($_SESSION["lang"] == "en") {
                            if (strlen($event->DescriptionEn) > 120) {
                              echo html_entity_decode(htmlspecialchars_decode(substr($event->DescriptionEn, 0, 120)))."...";
                            } else {
                              echo $event->DescriptionEn;
                            }
                        } else {
                            if (strlen($event->Description) > 120) {
                              echo html_entity_decode(htmlspecialchars_decode(substr($event->Description, 0, 120)))."...";
                            } else {
                              echo $event->Description;
                            }
                        }
                    ?>
                </p>
                <a href=<?= "/events?q=".urlencode($event->Title) ?>>
                    <button>
                      <?= $this->translations["home"][$_SESSION["lang"]]["events"]["Button"] ?>
                    </button>
                </a>
            </div>
          <?php endforeach; ?>
      </div>

    </section>

    <section id="logo-anim">

    <div id="info-ucb">

        <video id="ucb-logo" width="100%" autoplay loop muted >
          <source src="views/assets/images/ucbusiness.mp4" type="video/MP4">
        </video>

        <div class="txt-ucb">
          <h4>
            <?= $this->translations["home"][$_SESSION["lang"]]["info"]["Text"] ?>
          </h4>
          <div id="areas">
            <h3><?= $this->translations["home"][$_SESSION["lang"]]["info"]["BusinessAreas"][0] ?></h3>
            <h3><?= $this->translations["home"][$_SESSION["lang"]]["info"]["BusinessAreas"][1] ?></h3>
            <h3><?= $this->translations["home"][$_SESSION["lang"]]["info"]["BusinessAreas"][2] ?></h3>
          </div>
        </div>
      </div>


    </section>

    <?php require 'views/templates/footer.php'; ?>

  </body>

  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
