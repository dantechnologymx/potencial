<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18"><?php echo isset($mensaje)? $mensaje : 'Reportes'; ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo 'Airwatch'; ?></a></li>
                            <?php if(isset($li_2)){  ?>
                                <li class="breadcrumb-item active"><?php echo $li_2 ?></li>
                            <?php }else{ ?>
                                <li class="breadcrumb-item active">Variables de medición</li>
                            <?php } ?>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


            
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>MQTT_DATA_ID</th>
                                    <th>N</th>
                                    <th>U</th>
                                    <th>V</th>
                                    <th>TIMESTAMP</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php foreach($Measures as $measuresT){?>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?php echo $measuresT->id; ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>

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
                                                <h6 class="mb-0 text-sm"><?php echo $measuresT->n; ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?php echo $measuresT->u; ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?php echo $measuresT->v; ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?php echo $measuresT->timestamp; ?>
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
            </div> 
            </div> <!-- container-fluid -->
            </div>