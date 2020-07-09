<?php if ($new_element) : ?>
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
        <button type="submit">Create User</button>
    </form>
<?php else : ?>
    <form action="" method="post">
        <label for="FirstName">First Name:</label>
        <input type="text" name="FirstName" value="<?= $user->FirstName ?>"><br>
        <label for="LastName">Last Name:</label>
        <input type="text" name="LastName" value="<?= $user->LastName ?>"><br>
        <label for="Email">E-mail:</label>
        <input type="email" name="Email" value="<?= $user->Email ?>"><br>
        <label for="Password">Password:</label>
        <input type="password" name="Password" value="<?= $user->Password ?>"><br>
        <label for="IsAdmin">Is Admin:</label>
        <input type="checkbox" name="IsAdmin" <?php if ($user->IsAdmin) : ?> checked <?php endif ?>><br>
        <label for="IsStaff">Is Staff:</label>
        <input type="checkbox" name="IsStaff" <?php if ($user->IsStaff) : ?> checked <?php endif ?> ><br>
        <label for="IsActive">Is Active:</label>
        <input type="checkbox" name="IsActive" <?php if ($user->IsActive) : ?> checked <?php endif ?> ><br>
        <button type="submit">Update User</button>
    </form>
<?php endif ?>