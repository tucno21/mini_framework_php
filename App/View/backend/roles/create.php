<?= extend('/backend/layout/head.php') ?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Crear Rol</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">

        <form class="px-3" action="<?= base_url('/proles/create') ?>" method="post">

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input class="form-control <?= isset($err->name) ? 'is-invalid' : '' ?>" name="name" type="text" id="name">

                <?php if (isset($err->name)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->name ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-primary" type="submit">Crear</button>
            </div>

        </form>

    </div>
</div><!-- /.modal-content -->

<?= extend('/backend/layout/footer.php') ?>