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
          Events
      </h1>
      <div id="news-container">
          <?php foreach ($events as $event) : ?>
            <div class="new">
                <?php if ($event->AssetUrl) : ?>
                  <img src=<?= $event->AssetUrl ?> />
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

    <section id="logo-anim">

    <div id="info-ucb">

        <video id="ucb-logo" width="100%" autoplay loop muted >
          <source src="views/assets/images/ucbusiness.mp4" type="video/MP4">
        </video>

        <div class="txt-ucb">
          <h4>
            Transform the University of Coimbra into an essential partner for the business world, structured in 3 major business areas:
          </h4>
          <div id="areas">
            <h3>Large Companies</h3>
            <h3>National SMEs</h3>
            <h3>Start-ups and Spin-offs</h3>
          </div>
        </div>
      </div>


    </section>

    <?php require 'views/templates/footer.php'; ?>

  </body>

  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
