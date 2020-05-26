<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/new.css">

    <?php require 'views/templates/base_head.php'; ?>

    <title>Insight</title>
  </head>
  <body>

    <?php require 'views/templates/navbar.php'; ?>

    <section id="new">

      <div id="left">
          <img src="views/assets/images/foto.png" alt="newsImage">

      </div>

      <div id="right">

          <div id="arrows">
            <button type="button" id="arrow-prev"  > </button>
            <button type="button" id="arrow-next"  > </button>
          </div>

          <div id="text">
            <h3> Example title </h3>
            <h4> Universidade de Coimbra </h4>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et purus vulputate, laoreet est nec, bibendum nisi.
              Nulla quis posuere augue, nec vehicula nisi. In tristique lacinia nisi. Nulla facilisi. Interdum et malesuada fames ac ante ipsum primis in faucibus.
              Morbi non tincidunt mauris. Cras mollis massa et facilisis ullamcorper. Nunc at iaculis lorem, ut ultrices justo.
             </p>
            <span> 01/01/2020 12:00</span>
          </div>

      </div>



    </section>


    <?php require 'views/templates/footer.php'; ?>

  </body>

  <script type="text/javascript" src="views/assets/scripts/event_slider.js"></script>
  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
