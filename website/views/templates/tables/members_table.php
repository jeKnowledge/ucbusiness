<table>
    <tr>
        <th>Name</th>
        <th>E-mail</th>
        <th>Role</th>
    </tr>
    <?php foreach ($members as $member) : ?>
        <tr>
            <td><a href=<?= "/admin/members?q=".$member->MemberId ?>><?= $member->MemberName ?></a></td>
            <td><?= $member->MemberEmail ?></td>
            <td><?= $member->RoleName ?></td>
        </tr>
    <?php endforeach ?>
</table>