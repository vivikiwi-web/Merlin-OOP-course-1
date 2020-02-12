<div id="legend">
    <legend class="">Зарегестрированные ползователи</legend>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Эл. почта</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach ($userList as $user) : ?>

        <tr>
            <th scope="row"><?php echo $user['id']; ?></th>
            <td><?php echo $user['email']; ?></td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>
