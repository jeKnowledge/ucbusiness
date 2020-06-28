<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/new.css">

    <?php require 'views/templates/base_head.php'; ?>

    <title>Insight</title>
  </head>
  <body>

    <?php require 'views/templates/navbar.php'; ?>
    <img id="capa" src="views/assets/images/foto.png" alt="newsImage">

    <section id="new">


          <div id="text">
            <h2> Example title </h2>
            <h4> Location </h4>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et purus vulputate, laoreet est nec, bibendum nisi.
              Nulla quis posuere augue, nec vehicula nisi. In tristique lacinia nisi. Nulla facilisi. Interdum et malesuada fames ac ante ipsum primis in faucibus.
              Morbi non tincidunt mauris. Cras mollis massa et facilisis ullamcorper. Nunc at iaculis lorem, ut ultrices justo.
              Cras mollis massa et facilisis ullamcorper. Nunc at iaculis lorem, ut ultrices justo.
             </p>
          </div>


          <div class="cont_gallery">

            <div id="big_image">
                <img src="views/assets/images/foto.png">
            </div>


            <div class="row">
              <div class="column">
                <img id="img1" src="views/assets/images/foto.png"  onclick="changeBig_image(this)" alt="Img1">
              </div>
              <div class="column">
                <img id="img2" src="views/assets/images/value.png"  onclick="changeBig_image(this)" alt="Img2">
              </div>
              <div class="column">
                <img id="img3" src="views/assets/images/invest.png" onclick="changeBig_image(this)" alt="Img3">
              </div>
              <div class="column">
                <img id="img3" src="views/assets/images/foto.png"  onclick="changeBig_image(this)" alt="Img4">
            </div>
          </div>

        </div>



          <span id ="date"> 01/01/2020 12:00 </span>

    </section>


    <?php require 'views/templates/footer.php'; ?>

  </body>

  <script type="text/javascript" src="views/assets/scripts/news_gallery.js"></script>
  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
