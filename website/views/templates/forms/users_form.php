<?php if ($new_element) : ?>
    <form action="/addUser" method="post">
      <h2> NEW USER </H2>
      <div class="form-element">
        <label for="FirstName">First Name:</label>
        <input type="text" name="FirstName" required>
      </div>
      <div class="form-element">
        <label for="LastName">Last Name:</label>
        <input type="text" name="LastName" required>
      </div>
      <div class="form-element">
        <label for="Email">E-mail:</label>
        <input type="email" name="Email" required>
      </div>
      <div class="form-element">
        <label for="Password">Password:</label>
        <input type="password" name="Password" required>
      </div>
      <div class="form-element">
        <label for="IsAdmin">Is Admin:</label>
        <input type="checkbox" name="IsAdmin">
      </div>
      <div class="form-but">
        <button type="submit">Create User</button>
      </div>
    </form>
<?php else : ?>
    <form action="/updateUser" method="post">
      <h2> EDIT USER </H2>
        <input type="hidden" name="Id" value="<?= $user->Id ?>" readonly>
        <div class="form-element">
          <label for="FirstName">First Name:</label>
          <input type="text" name="FirstName" value="<?= $user->FirstName ?>" required>
        </div>
        <div class="form-element">
          <label for="LastName">Last Name:</label>
          <input type="text" name="LastName" value="<?= $user->LastName ?>" required>
        </div>
        <div class="form-element">
          <label for="Email">E-mail:</label>
          <input type="email" name="Email" value="<?= $user->Email ?>" required>
        </div>
        <div class="form-element">
          <label for="ChangePassword">Change Password:</label>
          <input type="checkbox" name="ChangePassword" id="passwordCheckbox">
        </div>
        <div class="form-element">
          <label for="Password" id="passwordLabel" hidden>New Password:</label>
          <input type="hidden" name="Password" value="" id="passwordInput">
        </div>
        <div class="form-element">
          <label for="IsAdmin">Is Admin:</label>
          <input type="checkbox" name="IsAdmin" <?php if ($user->IsAdmin) : ?> checked <?php endif ?>>
        </div>
        <div class="form-element">
          <label for="IsActive">Is Active:</label>
          <input type="checkbox" name="IsActive" <?php if ($user->IsActive) : ?> checked <?php endif ?> >
        </div>
        <div class="form-but">
          <button type="submit" name="action" value="Update">Update User</button>
          <button type="submit" name="action" value="Delete">Delete User</button>
        </div>
    </form>
<?php endif ?>
