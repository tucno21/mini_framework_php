<?= extend('/layout/head.php') ?>

<div class="container">

    <form method="POST" action="">
        <div class="mb-3 form-group has-validation">
            <label class="form-label">Apellidos y Nombres</label>
            <input type="text" class="form-control <?= isset($error["name"]) ? 'is-invalid' : '' ?>" name="name" value="<?= isset($data["name"]) ? $data["name"] : '' ?>" />
            <?php if (isset($error["name"])) : ?>
                <div class="invalid-feedback">
                    <?= $error["name"] ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="mb-3 form-group has-validation">
            <label class="form-label">Usuario</label>
            <input type="text" class="form-control <?= isset($error["username"]) ? 'is-invalid' : '' ?>" name="username" value="<?= isset($data["username"]) ? $data["username"] : '' ?>" />
            <?php if (isset($error["username"])) : ?>
                <div class="invalid-feedback">
                    <?= $error["username"] ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="mb-3 form-group has-validation">
            <label class="form-label">Email</label>
            <input type="text" class="form-control <?= isset($error["email"]) ? 'is-invalid' : '' ?>" name="email" value="<?= isset($data["email"]) ? $data["email"] : '' ?>" />
            <?php if (isset($error["email"])) : ?>
                <div class="invalid-feedback">
                    <?= $error["email"] ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="mb-3 form-group has-validation">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control <?= isset($error["password"]) ? 'is-invalid' : '' ?>" name="password" value="" />
            <?php if (isset($error["password"])) : ?>
                <div class="invalid-feedback">
                    <?= $error["password"] ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="mb-3 form-group has-validation">
            <label class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control <?= isset($error["password_confirm"]) ? 'is-invalid' : '' ?>" name="password_confirm" value="" />
            <?php if (isset($error["password_confirm"])) : ?>
                <div class="invalid-feedback">
                    <?= $error["password_confirm"] ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Registrarme</button>
        </div>
    </form>
</div>

<?= extend('/layout/footer.php') ?>