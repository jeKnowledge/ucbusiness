<!DOCTYPE html>
<html lang="en">
    <head>
      <link rel="stylesheet" href="/views/assets/styles/css/general.css">
      <link rel="stylesheet" href="/views/assets/styles/css/colors.css">
      <link rel="stylesheet" href="/views/assets/styles/css/admin_view.css">
      <?php require 'views/templates/base_head.php'; ?>
        <title>Admin Page: Login</title>
    </head>
    <body>

      <div id="header">
        <div id="header_left">
          <a href=" ">
            <img id="logo_ucb" src="/views/assets/images/ucb_white.png" alt="logo_uc" />
          </a>
          <h2>Admin page</h2>
        </div>
      </div>
      
      <div class="login-rect">
        <div id="login">
          <h1> USER LOGIN </h1>
          <form action="/login" method="post">
            <div class="form-element">
              <label for="Email">E-mail:</label> <br>
              <input type="email" name="Email">
            </div>
            <div class="form-element">
              <label for="Password">Password:</label><br>
              <input type="password" name="Password">
            </div>
            <div class="form-but">
              <button type="submit">Login</button>
            </div>
          </form>
        </div>
      </div>
    </body>

</html>
