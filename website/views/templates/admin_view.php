<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require 'views/templates/admin_head.php'; ?>
    <title>Admin Page</title>
  </head>

  <body>

  <?php require 'views/templates/admin_navbar.php'; ?>

<div id="tables">

    <?php if ($this->user->IsAdmin) : ?>
      <div class="head-table">
        <h2>Users</h2>
        <div class="buttons">
          <a href="/admin/users">
            <button type="button"> Show all</button>
          </a>
          <a href="/admin/users/new">
            <button type="button"> + New User</button>
          </a>
        </div>
      </div>

      <?php if ($users) : ?>
        <?php require 'views/templates/tables/users_table.php' ?>
      <?php else : ?>
        <h3>No users to show...</h3>
      <?php endif ?>
      <br>
    <?php endif ?>
    <div class="head-table">
      <h2>Events</h2>
      <div class="buttons">
        <a href="/admin/events">
          <button type="button"> Show all</button>
        </a>
        <a href="/events">
          <button type="button"> Show website</button>
        </a>
        <a href="/admin/events/new">
          <button type="button"> + New Event</button>
        </a>
      </div>
    </div>
    <?php if ($events) : ?>
      <?php require 'views/templates/tables/events_table.php' ?>
    <?php else : ?>
      <h4>No events to show...</h4>
    <?php endif ?>
    <br>

    <h2>Team</h2>
    <div class="head-table">
      <h3>Roles</h3>
      <div class="buttons">
        <a href="/admin/roles">
          <button type="button"> Show all</button>
        </a>
        <a href="/admin/roles/new">
          <button type="button"> + New Role</button>
        </a>
      </div>
    </div>
    <?php if ($roles) : ?>
      <?php require 'views/templates/tables/roles_table.php' ?>
    <?php else : ?>
      <h4>No roles to show...</h4>
    <?php endif ?>
    <br>

    <div class="head-table">
      <h3>Members</h3>
      <div class="buttons">
        <a href="/admin/members">
          <button type="button"> Show all</button>
        </a>
        <a href="/about">
          <button type="button"> Show website</button>
        </a>
        <a href="/admin/members/new">
          <button type="button"> + New Member</button>
        </a>
      </div>
    </div>
    <?php if ($members) : ?>
      <?php require 'views/templates/tables/members_table.php' ?>
    <?php else : ?>
      <h4>No members to show...</h4>
    <?php endif ?>
    <br>
  </div>
  </body>
</html>
