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
                                <li class="breadcrumb-item active">Editar Estaciones</li>
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
                                <h4 class="card-title"><?php echo isset($Ubicacion) ? 'Ubicacion '.$Ubicacion->Descripcion : 'Nueva Ubicacion'; ?></h4>
                                </div>
                                <div class="card-body">

                                <form action="<?php echo isset($Ubicacion) ? site_url().'/C_configuracion/updateUbicaciones/'.$Ubicacion->Id : site_url().'/C_configuracion/guardarUbicaciones/';?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>

                                                <div>
                                                        <label for="phone-mask" class="form-label">Descripcion
                                                          </label>
                                                        <input type="text" name="Descripcion" class="form-control"
                                                            value="<?php echo isset($Ubicacion) ? $Ubicacion->Descripcion:''; ?>" required>
                                                    </div>

                                                    <div class="mt-4">
                                                        <label for="phone-mask" class="form-label">Longitud
                                                          </label>
                                                        <input type="text" name="Longitud" class="form-control"
                                                            value="<?php echo isset($Ubicacion) ? $Ubicacion->Longitud:''; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->

                                            <div class="col-lg-6">
                                                <div>
                                                    <div>
                                                        <label for="regexp-mask" class="form-label">Ubicacion</label>
                                                        <input type="text" name="Ubicacion_Geografica" class="form-control"
                                                            value="<?php echo isset($Ubicacion) ? $Ubicacion->Ubicacion_Geografica : ''; ?>" required>
                                                    </div>

                                                    <div class="mt-4">
                                                        <label for="phone-mask" class="form-label">Latitud
                                                          </label>
                                                        <input type="text" name="Latitud" class="form-control"
                                                            value="<?php echo isset($Ubicacion) ? $Ubicacion->Latitud:''; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -

                                            
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        <?php
                                        echo isset($Ubicacion) ?
                                            '<input type="hidden" name="Id" class="form-control" value="' . $Ubicacion->Id . '">'
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
                                                        href="<?php echo site_url(); ?>/C_configuracion/Ubicaciones"
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
