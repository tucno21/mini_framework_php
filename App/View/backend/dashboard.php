<?= extend('/frontend/layout/head.php') ?>

<h1>Dashboard</h1>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Nombres</th>
                <th>F. creación</th>
                <th>F. Actualización</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->created_at ?></td>
                    <td><?= $user->updated_at ?></td>
                </tr>
            <?php endforeach; ?>
            <!-- <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr> -->
        </tbody>
    </table>

</div>

<?= extend('/frontend/layout/footer.php') ?>