<?= extend('/backend/layout/head.php') ?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Rol</h5>
    </div>

    <div class="modal-body">

        <form class="px-3" action="<?= base_url('/proles/edit') ?>" method="post">
            <input type="hidden" name="id" value="<?= $rol->id ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input class="form-control <?= isset($err->name) ? 'is-invalid' : '' ?>" name="name" type="text" id="name" value="<?= isset($rol->name) ? $rol->name : '' ?>">

                <?php if (isset($err->name)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->name ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-check form-switch">
                <input class="form-check-input" name="status" type="checkbox" id="rol" <?= $rol->status == 1 ? 'checked' : '' ?>>
                <label class="form-check-label" for="rol">Estado del rol</label>
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-primary" type="submit">Editar</button>
            </div>

        </form>

    </div>
</div><!-- /.modal-content -->

<?= extend('/backend/layout/footer.php') ?>