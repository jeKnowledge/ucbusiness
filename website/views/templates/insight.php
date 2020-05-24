<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/insight.css">

    <?php require 'views/templates/base_head.php'; ?>

    <title>Insights</title>
  </head>
  <body>
    <?php require 'views/templates/navbar.php'; ?>

    <section id="news">

      <h1>Events</h1>

      <div class="news">
          <div class="new">

            <img src="views/assets/images/foto.png" />
              <h3> Example title </h3>
              <p>Example description</p>
            <a href="/event">
              <button>
                  Read More
              </button>
            </a>

          </div>
      </div>
    </section>

    <?php require 'views/templates/footer.php'; ?>

  </body>

  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
