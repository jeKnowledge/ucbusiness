<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/new.css">

    <?php require 'views/templates/base_head.php'; ?>

    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>

    <title>Insight</title>
  </head>
  <body>

    <?php require 'views/templates/navbar.php'; ?>

    <?php if ($cover_image) : ?>
      <img id="capa" src=<?= $cover_image[0]->AssetUrl ?> alt="newsImage">
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

          </div>

          <?php if ($gallery) : ?>


          <div class="cont_gallery">


            <div id="Big_image">
              <video id="big_image"  poster=" " controls >
                <source src="views/assets/images/azul-amarelo.mp4"   alt="Img1">
              </video>
            </div>

            <div id="slider">

              <div class="row">

                <div class="column">
                  <video id="img1"  poster=" "  onclick="changeImage_image(' ','views/assets/images/azul-amarelo.mp4')">
                    <source src="views/assets/images/azul-amarelo.mp4"   alt="Img1">
                  </video>
                </div>

                <div class="column">
                  <video id="img2"  poster=" views/assets/images/CarlaMarques.jpg"  onclick="changeImage_image(this.poster,this.src)">
                    <source src=" "   alt="Img2">
                  </video>
                </div>
                <div class="column">
                  <video id="img1"  poster=" "  onclick="changeImage_image(' ','views/assets/images/azul-amarelo.mp4')">
                    <source src="views/assets/images/azul-amarelo.mp4"   alt="Img1">
                  </video>
                </div>

                <div class="column">
                  <video id="img2"  poster=" views/assets/images/CarlaMarques.jpg"  onclick="changeImage_image(this.poster,this.src)">
                    <source src=" "   alt="Img2">
                  </video>
                </div>
                <div class="column">
                  <video id="img1"  poster=" "  onclick="changeImage_image(' ','views/assets/images/azul-amarelo.mp4')">
                    <source src="views/assets/images/azul-amarelo.mp4"   alt="Img1">
                  </video>
                </div>

                <div class="column">
                  <video id="img2"  poster=" views/assets/images/CarlaMarques.jpg"  onclick="changeImage_image(this.poster,this.src)">
                    <source src=" "   alt="Img2">
                  </video>
                </div>
                <div class="column">
                  <video id="img1"  poster=" "  onclick="changeImage_image(' ','views/assets/images/azul-amarelo.mp4')">
                    <source src="views/assets/images/azul-amarelo.mp4"   alt="Img1">
                  </video>
                </div>

                <div class="column">
                  <video id="img2"  poster=" views/assets/images/CarlaMarques.jpg"  onclick="changeImage_image(this.poster,this.src)">
                    <source src=" "   alt="Img2">
                  </video>
                </div>
                <div class="column">
                  <video id="img1"  poster=" "  onclick="changeImage_image(' ','views/assets/images/azul-amarelo.mp4')">
                    <source src="views/assets/images/azul-amarelo.mp4"   alt="Img1">
                  </video>
                </div>

                <div class="column">
                  <video id="img2"  poster=" views/assets/images/CarlaMarques.jpg"  onclick="changeImage_image(this.poster,this.src)">
                    <source src=" "   alt="Img2">
                  </video>
                </div>






            </div>

          </div>


        </div>




          <?php endif ?>

          <span id ="date"> <?= date("d/m/Y", strtotime($event->Date))." ".date("H:i", strtotime($event->Time)) ?> </span>

    </section>


    <?php require 'views/templates/footer.php'; ?>


  </body>

  <script type="text/javascript" src="views/assets/scripts/news_gallery.js"></script>
  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
