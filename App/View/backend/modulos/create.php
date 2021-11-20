<?= extend('/backend/layout/head.php') ?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Crear Modulo</h5>
    </div>

    <div class="modal-body">

        <form class="px-3" action="<?= base_url('/pmodulos/create') ?>" method="post">

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input class="form-control <?= isset($err->title) ? 'is-invalid' : '' ?>" name="title" type="text" id="name">

                <?php if (isset($err->title)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->title ?>
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