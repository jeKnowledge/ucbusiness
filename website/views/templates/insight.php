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

          <div class="new">

            <img src="views/assets/images/foto.png" />
              <h3> Example title </h3>
              <p>Example description</p>
            <a href="/events?q=ola">
              <button>
                  Read More
              </button>
            </a>

          </div>

          <?php foreach ($events as $event) : ?>
              <div class="new">
                  <img src=<?= $event->CoverImage; ?> />
                  <h3> <?= $event->Title ?> </h3>
                  <p>
                      <?php
                          if (strlen($event->Description) > 50) {
                              echo substr($event->Description, 0, 50)."...";
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

    </section>

    <?php require 'views/templates/footer.php'; ?>

  </body>

  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
