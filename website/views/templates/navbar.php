<header>
    <div class="header">
      <a href="/"><img id="logo_ucb" src="views/assets/images/ucb_logo.png" height="1441" width="1997"
          alt="logo_ucb" /></a>
      <div id="dir">
        <h6> <a class="lang_button" id="PTbtn"> PT</a>
              <a id="lang_sep">|</a>
              <a class="lang_button" id="ENbtn"> EN</a>
        </h6>
        <a href="http://www.uc.pt">
            <img id="logo_uc" src="views/assets/images/uc_logo_hor.png" alt="logo_uc" />
        </a>
      </div>
    </div>

</header>

<?php if(isset($_SESSION["cookie_banner"]) && $_SESSION["cookie_banner"] ) : ?>
    <div class="cookiebanner" id="cookie-banner-div">
        <div class="cookiebanner-message">
        <h2 class="cookiebanner-text">
            <p>
                This website site uses cookies to improve your browsing experience. By continuing to use this site, you are agreeing to our use of cookies.
            </p>
        </h2>
        <button id="cookie-button">
            Accept and close
        </button>
        </div>
    </div>
<?php endif ?>

<section id=navbar>
    <div class="menu">

        <div class="rect-menu">
            <button id="container" onclick="changeMenu()">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            </button>

            <h4 id="menu-txt">
                <a href="/">Home</a>
                <a href="/about">About us</a>
                <a href="/events">Events</a>
                <a href="/contacts">Contacts</a>
            </h4>
        </div>
    </div>
</section>