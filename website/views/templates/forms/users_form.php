<?php if ($new_element) : ?>
    <form action="/addUser" method="post">
      <h2> NEW USER </H2>
      <div class="form-element">
        <label for="FirstName">First Name:</label>
        <input type="text" name="FirstName">
      </div>
      <div class="form-element">
        <label for="LastName">Last Name:</label>
        <input type="text" name="LastName">
      </div>
      <div class="form-element">
        <label for="Email">E-mail:</label>
        <input type="email" name="Email">
      </div>
      <div class="form-element">
        <label for="Password">Password:</label>
        <input type="password" name="Password">
      </div>
      <div class="form-element">
        <label for="IsAdmin">Is Admin:</label>
        <input type="checkbox" name="IsAdmin">
      </div>
      <div class="form-element">
        <label for="IsStaff">Is Staff:</label>
        <input type="checkbox" name="IsStaff">
      </div>
      <div class="form-but">
        <button type="submit">Create User</button>
      </div>
    </form>
<?php else : ?>
    <form action="/updateUser" method="post">
      <h2> EDIT USER </H2>
        <input type="hidden" name="Id" value="<?= $user->Id ?>" readonly>
        <label for="FirstName">First Name:</label>
        <input type="text" name="FirstName" value="<?= $user->FirstName ?>">
        <label for="LastName">Last Name:</label>
        <input type="text" name="LastName" value="<?= $user->LastName ?>">
        <label for="Email">E-mail:</label>
        <input type="email" name="Email" value="<?= $user->Email ?>">
        <label for="IsAdmin">Is Admin:</label>
        <input type="checkbox" name="IsAdmin" <?php if ($user->IsAdmin) : ?> checked <?php endif ?>>
        <label for="IsStaff">Is Staff:</label>
        <input type="checkbox" name="IsStaff" <?php if ($user->IsStaff) : ?> checked <?php endif ?> >
        <label for="IsActive">Is Active:</label>
        <input type="checkbox" name="IsActive" <?php if ($user->IsActive) : ?> checked <?php endif ?> >
        <button type="submit">Update User</button>
    </form>
<?php endif ?>
