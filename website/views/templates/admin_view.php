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
        <label for="title">Title:</label>
        <input type="text" name="title" value=""><br>
        <label for="description">Description:</label>
        <input type="text" name="description" value=""><br>
        <label for="place">Place:</label>
        <input type="text" name="place" value=""><br>
        <label for="eventDate">Date:</label>
        <input type="date" name="eventDate" value=""><br>
        <label for="eventTime">Time:</label>
        <input type="time" name="eventTime" value=""><br>
        <button type="submit" name="button">Submit</button>
    </form>
    <br>
    <h2>Members</h2>
    <br><br>
  </body>
</html>
