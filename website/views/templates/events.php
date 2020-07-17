<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/insight.css">

    <?php require 'views/templates/base_head.php'; ?>

    <title><?= $this->translations["navbar"][$_SESSION["lang"]][2] ?></title>
  </head>
  <body>
    <?php require 'views/templates/navbar.php'; ?>

    <section id="news">

      <h1><?= $this->translations["events"][$_SESSION["lang"]]["Title"] ?></h1>
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
                          if (strlen($event->Description) > 75) {
                            if ($_SESSION["lang"] == "en") {
                              echo html_entity_decode(htmlspecialchars_decode(substr($event->DescriptionEn, 0, 75)))."...";
                            } else {
                              echo html_entity_decode(htmlspecialchars_decode(substr($event->Description, 0, 75)))."...";
                            }
                          } else {
                            if ($_SESSION["lang"] == "en") {
                              echo html_entity_decode(htmlspecialchars_decode($event->DescriptionEn));
                            } else {
                              echo html_entity_decode(htmlspecialchars_decode($event->Description));
                            }
                          }
                      ?>
                  </p>
                  <a href=<?= "/events?q=".urlencode($event->Title) ?>>
                      <button>
                          <?= $this->translations["events"][$_SESSION["lang"]]["Button"] ?>
                      </button>
                  </a>
              </div>
            <?php endforeach; ?>           
        </div>
    </section>

    <?php require 'views/templates/footer.php'; ?>

  </body>

  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
