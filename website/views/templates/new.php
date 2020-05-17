<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/new.css">
    
    <?php require 'views/templates/base_head.php'; ?>
    
    <title>Insight</title>
  </head>
  <body>

    <?php require 'views/templates/navbar.php'; ?>
  
    <section id="news">

      <div class="slider">
        <button type="button" id="arrow-prev" class="slider-arrow slider-arrow-prev" > </button>
          <img src="views/assets/images/foto.png" alt="newsImage">
        <button type="button" id="arrow-next" class="slider-arrow slider-arrow-next" > </button>
      </div>
        <h3> Example title </h3>
        <p> Example description </p>
      <span> 01/01/2020 </span>
      <a href="insight.php">
        <h4> < Back </h4>
      </a>
    
    </section>

    <?php require 'views/templates/footer.php'; ?>

  </body>

  <script type="text/javascript" src="views/assets/scripts/event_slider.js"></script>
  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
