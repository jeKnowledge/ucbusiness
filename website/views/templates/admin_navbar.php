<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/views/assets/styles/css/general.css">
    <link rel="stylesheet" href="/views/assets/styles/css/colors.css">
    <link rel="stylesheet" href="/views/assets/styles/css/admin_view.css">
    <?php require 'views/templates/base_head.php'; ?>
    <title>Admin Page</title>
  </head>

  <body>

    <div id="header">
      <div id="header_left">
        <a href="/admin ">
          <img id="logo_ucb" src="/views/assets/images/ucb_white.png" alt="logo_uc" />
        </a>
        <h2>Admin page</h2>
      </div>

      <div id="header_right">
          <h3> Olá <?= $this->user->FirstName." ".$this->user->LastName ?> </h3>
          <a href="/logout">
            <button type="button"> Log out</button>
          </a>
      </div>

    </div>


  </body>
</html>
