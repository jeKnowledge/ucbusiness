<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/contacts.css">

    <?php require 'views/templates/base_head.php'; ?>

    <title><?= $this->translations["navbar"][$_SESSION["lang"]][3] ?></title>
  </head>
  <body>
    <?php require 'views/templates/navbar.php'; ?>

    <div class="container">

      <div id="contacts">

          <h1>
            <?= $this->translations["contacts"][$_SESSION["lang"]]["info"]["Title"] ?>
          </h1>

          <p>
            <h3>
              <?php
                if ($_SESSION["lang"] == "en") {
                  echo "Address";
                } else {
                  echo "Morada";
                }
              ?>
            </h3>
            <h4>
              <?= $this->translations["contacts"][$_SESSION["lang"]]["info"]["Address"] ?>
            </h4>
          </p>

          <p>
            <h3>E-mail</h3>
            <h4> ucbusiness@uc.pt</h4>
          </p>

          <p>
            <h3>
              <?php
                if ($_SESSION["lang"] == "en") {
                  echo "Social Media";
                } else {
                  echo "Redes Sociais";
                }
              ?>
            </h3>
              <h4>Facebook:
              <a href="https://www.facebook.com/UCBusinessGlobal/" target="_blank"><br>https://www.facebook.com/UCBusinessGlobal/ </a></h4>
              <h4 > LinkedIn:
                <a href="https://linkedin.com/company/ucbusinessglobal" target="_blank"><br>https://www.linkedin.com/company/ucbusinessglobal</a></h4>
              <h4 > Twitter:
                <a href=" https://twitter.com/business_uc" target="_blank" ><br>https://twitter.com/business_uc</a></h4>
          </p>
      </div>

      <div id="form">
        <form action="/sendEmail" method="post">
          <h2 class=form-title>
            <?= $this->translations["contacts"][$_SESSION["lang"]]["formTitle"] ?>
          </h2>
          <h4>
            <?php
              if ($_SESSION["lang"] == "en") {
                echo "Name:";
              } else {
                echo "Nome:";
              }
            ?>
          </h4>
          <input name = "name" id="name" type="name"  required >
  
          <h4> E-mail:</h4>
          <input name = "email" id="mail" type="email"  required >
  
          <h4>
            <?php
              if ($_SESSION["lang"] == "en") {
                echo "Message:";
              } else {
                echo "Mensagem:";
              }
            ?>
          </h4>
          <textarea name = "message" id="text" type="text" required ></textarea>
  
          <button type="submit" id="submit-button">
            <?php
              if ($_SESSION["lang"] == "en") {
                echo "Send";
              } else {
                echo "Enviar";
              }
            ?>
          </button>
        </form>
      </div>

    </div>

    <?php require 'views/templates/footer.php'; ?>
  </body>

  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>
