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
                        <a class="btn btn-outline-info rounded-pill btn-xs" href="<?= base_url('/proles/create') ?>">Crear</a>
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
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($roles as $rol) : ?>
                                <tr>
                                    <td><?= $rol->id ?></td>
                                    <td><?= $rol->name ?></td>
                                    <td><?= $rol->status ?></td>
                                    <td>
                                        <a href="#" class="btn btn-outline-info rounded-pill btn-xs" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id="<?= $rol->id ?>" data-name="<?= $rol->name ?>"><i class="far fa-edit"></i></a>
                                        <a href="#" class="btn btn-outline-danger rounded-pill btn-xs" data-bs-toggle="modal" data-bs-target="#delete-modal" data-id="<?= $rol->id ?>" data-name="<?= $rol->name ?>"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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



<?= extend('/backend/layout/footer.php') ?>