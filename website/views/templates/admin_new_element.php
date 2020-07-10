<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="/views/assets/styles/css/general.css">
      <link rel="stylesheet" href="/views/assets/styles/css/colors.css">
      <link rel="stylesheet" href="/views/assets/styles/css/admin_view.css">
      <title><?= "Admin Page: ".$type ?></title>
    </head>
    <body>
      <div id="header">
        <div id="header_left">
          <img id="logo_ucb" src="views/assets/images/ucb_white.png" alt="logo_uc" />
          <h2>Admin page</h2>
        </div>

        <div id="header_right">
            <h3> Olá @user </h3>
            <button type="button"> Log out</button>
        </div>

      </div>


        <?php if ($type == 'Users') : ?>
            <form action="/addUser" method="post">
                <label for="FirstName">First Name:</label>
                <input type="text" name="FirstName"><br>
                <label for="LastName">Last Name:</label>
                <input type="text" name="LastName"><br>
                <label for="Email">E-mail:</label>
                <input type="email" name="Email"><br>
                <label for="Password">Password:</label>
                <input type="password" name="Password"><br>
                <label for="IsAdmin">Is Admin:</label>
                <input type="checkbox" name="IsAdmin"><br>
                <label for="IsStaff">Is Staff:</label>
                <input type="checkbox" name="IsStaff"><br>
                <button type="submit">Submit</button>
            </form>
        <?php elseif ($type == 'Events') : ?>
            <form action="/addEvent" method="post">
                <label for="Title">Title:</label>
                <input type="text" name="Title" value=""><br>
                <label for="TitleEn">Title(EN):</label>
                <input type="text" name="TitleEn" value=""><br>
                <label for="Description">Description:</label>
                <input type="text" name="Description" value=""><br>
                <label for="DescriptionEn">Description(EN):</label>
                <input type="text" name="DescriptionEn" value=""><br>
                <label for="Location">Location:</label>
                <input type="text" name="Location" value=""><br>
                <label for="Date">Date:</label>
                <input type="date" name="Date" value=""><br>
                <label for="Time">Time:</label>
                <input type="time" name="Time" value=""><br>
                <button type="submit">Submit</button>
            </form>
        <?php elseif ($type == 'Roles') : ?>
            <form action="/addRole" method="post">
                <label for="Name">Name:</label>
                <input type="text" name="Name" value=""><br>
                <label for="NameEn">Name(EN):</label>
                <input type="text" name="NameEn" value=""><br>
                <label for="Position">Position:</label>
                <input type="text" name="Position" value=""><br>
                <button type="submit">Submit</button>
            </form>
        <?php elseif ($type == 'Members') : ?>
            <form action="/addMember" method="post">
                <label for="Name">Name:</label>
                <input type="text" name="Name" value=""><br>
                <label for="Email">E-mail:</label>
                <input type="text" name="Email" value=""><br>
                <label for="Image">Image(URL):</label>
                <input type="text" name="Image" value=""><br>
                <label for="RoleId">Role:</label>
                <select name="RoleId" id="">
                    <?php foreach($roles as $role) : ?>
                        <option value=<?= $role->RoleId ?>><?= $role->RoleName ?></option>
                    <?php endforeach ?>
                </select><br>
                <button type="submit">Submit</button>
            </form>
        <?php elseif($type == 'Images') : ?>
            <form action="/addImage" method="post">
                <label for="ImageUrl">Image URL:</label>
                <input type="text" name="ImageUrl" value=""><br>
                <label for="IsCover">Is Cover:</label>
                <input type="checkbox" name="IsCover" value=1><br>
                <label for="EventId">Event ID:</label>
                <input type="text" name="EventId" value="1"><br>
                <button type="submit">Submit</button>
            </form>
        <?php endif ?>
    </body>
</html>
