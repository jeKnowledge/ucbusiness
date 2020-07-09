<?php if ($new_element) : ?>
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
        <button type="submit">Create Member</button>
    </form>
<?php else : ?>
    <form action="/addMember" method="post">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?= $member->MemberName ?>"><br>
        <label for="Email">E-mail:</label>
        <input type="text" name="Email" value="<?= $member->MemberEmail ?>"><br>
        <label for="Image">Image(URL):</label>
        <input type="text" name="Image" value="<?= $member->MemberImage ?>"><br>
        <label for="RoleId">Role:</label>
        <select name="RoleId" id="">
            <?php foreach($roles as $role) : ?>
                <option value=<?= $role->RoleId ?> <?php if ($role->RoleId == $member->RoleId) : ?> selected <?php endif ?>><?= $role->RoleName ?></option>
            <?php endforeach ?>
        </select><br>
        <button type="submit">Update Member</button>
    </form>
<?php endif ?>
