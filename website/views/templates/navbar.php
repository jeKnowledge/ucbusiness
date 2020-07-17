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
                <?= $this->translations["cookieBanner"][$_SESSION["lang"]]["Text"] ?>
            </p>
        </h2>
        <button id="cookie-button">
            <?= $this->translations["cookieBanner"][$_SESSION["lang"]]["Button"] ?>
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
                <a href="/"><?= $this->translations["navbar"][$_SESSION["lang"]][0] ?></a>
                <a href="/about"><?= $this->translations["navbar"][$_SESSION["lang"]][1] ?></a>
                <a href="/events"><?= $this->translations["navbar"][$_SESSION["lang"]][2] ?></a>
                <a href="/contacts"><?= $this->translations["navbar"][$_SESSION["lang"]][3] ?></a>
            </h4>
        </div>
    </div>
</section>
