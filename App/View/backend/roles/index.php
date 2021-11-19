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

                <form class="px-3" action="#">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input class="form-control is-invalid" type="text" id="name" required="">
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <input class="form-control" type="text" id="description" required="">
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input class="form-control" type="text" id="estado" required="">
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