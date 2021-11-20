<?= extend('/backend/layout/head.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h3 class="page-title"><i class="fas fa-user-edit"></i> Modulos</h3>
                    <div class="page-title-right">
                        <a class="btn btn-outline-info rounded-pill btn-xs" href="<?= base_url('/pmodulos/create') ?>">Crear</a>
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
                                    <td><?= $rol->title ?></td>
                                    <?php if ($rol->status == 1) : ?>
                                        <td><span class="badge bg-success">Activo</span></td>
                                    <?php else : ?>
                                        <td><span class="badge bg-danger">Inactivo</span></td>
                                    <?php endif; ?>

                                    <td>
                                        <a href="<?= base_url('/pmodulos/edit?id=' . $rol->id) ?>" class="btn btn-outline-info rounded-pill btn-xs">
                                            <i class="far fa-edit"></i></a>
                                        <a href="<?= base_url('/pmodulos/delete?id=' . $rol->id) ?>" class="btn btn-outline-danger rounded-pill btn-xs">
                                            <i class="far fa-trash-alt"></i></a>
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