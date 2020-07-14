<?php if ($new_element) : ?>
    <form action="/addMember" method="post">
      <h2> NEW MEMBER </h2>
      <div class="form-element">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="">
      </div>
      <div class="form-element">
        <label for="Email">E-mail:</label>
        <input type="text" name="Email" value="">
      </div>
      <div class="form-element">
        <label for="Image">Image(URL):</label>
        <input type="text" name="Image" value="">
      </div>
      <div class="form-element">
        <label for="RoleId">Role:</label>
        <select name="RoleId" id="">
            <?php foreach($roles as $role) : ?>
                <option value=<?= $role->RoleId ?>><?= $role->RoleName ?></option>
            <?php endforeach ?>
        </select><br>
      </div>
      <div class="form-but">
        <button type="submit">Create Member</button>
      </div>

    </form>
<?php else : ?>
    <form action="/updateMember" method="post">
      <h2> EDIT MEMBER </H2>
      <input type="hidden" name="Id" value="<?= $member->MemberId ?>" readonly>
      <div class="form-element">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?= $member->MemberName ?>">
      </div>
      <div class="form-element">
        <label for="Email">E-mail:</label>
        <input type="text" name="Email" value="<?= $member->MemberEmail ?>">
      </div>
      <div class="form-element">
        <label for="Image">Image(URL):</label>
        <input type="text" name="Image" value="<?= $member->MemberImage ?>">
      </div>
      <div class="form-element">
        <label for="RoleId">Role:</label>
        <select name="RoleId" id="">
            <?php foreach($roles as $role) : ?>
                <option value=<?= $role->RoleId ?> <?php if ($role->RoleId == $member->RoleId) : ?> selected <?php endif ?>><?= $role->RoleName ?></option>
            <?php endforeach ?>
        </select><br>
      </div>
      <div class="form-but">
        <button type="submit" name="action" value="Update">Update Member</button>
        <button type="submit" name="action" value="Delete">Delete Member</button>
      </div>
    </form>
<?php endif ?>
