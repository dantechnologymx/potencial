<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18"><?php echo isset($mensaje)?$mensaje:'Configuracion'; ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo 'Airwatch'; ?></a>
                                </li>
                                <?php if(isset($li_2)){  ?>
                                <li class="breadcrumb-item active"><?php echo $li_2 ?></li>
                                <?php }else{ ?>
                                <li class="breadcrumb-item active">Editar Conexion</li>
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
                                <h4 class="card-title"><?php echo isset($conexion) ? 'Estacion '.$conexion->ip : 'Nueva Conexion'; ?></h4>
                                </div>
                                <div class="card-body">

                                <form action="<?php echo isset($conexion) ? site_url().'/C_configuracion/updateConexion/'.$conexion->Id : site_url().'/C_configuracion/guardarConexion/';?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <div>
                                                        <label for="regexp-mask" class="form-label">IP</label>
                                                        <input type="text" name="ip" class="form-control"
                                                            value="<?php echo isset($conexion) ? $conexion->ip : ''; ?>" required>
                                                    </div>

                                                    <div class="mt-4">
                                                        <label for="phone-mask" class="form-label">Usuario
                                                          </label>
                                                        <input type="text" name="usuario" class="form-control"
                                                            value="<?php echo isset($conexion) ? $conexion->usuario:''; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="mt-4 mt-lg-0">
                                                    <div>
                                                        <label for="date-mask" class="form-label">Endpoint</label>
                                                        <input type="text" name="endpoint" class="form-control"
                                                            value="<?php echo isset($conexion) ? $conexion->endpoint :''; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                        <label for="number-mask" class="form-label">Contraseña
                                                            </label>
                                                        <input type="text" name="contrasena" class="form-control"
                                                            value="<?php echo isset($conexion) ? $conexion->contrasena :''; ?>" required>
                                                    </div>
                                            </div>

                                            </div>

                                            
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        <?php
                                        echo isset($conexion) ?
                                            '<input type="hidden" name="Id" class="form-control" value="' . $conexion->Id . '">'
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
                                                        href="<?php echo site_url(); ?>/C_configuracion/pconexion"
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
