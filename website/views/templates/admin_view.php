<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
  </head>
  <body>
    <h1>Admin page</h1>
    <br>
    <h2>Users</h2>
    <h3>Administrators</h3>
    <?php if ($admins) : ?>
      <table>
        <tr>
          <th>Name</th>
          <th>E-mail</th>
        </tr>
      <?php foreach ($admins as $admin) : ?>
        <tr>
          <td><a href=<?= "/admin/users?q=".$admin->Id ?>><?= $admin->FirstName ?></a></td>
          <td><?= $admin->Email ?></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h3>No admins to show...</h3>
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
          <td><a href=<?= "/admin/users?q=".$staff_member->Id ?>><?= $staff_member->FirstName ?></a></td>
          <td><?= $staff_member->Email ?></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h3>No staff members to show...</h3>
    <?php endif ?>
    <br>
    <h2>Events</h2>
    <?php if ($events) : ?>
      <table>
        <tr>
          <th>Title</th>
          <th>Location</th>
          <th>Date</th>
        </tr>
      <?php foreach ($events as $event) : ?>
        <tr>
          <td><a href=<?= "/admin/events?q=".$event->EventId ?>><?= $event->Title ?></a></td>
          <td><?= $event->Location ?></td>
          <td><?= date("d/m/Y", strtotime($event->Date)) ?></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h3>No events to show...</h3>
    <?php endif ?>
    <br>
    <h2>Team</h2>
    <h3>Roles</h3>
    <?php if ($roles) : ?>
      <table>
          <tr>
            <th>Name</th>
          </tr>
      <?php foreach ($roles as $role) : ?>
        <tr>
          <td><a href=<?= "/admin/roles?q=".$role->RoleId ?>><?= $role->RoleName ?></a></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h3>No roles to show...</h3>
    <?php endif ?>
    <br>
    <h3>Members</h3>
    <?php if ($team_members) : ?>
      <table>
        <tr>
          <th>Name</th>
          <th>E-mail</th>
          <th>Role</th>
        </tr>
      <?php foreach ($team_members as $team_member) : ?>
        <tr>
          <td><a href=<?= "/admin/members?q=".$team_member->MemberId ?>><?= $team_member->MemberName ?></a></td>
          <td><?= $team_member->MemberEmail ?></td>
          <td><?= $team_member->RoleName ?></td>
        </tr>
      <?php endforeach ?>
      </table>
    <?php else : ?>
      <h3>No members to show...</h3>
    <?php endif ?>
    <br>
  </body>
</html>
