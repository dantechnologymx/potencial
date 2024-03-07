<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">
                        <?php echo isset($mensaje)?$mensaje:'Layers'; ?>
                        </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">
                                        <?php echo 'Airwatch'; ?>
                                    </a></li>
                                <?php if (isset($li_2)) { ?>
                                    <li class="breadcrumb-item active">
                                        <?php echo $li_2 ?>
                                    </li>
                                <?php } else { ?>
                                    <li class="breadcrumb-item active">Nuevo Layers</li>
                                <?php } ?>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-11">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <?php echo isset($layer) ? 'Layer ' . $layer->tag_etiqueta : 'Nuevo Layer'; ?>
                                </h4>

                            </div>
                            <div class="card-body">
                                <form
                                    action="<?php echo isset($layer) ? site_url() . '/C_layers/updateLayer/' . $layer->Id : site_url() . '/C_layers/guardarLayer/'; ?>"
                                    method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                                <div>
                                                    <label for="regexp-mask" class="form-label">Nombre de la
                                                        capa</label>
                                                    <input type="text" name="tag_etiqueta" class="form-control"
                                                        value="<?php echo isset($layer) ? $layer->tag_etiqueta : ''; ?>"
                                                        required>
                                                </div>

                                                <div class="mt-4">
                                                    <label for="phone-mask" class="form-label">Unidad de
                                                        medicion</label>
                                                    <input type="text" name="Unidad_de_Medida" class="form-control"
                                                        value="<?php echo isset($layer) ? $layer->Unidad_de_Medida : ''; ?>"
                                                        required>
                                                </div>
                                                <div class="mt-4">
                                                    <label for="number-mask" class="form-label">Valor Minimo</label>
                                                    <input type="text" name="valor_minimo" class="form-control"
                                                        value="<?php echo isset($layer) ? $layer->valor_minimo : ''; ?>"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mt-4 mt-lg-0">
                                                <div>
                                                    <label for="date-mask" class="form-label">Valor Maximo</label>
                                                    <input type="text" name="valor_maximo" class="form-control"
                                                        value="<?php echo isset($layer) ? $layer->valor_maximo : ''; ?>"
                                                        required>
                                                </div>

                                                <div class="mt-4">
                                                    <label class="form-label">Icono</label>
                                                    <input type="text" name="Icono" class="form-control"
                                                        value="<?php echo isset($layer) ? $layer->Icono : ''; ?>"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <label class="form-label">Estatus</label>
                                                <select name="habilitado" class="form-select" required>
                                                    <option value="" disabled selected>Seleccione un Estatus</option>
                                                    <?php foreach ($Estatus as $estatus => $Nombre): ?>
                                                        <option value="<?php echo $estatus; ?>" <?php if (isset($layer) && $layer->habilitado == $estatus): ?>selected<?php endif; ?>>
                                                            <?php echo $Nombre ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="input-group input-group-outline <?php echo isset($layer) ? 'is-filled' : '' ?>"
                                            required>
                                        </div>
                                        <!-- end row -->
                                        <?php
                                        echo isset($layer) ?
                                            '<input type="hidden" name="Id" class="form-control" value="' . $layer->Id . '">'
                                            : '';
                                        ?>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6"></div>
                                            <div class="col-lg-3">
                                                <div class="mx-4">
                                                    <button class="btn btn-primary waves-effect waves-light w-lg form-control">Guardar</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mx-4">
                                                    <a class="btn btn-danger waves-effect waves-light w-lg form-control"
                                                        href="<?php echo site_url(); ?>/C_layers/layers"
                                                        type="button">Cancelar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <!-- end form -->
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->