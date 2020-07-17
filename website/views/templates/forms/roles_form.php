<?php if ($new_element) : ?>
    <form action="/addRole" method="post">
      <h2> NEW ROLE </h2>
      <div class="form-element">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="" required>
      </div>
      <div class="form-element">
        <label for="NameEn">Name(EN):</label>
        <input type="text" name="NameEn" value="" required>
      </div>
      <div class="form-element">
        <label for="Position">Hierarchical Position:</label>
        <input type="text" name="Position" value="" required>
      </div>
      <div class="form-but">
        <button type="submit">Create Role</button>
      </div>
    </form>
<?php else : ?>
    <form action="/updateRole" method="post">
      <h2> EDIT ROLE </H2>
      <input type="hidden" name="Id" value="<?= $role->RoleId ?>" readonly>
      <div class="form-element">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?= $role->RoleName ?>" required>
      </div>
      <div class="form-element">
        <label for="NameEn">Name(EN):</label>
        <input type="text" name="NameEn" value="<?= $role->RoleNameEn ?>" required>
      </div>
      <div class="form-element">
        <label for="Position">Hierarchical Position:</label>
        <input type="text" name="Position" value="<?= $role->RolePosition ?>" required>
      </div>
      <div class="form-but">
        <button type="submit" name="action" value="Update">Update Role</button>
        <button type="submit" name="action" value="Delete">Delete Role</button>
      </div>
    </form>
<?php endif ?>
