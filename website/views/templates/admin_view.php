<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
  </head>
  <body>
    <h1>Admin page</h1>
    <br><br>
    <h2>Events</h2>
    <br>
    <form action="/addEvent" method="post">
        <label for="Title">Title:</label>
        <input type="text" name="Title" value=""><br>
        <label for="Description">Description:</label>
        <input type="text" name="Description" value=""><br>
        <label for="Place">Place:</label>
        <input type="text" name="Place" value=""><br>
        <label for="Date">Date:</label>
        <input type="date" name="Date" value=""><br>
        <label for="Time">Time:</label>
        <input type="time" name="Time" value=""><br>
        <label for="Duration">Duration:</label>
        <input type="time" name="Duration" value=""><br>
        <button type="submit" name="button">Submit</button>
    </form>
    <br>
    <h2>Members</h2>
    <br><br>
  </body>
</html>