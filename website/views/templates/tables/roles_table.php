<table>
    <tr>
        <th>Name</th>
    </tr>
    <?php foreach ($roles as $role) : ?>
        <tr>
            <td><a href=<?= "/admin/roles?q=".$role->RoleId ?>><?= $role->RoleName ?></a></td>
        </tr>
    <?php endforeach ?>
</table>