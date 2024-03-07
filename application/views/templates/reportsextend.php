
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="page-title mb-0 font-size-18"><?php echo isset($mensaje)?$mensaje:'Reportes'; ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo 'Airwatch'; ?></a></li>
                                    <?php if(isset($li_2)){  ?>
                                        <li class="breadcrumb-item active"><?php echo $li_2 ?></li>
                                    <?php }else{ ?>
                                        <li class="breadcrumb-item active">Reportes</li>
                                    <?php } ?>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0" id="layer_seleccionado"><?php echo $layer_seleccionado->Nombre; ?></h4>
                            </div>
                            <div class="card-body">

                                <canvas id="lineChart" height="400" data-colors='["rgba(81, 86, 190, 0.2)", "#5156be", "rgba(235, 239, 242, 0.2)", "#ebeff2"]'></canvas>
                                <input type="hidden" id="chart-data" value="<?php  foreach($measures as $measuresT) { echo round($measuresT->v,4).","; } ?>" />
                                <input type="hidden" id="chart-data-label" value="<?php foreach($measures as $measuresT) { echo date("Y-m-d H:i:s", strtotime($measuresT->timestamp."-6 hours")).","; } ?>" />
                            </div>
                        </div>
                    </div> <!-- end col -->

                </div> <!-- end row -->

                <form action="<?php echo site_url().'/C_reportes/reportsextend/' ?>" method="post">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label class="form-label">Variable</label>
                                    <select name ="variable" class="form-select">
                                        <?php foreach($layers as $layer) {?>
                                            <option value="<?php echo $layer->tag_AWS;?>" <?php echo $layer_seleccionado->Id == $layer->Id ? 'selected' : ''; ?>><?php echo $layer->Nombre; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <div>
                                        <label for="example-datetime-local-input" class="form-label">Desde</label>
                                        <input name="desde" class="form-control" type="datetime-local" value="<?php echo $desde; ?>" id="example-datetime-local-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <div>
                                        <label for="example-datetime-local-input" class="form-label">Hasta</label>
                                        <input name="hasta" class="form-control" type="datetime-local" value="<?php echo $hasta; ?>" id="example-datetime-local-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                <div class="mx-4">
                                    <label for="example-button" class="form-label">&nbsp;</label>
                                    <button type="submit" class="form-control btn btn-primary waves-effect waves-light w-lg ">Visualizar</button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </form>

                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>MQTT_DATA_ID</th>
                                        <th>Lectura</th>
                                        <th>timestamp</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php foreach($measures as $measuresT){?>

                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?php echo $measuresT->mqtt_data_id; ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?php echo round($measuresT->v,4); ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?php echo date("Y-m-d H:i:s", strtotime($measuresT->timestamp."-6 hours")); ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div><!-- end cardaa -->
                    </div><!-- end col -->
                    
                </div> <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
