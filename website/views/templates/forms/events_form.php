
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
          <input type="text" name="Description" value="<?= $event->Description ?>">
        </div>
        <div class="form-element">
          <label for="DescriptionEn">Description(EN):</label>
          <input type="text" name="DescriptionEn" value="<?= $event->DescriptionEn ?>">
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
          <button type="submit">Update Event</button>
        </div>
    </form>

    <h2>Event Assets</h2>

    <?php foreach ($assets as $asset) : ?>

      <?php if ($asset->IsVideo) : ?>
        <form action="" method="post">
          <input type="hidden" name="Id" value="<?= $asset->AssetId ?>" readonly>
        </form>
      <?php else : ?>
        <form action="" method="post">
          <input type="hidden" name="Id" value="<?= $asset->AssetId ?>" readonly>
        </form>
      <?php endif ?>

    <?php endforeach ?>

<?php endif ?>
