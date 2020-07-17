<div id="form_events">
<?php if ($new_element) : ?>
    <form action="/addEvent" method="post">
      <h2> NEW EVENT </h2>
      <div class="form-element">
        <label for="Title">Title:</label>
        <input type="text" name="Title" value="" required>
      </div>
      <div class="form-element">
        <label for="TitleEn">Title(EN):</label>
        <input type="text" name="TitleEn" value="" required>
      </div>
      <div class="form-element">
        <label for="Description">Description:</label>
        <textarea type="text" name="Description" value="" required></textarea>
      </div>
      <div class="form-element">
        <label for="DescriptionEn">Description(EN):</label>
        <textarea type="text" name="DescriptionEn" value="" required></textarea>
      </div>
      <div class="form-element">
        <label for="Location">Location:</label>
        <input type="text" name="Location" value="" required>
      </div>
      <div class="form-element">
        <label for="Date">Date:</label>
        <input type="date" name="Date" value="" required>
      </div>
      <div class="form-element">
        <label for="Time">Time:</label>
        <input type="time" name="Time" value="" required>
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
        <input type="text" name="Title" value="<?= $event->Title ?>" required>
        </div>
        <div class="form-element">
          <label for="TitleEn">Title(EN):</label>
          <input type="text" name="TitleEn" value="<?= $event->TitleEn ?>" required>
        </div>
        <div class="form-element">
          <label for="Description">Description:</label>
          <textarea type="text" name="Description" required><?= html_entity_decode($event->Description) ?></textarea>
        </div>
        <div class="form-element">
          <label for="DescriptionEn">Description(EN):</label>
          <textarea type="text" name="DescriptionEn" required><?= html_entity_decode($event->DescriptionEn) ?></textarea>
        </div>
        <div class="form-element">
          <label for="Location">Location:</label>
          <input type="text" name="Location" value="<?= $event->Location ?>" required>
        </div>
        <div class="form-element">
          <label for="Date">Date:</label>
          <input type="date" name="Date" value=<?= $event->Date ?> required>
        </div>
        <div class="form-element">
          <label for="Time">Time:</label>
          <input type="time" name="Time" value=<?= $event->Time ?> required>
        </div>
        <div class="form-but">
          <button type="submit" name="action" value="Update">Update Event</button>
          <button type="submit" name="action" value="Delete">Delete Event</button>
        </div>
    </form>

    <h2 class="title_new">Videos</h2>

    <form action="/addVideo" method="post">
      <h4>New Video</h4>
      <input type="hidden" name="Id" value="<?= $event->EventId ?>" readonly>
      <label for="AssetUrl">Url:</label>
      <input type="text" name="AssetUrl" value="" required>
      <button type="submit">Add Video</button>
    </form>

    <div class="grid">
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
    </div>

    <h2 class="title_new">Images</h2>

    <form action="/addImage" method="post">
      <h4 >New Image</h4>
      <input type="hidden" name="Id" value="<?= $event->EventId ?>" readonly>
      <label for="AssetUrl">Url:</label>
      <input type="text" name="AssetUrl" value="" required>
      <button type="submit">Add Image</button>
    </form>

    <div class="grid">
      <?php foreach ($images as $image) : ?>

        <form action="/updateImage" method="post">
          <div class="img_but">
              <img src="<?= $image->AssetUrl ?>">
              <input type="hidden" name="EventId" value="<?= $event->EventId ?>" readonly>
              <input type="hidden" name="Id" value="<?= $image->AssetId ?>" readonly>
              <button type="submit" name="action" value="Delete">Remove</button>
              <?php if (!$image->IsCover) : ?>
                <button type="submit" name="action" value="Update">Make Cover</button>
              <?php endif ?>
          </div>
        </form>
      <?php endforeach ?>
    </div>

<?php endif ?>
</div>
