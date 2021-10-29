<?= extend('/layout/head.php') ?>

<div class="container">
    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Nombres y apellidos</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input name="username" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">email</label>
            <input name="email" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirmar Password</label>
            <input name="password_confirm" type="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrarme</button>
    </form>
</div>

<?= extend('/layout/footer.php') ?>