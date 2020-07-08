<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="views/assets/styles/css/general.css">
    <link rel="stylesheet" href="views/assets/styles/css/colors.css">
    <link rel="stylesheet" href="views/assets/styles/css/admin_view.css">
    <title>Admin Page</title>
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

<div id="tables">
    <div class="head-table">
      <h2>Users</h2>
      <div class="buttons">
        <button type="button"> Show more</button>
        <button type="button"> + New User</button>
      </div>
    </div>

    <h3>Administrators</h3>
    <?php if ($admins) : ?>
      <table>
        <tr>
          <th>Name</th>
          <th>E-mail</th>
        </tr>
      <?php foreach ($admins as $admin) : ?>
        <tr>
          <td><?= $admin->FirstName ?></td>
          <td><?= $admin->Email ?></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h4>No admins to show...</h4>
    <?php endif ?>

    <h3>Staff</h3>
    <?php if ($staff_members) : ?>
      <table>
        <tr>
          <th>Name</th>
          <th>E-mail</th>
        </tr>
      <?php foreach ($staff_members as $staff_member) : ?>
        <tr>
          <td><?= $staff_member->FirstName ?></td>
          <td><?= $staff_member->Email ?></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h4>No staff members to show...</h4>
    <?php endif ?>
    <br>
    <div class="head-table">
      <h2>Events</h2>
      <div class="buttons">
        <button type="button"> Show more</button>
        <button type="button"> + New Event</button>
      </div>
    </div>
    <?php if ($events) : ?>
      <table>
        <tr>
          <th>Title</th>
          <th>Location</th>
          <th>Date</th>
        </tr>
      <?php foreach ($events as $event) : ?>
        <tr>
          <td><?= $event->Title ?></td>
          <td><?= $event->Location ?></td>
          <td><?= date("d/m/Y", strtotime($event->Date)) ?></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h4>No events to show...</h4>
    <?php endif ?>
    <br>

    <h2>Team</h2>
    <div class="head-table">
      <h3>Roles</h3>
      <div class="buttons">
        <button type="button"> Show more</button>
        <button type="button"> + New Role</button>
      </div>
    </div>
    <?php if ($roles) : ?>
      <table>
          <tr>
            <th>Name</th>
          </tr>
      <?php foreach ($roles as $role) : ?>
        <tr>
          <td><?= $role->RoleName ?></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h4>No roles to show...</h4>
    <?php endif ?>
    <br>

    <div class="head-table">
      <h3>Members</h3>
      <div class="buttons">
        <button type="button"> Show more</button>
        <button type="button"> + New Member</button>
      </div>
    </div>
    <?php if ($team_members) : ?>
      <table>
        <tr>
          <th>Name</th>
          <th>E-mail</th>
          <th>Role</th>
        </tr>
      <?php foreach ($team_members as $team_member) : ?>
        <tr>
          <td><?= $team_member->MemberName ?></td>
          <td><?= $team_member->MemberEmail ?></td>
          <td><?= $team_member->RoleName ?></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h4>No members to show...</h4>
    <?php endif ?>
    <br>
  </div>
  </body>
</html>
