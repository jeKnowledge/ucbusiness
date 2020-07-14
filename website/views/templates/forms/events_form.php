
<?php if ($new_element) : ?>
    <form action="/addEvent" method="post">
      <h2> NEW EVENT </h2>
      <div class="form-element">
        <label for="Title">Title:</label>
        <input type="text" name="Title" value="">
      </div>
      <div class="form-element">
        <label for="TitleEn">Title(EN):</label>
        <input type="text" name="TitleEn" value="">
      </div>
      <div class="form-element">
        <label for="Description">Description:</label>
        <textarea type="text" name="Description" value=""></textarea>
      </div>
      <div class="form-element">
        <label for="DescriptionEn">Description(EN):</label>
        <textarea type="text" name="DescriptionEn" value=""> </textarea>
      </div>
      <div class="form-element">
        <label for="Location">Location:</label>
        <textarea type="text" name="Location" value=""></textarea>
      </div>
      <div class="form-element">
        <label for="Date">Date:</label>
        <input type="date" name="Date" value="">
      </div>
      <div class="form-element">
        <label for="Time">Time:</label>
        <input type="time" name="Time" value="">
      </div>
      <div class="form-but">
        <button type="submit">Submit</button>
      </div>
    </form>

<?php else : ?>
    <form action="/updateEvent" method="post">
      <h2> EDIT EVENT </H2>
        <input type="hidden" name="Id" value=<?= $event->EventId ?> readonly>
        <div class="form-element">
        <label for="Title">Title:</label>
        <input type="text" name="Title" value="<?= $event->Title ?>">
        </div>
        <div class="form-element">
          <label for="TitleEn">Title(EN):</label>
          <input type="text" name="TitleEn" value="<?= $event->TitleEn ?>">
        </div>
        <div class="form-element">
          <label for="Description">Description:</label>
          <textarea type="text" name="Description" value="<?= $event->Description ?>"></textarea>
        </div>
        <div class="form-element">
          <label for="DescriptionEn">Description(EN):</label>
          <textarea type="text" name="DescriptionEn" value="<?= $event->DescriptionEn ?>"></textarea>
        </div>
        <div class="form-element">
          <label for="Location">Location:</label>
          <input type="text" name="Location" value="<?= $event->Location ?>">
        </div>
        <div class="form-element">
          <label for="Date">Date:</label>
          <input type="date" name="Date" value=<?= $event->Date ?>>
        </div>
        <div class="form-element">
          <label for="Time">Time:</label>
          <input type="time" name="Time" value=<?= $event->Time ?>>
        </div>
        <div class="form-but">
          <button type="submit" name="action" value="Update">Update Event</button>
          <button type="submit" name="action" value="Delete">Delete Event</button>
        </div>
    </form>

    <h2>Videos</h2>

    <form action="/addVideo" method="post">
      <h3>New Video</h3>
      <input type="hidden" name="Id" value="<?= $event->EventId ?>" readonly>
      <label for="AssetUrl">Url:</label>
      <input type="text" name="AssetUrl" value="">
      <button type="submit">Add Video</button>
    </form>

    <?php foreach ($videos as $video) : ?>

      <form action="/removeVideo" method="post">
        <video controls>
          <source src="<?= $video->AssetUrl ?>">
        </video>
        <input type="hidden" name="EventId" value="<?= $event->EventId ?>" readonly>
        <input type="hidden" name="Id" value="<?= $video->AssetId ?>" readonly>
        <button type="submit">Remove</button>
      </form>

    <?php endforeach ?>

    <h2>Images</h2>

    <form action="/addImage" method="post">
      <h3>New Image</h3>
      <input type="hidden" name="Id" value="<?= $event->EventId ?>" readonly>
      <label for="AssetUrl">Url:</label>
      <input type="text" name="AssetUrl" value="">
      <button type="submit">Add Image</button>
    </form>

    <?php foreach ($images as $image) : ?>
      <form action="/updateImage" method="post">
        <img src="<?= $image->AssetUrl ?>">
        <input type="hidden" name="EventId" value="<?= $event->EventId ?>" readonly>
        <input type="hidden" name="Id" value="<?= $image->AssetId ?>" readonly>
        <button type="submit" name="action" value="Delete">Remove</button>
        <?php if (!$image->IsCover) : ?>
          <button type="submit" name="action" value="Update">Make Cover</button>
        <?php endif ?>
      </form>
    <?php endforeach ?>

<?php endif ?>
