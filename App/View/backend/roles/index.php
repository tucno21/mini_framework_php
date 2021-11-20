<?= extend('/backend/layout/head.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h3 class="page-title"><i class="fas fa-user-edit"></i> Roles</h3>
                    <div class="page-title-right">
                        <a class="btn btn-outline-info rounded-pill waves-effect waves-light btn-xs" href="#" role="button" data-bs-toggle="modal" data-bs-target="#create-modal">Crear</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="card">
                <div class="card-header">
                    Header
                </div>
                <div class="card-body">
                    <table class="table table-striped dt-responsive nowrap w-100" id="rolestable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>admin</td>
                                <td>control total</td>
                                <td>activo</td>
                                <td>ddd</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>vendedor</td>
                                <td>control total</td>
                                <td>activo</td>
                                <td>ddd</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>contador</td>
                                <td>control total</td>
                                <td>activo</td>
                                <td>ddd</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="card-footer text-muted">
                    Footer
                </div>
            </div>


        </div>

    </div> <!-- container -->

</div> <!-- content -->

<div id="create-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
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

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <input class="form-control <?= isset($err->description) ? 'is-invalid' : '' ?>" type="text" name="description" id="description">

                        <?php if (isset($err->description)) : ?>
                            <div class="invalid-feedback">
                                <?= $err->description ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input class="form-control <?= isset($err->status) ? 'is-invalid' : '' ?>" type="text" name="status" id="estado">

                        <?php if (isset($err->status)) : ?>
                            <div class="invalid-feedback">
                                <?= $err->status ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Crear</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<?= extend('/backend/layout/footer.php') ?>