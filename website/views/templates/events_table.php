<table>
    <tr>
    <th>Title</th>
    <th>Location</th>
    <th>Date</th>
    </tr>
<?php foreach ($events as $event) : ?>
    <tr>
        <td>
            <a href=<?= "/admin/events?q=".$event->EventId ?>>
                <?= $event->Title ?>
            </a>
        </td>
        <td><?= $event->Location ?></td>
        <td><?= date("d/m/Y", strtotime($event->Date)) ?></td>
    </tr>
<?php endforeach ?>
</table>