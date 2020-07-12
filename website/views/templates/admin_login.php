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
        <form action="/login" method="post">
            <label for="Email">E-mail:</label>
            <input type="email" name="Email"><br>
            <label for="Password">Password:</label>
            <input type="password" name="Password"><br>
            <button type="submit">login</button>
        </form>
    </body>
</html>
