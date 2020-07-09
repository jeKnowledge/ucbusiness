<?php if ($new_element) : ?>
    <form action="/addRole" method="post">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value=""><br>
        <label for="NameEn">Name(EN):</label>
        <input type="text" name="NameEn" value=""><br>
        <label for="Position">Position:</label>
        <input type="text" name="Position" value=""><br>
        <button type="submit">Create Role</button>
    </form>
<?php else : ?>
    <form action="/addRole" method="post">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?= $role->RoleName ?>"><br>
        <label for="NameEn">Name(EN):</label>
        <input type="text" name="NameEn" value="<?= $role->RoleNameEn ?>"><br>
        <label for="Position">Position:</label>
        <input type="text" name="Position" value="<?= $role->RolePosition ?>"><br>
        <button type="submit">Update Role</button>
    </form>
<?php endif ?>