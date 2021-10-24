<?= extend('/layout/head.php') ?>

<div class="container">
    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Nombres</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Apellidos</label>
            <input name="surname" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">email</label>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirmar Password</label>
            <input name="repassword" type="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrarme</button>
    </form>
</div>

<?= extend('/layout/footer.php') ?>