<?= extend('/backend/layout/head.php') ?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Modulo</h5>
    </div>

    <div class="modal-body">

        <form class="px-3" action="<?= base_url('/pmodulos/edit') ?>" method="post">
            <input type="hidden" name="id" value="<?= $mod->id ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input class="form-control <?= isset($err->title) ? 'is-invalid' : '' ?>" name="title" type="text" id="name" value="<?= isset($mod->title) ? $mod->title : '' ?>">

                <?php if (isset($err->title)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->title ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-check form-switch">
                <input class="form-check-input" name="status" type="checkbox" id="rol" <?= $mod->status == 1 ? 'checked' : '' ?>>
                <label class="form-check-label" for="rol">Estado del rol</label>
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-primary" type="submit">Editar</button>
            </div>

        </form>

    </div>
</div><!-- /.modal-content -->

<?= extend('/backend/layout/footer.php') ?>