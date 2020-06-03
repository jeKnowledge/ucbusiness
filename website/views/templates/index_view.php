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


    <video class="video-ucb" muted autoplay controls loop playsinline>
      <source src="views/assets/images/video.mp4" type="video/MP4">
       Your browser does not support the HTML5 video tag. Try updating your browser or using a different one.
    </video>



    <section id="news-container">
      <h1>
          Events
      </h1>


      <div id="news">

        <div class="rect-new">
          <div class="cont">
            <div class="txt-left">
              <h4> 3rd may <h4>
              <h3>This is the first event</h3>
            </div>
            <img src="views/assets/images/foto.png">
          </div>
          <div class="descrip">
            <a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </a>
          </div>
          <a href="/event">
            <button type="button">
                > Find out more
            </button>
          </a>
        </div>


          <div class="rect-new">
            <div class="cont">
              <div class="txt-left">
                <h4> 3rd may <h4>
                <h3>This is the second event</h3>
              </div>
              <img src="views/assets/images/foto.png">

            </div>
            <div class="descrip">
              <a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </a>
            </div>
            <a href="/event">
              <button type="button">
                  > Find out more
              </button>
            </a>
          </div>


          <div class="rect-new">
            <div class="cont">
              <div class="txt-left">
                <h4> 3rd may <h4>
                <h3>This is the third event</h3>
              </div>
              <img src="views/assets/images/foto.png">
            </div>
              <div class="descrip">
                <a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </a>
              </div>
              <a href="/event">
                <button type="button">
                    > Find out more
                </button>
              </a>
            </div>
        </div>

    </section>

    <section id="logo-anim">

    <div id="info-ucb">
        <video id="ucb-logo" width="100%" auto loop muted >
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

<script>

  var vid = document.getElementById("ucb-logo");
  vid.playbackRate = 0.8;

</script>
