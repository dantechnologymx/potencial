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
                                <h4 class="card-title"><?php echo isset($estacion) ? 'Estacion '.$estacion->Nombre : 'Nueva Estacion'; ?></h4>
                                </div>
                                <div class="card-body">

                                <form action="<?php echo isset($estacion) ? site_url().'/C_configuracion/updateEstaciones/'.$estacion->Id : site_url().'/C_configuracion/guardarEstacion/';?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <div>
                                                        <label for="regexp-mask" class="form-label">Nombre de Estacion</label>
                                                        <input type="text" name="Nombre" class="form-control"
                                                            value="<?php echo isset($estacion) ? $estacion->Nombre : ''; ?>" required>
                                                    </div>

                                                    <div class="mt-4">
                                                        <label for="phone-mask" class="form-label">UUID
                                                          </label>
                                                        <input type="text" name="uuid" class="form-control"
                                                            value="<?php echo isset($estacion) ? $estacion->uuid:''; ?>" required>
                                                    </div>
                                                    <div class="mt-4">
                                                        <label for="number-mask" class="form-label">Marca
                                                            </label>
                                                        <input type="text" name="marca" class="form-control"
                                                            value="<?php echo isset($estacion) ? $estacion->marca :''; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="mt-4 mt-lg-0">
                                                    <div>
                                                        <label for="date-mask" class="form-label">Modelo</label>
                                                        <input type="text" name="modelo" class="form-control"
                                                            value="<?php echo isset($estacion) ? $estacion->modelo :''; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                        <label class="form-label">Locacion</label>
                                                    <select name="Id_location" class="form-select" required>
                                                        <option value="" disabled selected >Seleccione una Locacion</option>
                                                        <?php foreach ($Locacion as $loc =>$Ubicacion): ?>
                                                        <option value="<?php echo $loc; ?>" <?php if (isset($estacion) && $estacion->Id_location == $loc): ?>selected<?php endif; ?>>
                                                        <?php echo $Ubicacion['Descripcion'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||  Lat: " . $Ubicacion['Latitud'] . " | Long: " . $Ubicacion['Longitud'] . "  || </p>";?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>


                                                <div class="mt-4">
                                                        <label class="form-label">Estatus</label>
                                                        <select name="Id_estatus" class="form-select" required>
                                                        <option value="" disabled selected >Seleccione un Estatus</option>
                                                        <?php foreach ($Estatus as $estatus =>$Nombre): ?>
                                                        <option value="<?php echo $estatus; ?>" <?php if (isset($estacion) && $estacion->Id_estatus == $estatus): ?>selected<?php endif; ?>>
                                                        <?php echo $Nombre?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                </div>

                                            </div>

                                            </div>

                                            
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        <?php
                                        echo isset($estacion) ?
                                            '<input type="hidden" name="Id" class="form-control" value="' . $estacion->Id . '">'
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
                                                        href="<?php echo site_url(); ?>/C_configuracion/estaciones"
                                                        type="button">Cancelar</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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
