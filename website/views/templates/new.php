<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/new.css">

    <?php require 'views/templates/base_head.php'; ?>

    <title>Insight</title>
  </head>
  <body>

    <?php require 'views/templates/navbar.php'; ?>

    <?php if ($event->ImageUrl) : ?>
      <img id="capa" src=<?= $event->ImageUrl ?> alt="newsImage">
    <?php else : ?>
      <img id="capa" src="https://live.staticflickr.com/2469/3640569080_819b5294b3_b.jpg" alt="newsImage">
    <?php endif ?>
    <section id="new">


          <div id="text">
            <h2>
              <?php
                if ($_SESSION["lang"] == "pt") {
                  echo $event->Title;
                } else {
                  echo $event->TitleEn;
                }
              ?>
            </h2>
            <h4> <?= $event->Location ?> </h4>
            <p>
              <?php
                if ($_SESSION["lang"] == "pt") {
                  echo $event->Description;
                } else {
                  echo $event->DescriptionEn;
                }
              ?>
            </p>

            <button id="watch-video">
                Ver vídeo
            </button>
          </div>


          <div class="cont_gallery">

            <div id="Big_image">
            <video id="big_image"  onclick="changeImage_image(this.src)" poster="views/assets/images/value.png">
            <source src="views/assets/images/azul-amarelo.mp4"   alt="Img1">
            </div>


            <div class="row">

              <div class="column">
                <img id="img1" onclick="changeImage_image(this.src)" src="views/assets/images/value.png"   alt="Img1">
              </div>

              <div class="column">
                <img id="img2" onclick="changeImage_image(this.src)" src="views/assets/images/value.png"   alt="Img2">
              </div>
              <div class="column">
                <img id="img3" onclick="changeImage_image(this.src)" src="views/assets/images/invest.png"  alt="Img3">
              </div>
              <div class="column">
                <img id="img3" onclick="changeImage_image(this.src)" src="views/assets/images/foto.png"    alt="Img4" >
            </div>
          </div>

        </div>


          <span id ="date"> <?= date("d/m/Y", strtotime($event->Date))." ".date("H:i", strtotime($event->Time)) ?> </span>

    </section>


    <?php require 'views/templates/footer.php'; ?>

  </body>

  <script type="text/javascript" src="views/assets/scripts/news_gallery.js"></script>
  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
