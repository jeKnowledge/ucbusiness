
<?php if ($new_element) : ?>
    <form action="/addEvent" method="post">
        <label for="Title">Title:</label>
        <input type="text" name="Title" value=""><br>
        <label for="TitleEn">Title(EN):</label>
        <input type="text" name="TitleEn" value=""><br>
        <label for="Description">Description:</label>
        <input type="text" name="Description" value=""><br>
        <label for="DescriptionEn">Description(EN):</label>
        <input type="text" name="DescriptionEn" value=""><br>
        <label for="Location">Location:</label>
        <input type="text" name="Location" value=""><br>
        <label for="Date">Date:</label>
        <input type="date" name="Date" value=""><br>
        <label for="Time">Time:</label>
        <input type="time" name="Time" value=""><br>
        <button type="submit">Submit</button>
    </form>
<?php else : ?>
    <form action="/updateEvent" method="post">
        <input type="hidden" name="Id" value=<?= $event->EventId ?> readonly>
        <label for="Title">Title:</label>
        <input type="text" name="Title" value="<?= $event->Title ?>"><br>
        <label for="TitleEn">Title(EN):</label>
        <input type="text" name="TitleEn" value="<?= $event->TitleEn ?>"><br>
        <label for="Description">Description:</label>
        <input type="text" name="Description" value="<?= $event->Description ?>"><br>
        <label for="DescriptionEn">Description(EN):</label>
        <input type="text" name="DescriptionEn" value="<?= $event->DescriptionEn ?>"><br>
        <label for="Location">Location:</label>
        <input type="text" name="Location" value="<?= $event->Location ?>"><br>
        <label for="Date">Date:</label>
        <input type="date" name="Date" value=<?= $event->Date ?>><br>
        <label for="Time">Time:</label>
        <input type="time" name="Time" value=<?= $event->Time ?>><br>
        <button type="submit">Update Event</button>
    </form>

    <?php if ($assets) : ?>
        <?php foreach ($assets as $asset) : ?>
            <?php if ($asset->IsVideo) : ?>
                <video src="<?= $asset->AssetUrl ?>"></video>
            <?php else: ?>
                <img src="<?= $asset->AssetUrl ?>" alt="">
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>

<?php endif ?>