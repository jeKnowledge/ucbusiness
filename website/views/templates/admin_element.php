<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= "Admin Page: ".$type ?></title>
    </head>
    <body>
        <form action="" method="post">
            <label for="Title">Title:</label>
            <input type="text" name="Title" value="<?= $event->Title ?>"><br>
            <label for="TitleEn">Title(EN):</label>
            <input type="text" name="TitleEn" value=<?= $event->TitleEn ?>><br>
            <label for="Description">Description:</label>
            <input type="text" name="Description" value=<?= $event->Description ?>><br>
            <label for="DescriptionEn">Description(EN):</label>
            <input type="text" name="DescriptionEn" value=<?= $event->DescriptionEn ?>><br>
            <label for="Location">Location:</label>
            <input type="text" name="Location" value=<?= $event->Location ?>><br>
            <label for="Date">Date:</label>
            <input type="date" name="Date" value=<?= $event->Date ?>><br>
            <label for="Time">Time:</label>
            <input type="time" name="Time" value=<?= $event->Time ?>><br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>