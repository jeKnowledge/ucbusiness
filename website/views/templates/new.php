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
            <h5 id ="date"> <?= date("d/m/Y", strtotime($event->Date))." ".date("H:i", strtotime($event->Time)) ?> </h5>
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


              <?php if ($gallery[0]->IsVideo) : ?>
                <div id="Big_image">
                  <video id="big_image"  poster=" " controls >
                    <source src="<?= $gallery[0]->AssetUrl ?>"   alt="Img1">
                  </video>
                </div>
              <?php else : ?>
                <div id="Big_image">
                  <video id="big_image"  poster="<?= $gallery[0]->AssetUrl ?>">
                    <source src="" alt="Img1">
                  </video>
                </div>
              <?php endif ?>

              <div id="slider">

                <div class="row">

                  <?php foreach ($gallery as $asset) : ?>

                    <?php if ($asset->IsVideo) : ?>

                      <div class="column">
                        <video id="img1"  poster=" "  onclick="changeImage_image(' ','<?= $asset->AssetUrl ?>')">
                          <source src="<?= $asset->AssetUrl ?>"   alt="Img1">
                        </video>
                      </div>

                    <?php else : ?>

                      <div class="column">
                        <video id="img2"  poster="<?= $asset->AssetUrl ?>"  onclick="changeImage_image(this.poster,this.src)"></video>
                      </div>

                    <?php endif ?>

                  <?php endforeach ?>

                </div>
              </div>
            </div>

          <?php endif ?>

    </section>


    <?php require 'views/templates/footer.php'; ?>


  </body>

  <script type="text/javascript" src="views/assets/scripts/news_gallery.js"></script>
  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
