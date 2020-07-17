<table>
    <tr>
        <th>Name</th>
        <th>E-mail</th>
        <th>Role</th>
        <th>Is Active</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><a href=<?= "/admin/users?q=".$user->Id ?>><?= $user->FirstName." ".$user->LastName ?></a></td>
            <td><?= $user->Email ?></td>
            <td>
            <?php 
                if ($user->IsAdmin) {
                    echo 'Administrator';
                } else {
                    echo 'Staff';
                } 
            ?>
            </td>
            <td>
                <?php
                    if ($user->IsActive) {
                        echo 'Yes';
                    } else {
                        echo 'No';
                    }
                ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>