<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/insight.css">

    <?php require 'views/templates/base_head.php'; ?>

    <title>Events</title>
  </head>
  <body>
    <?php require 'views/templates/navbar.php'; ?>

    <section id="news">

      <h1>Events</h1>
        <div id="news-container">
            <?php foreach ($events as $event) : ?>
              <div class="new">
                  <?php if ($event->ImageUrl) : ?>
                    <img src=<?= $event->ImageUrl ?> />
                  <?php else : ?>
                    <img src="https://live.staticflickr.com/2469/3640569080_819b5294b3_b.jpg">
                  <?php endif ?>
                  <h3> <?= $event->Title ?> </h3>
                  <p>
                      <?php
                          if (strlen($event->Description) > 75) {
                              echo substr($event->Description, 0, 75)."...";
                          } else {
                              echo $event->Description;
                          }
                      ?>
                  </p>
                  <a href=<?= "/events?q=".urlencode($event->Title) ?>>
                      <button>
                          Read More
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
