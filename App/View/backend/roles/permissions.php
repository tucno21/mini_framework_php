<?= extend('/backend/layout/head.php') ?>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h3 class="page-title"><i class="fas fa-user-edit"></i> Permisos</h3>
                    <div class="page-title-right">
                        <a class="btn btn-outline-info rounded-pill btn-xs" href="<?= base_url('/proles') ?>">Regresar</a>
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
                    <form class="px-3" action="<?= base_url('/proles/permisos') ?>" method="post">

                        <table class="table table-inverse table-responsive">
                            <thead class="thead-default">
                                <tr>
                                    <th>Modulo</th>
                                    <th>ver</th>
                                    <th>crear</th>
                                    <th>editar</th>
                                    <th>eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($permisos as $p) : ?>
                                    <input type="hidden" name="<?= $p->title ?>[id]" value="<?= $p->id ?>">
                                    <tr>
                                        <td><?= $p->title ?></td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="<?= $p->title ?>[read]" type="checkbox" <?= $p->read == 1 ? 'checked' : '' ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="<?= $p->title ?>[create]" type="checkbox" <?= $p->create == 1 ? 'checked' : '' ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="<?= $p->title ?>[update]" type="checkbox" <?= $p->update == 1 ? 'checked' : '' ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="<?= $p->title ?>[delete]" type="checkbox" <?= $p->delete == 1 ? 'checked' : '' ?>>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                        </div>
                    </form>
                </div>

            </div>


        </div>

    </div> <!-- container -->

</div> <!-- content -->
<?= extend('/backend/layout/footer.php') ?>