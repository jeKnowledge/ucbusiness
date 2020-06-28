<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="views/assets/styles/css/contacts.css">

    <?php require 'views/templates/base_head.php'; ?>

    <script src="views/assets/scripts/get_form_info.js"></script>

    <title>Insight</title>
  </head>
  <body>
    <?php require 'views/templates/navbar.php'; ?>

    <div class="container">

      <section id="contacts">

          <h1>
            Get in Touch
          </h1>

          <p>
            <h3>
                Address
            </h3>
            <h4>
                Rectory Pólo II
                <br>R. Luís Reis dos Santos 290,
                <br>3030-790 Coimbra
            </h4>
          </p>

          <p>
            <h3>E-mail</h3>
            <h4> ucbusiness@uc.pt</h4>
          </p>

          <p>
            <h3>
                Social Media
            </h3>
              <h4>Facebook:
              <a href="https://www.facebook.com/UCBusinessGlobal/" target="_blank"><br>https://www.facebook.com/UCBusinessGlobal/ </a></h4>
              <h4 > LinkedIn:
                <a href="https://linkedin.com/company/ucbusinessglobal" target="_blank"><br>https://www.linkedin.com/company/ucbusinessglobal</a></h4>
              <h4 > Twitter:
                <a href=" https://twitter.com/business_uc" target="_blank" ><br>https://twitter.com/business_uc</a></h4>
          </p>
      </section>

      <section id="form">
        <form>
          <h2 class=form-title>
              Send us a message
          </h2>
          <h4>
              Name:
          </h4>
          <input name = "name" id="name" type="name"  required >

          <h4> E-mail:</h4>
          <input name = "email" id="mail" type="email"  required >

          <h4>
              Message:
          </h4>
          <input name = "message" id="text" type="text" required ></input>

          <button id="submit-button">
              Submit
          </button>
        </form>
      </section>
    </div>

    <?php require 'views/templates/footer.php'; ?>
  </body>

  <script type="text/javascript" src="views/assets/scripts/change_menu.js"></script>

</html>