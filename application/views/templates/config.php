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
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo 'Airwatch'; ?></a></li>
                            <?php if(isset($li_2)){  ?>
                                <li class="breadcrumb-item active"><?php echo $li_2 ?></li>
                            <?php }else{ ?>
                                <li class="breadcrumb-item active">Configuracion</li>
                            <?php } ?>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->



<div class="row">
    <div class="col-md-6 col-xl-4">

        <!-- Simple card -->
        <div class="card text" style="max-width: 150%; height: 150%;">
            <img class="card-img-top img-fluid" src="<?php echo base_url(); ?>assets/images/small/Nanoenvi-EQ.png"
                alt="Card image cap" style="max-width: 50%; height: 50%; display: block; margin: 0 auto;">
            <div class="card-body">
                <h4 class="card-title">Estaciones</h4>
                <a class="btn btn-primary btn-rounded waves-effect waves-light"
                    href="<?php echo site_url()."/C_configuracion/estaciones/"?>">
                    <i class="bx bxs-pencil"></i>&nbsp;&nbsp;Seleccionar
                </a>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-md-6 col-xl-4">

        <!-- Simple card -->
        <div class="card" style="max-width: 150%; height: 150%;">
            <img class="card-img-top img-fluid" src="<?php echo base_url(); ?>assets/images/small/Conexiones.png"
                alt="Card image cap" style="max-width: 50%; height: 50%; display: block; margin: 0 auto;">
            <div class="card-body">
                <h4 class="card-title">Conexion</h4>
                <a class="btn btn-primary btn-rounded waves-effect waves-light"
                    href="<?php echo site_url()."/C_configuracion/pconexion/"?>">
                    <i class="bx bxs-pencil"></i>&nbsp;&nbsp;Seleccionar
                </a>
            </div>
        </div>

    </div><!-- end col -->

    <div class="col-md-6 col-xl-4">

        <!-- Simple card -->
        <div class="card" style="max-width: 150%; height: 150%;">
            <img class="card-img-top img-fluid" src="<?php echo base_url(); ?>assets/images/small/map.png"
                alt="Card image cap" style="max-width: 50%; height: 50%; display: block; margin: 0 auto;">
            <div class="card-body">
                <h4 class="card-title">Ubicaciones</h4>
                <a class="btn btn-primary btn-rounded waves-effect waves-light"
                    href="<?php echo site_url()."/C_configuracion/Ubicaciones/"?>">
                    <i class="bx bxs-pencil"></i>&nbsp;&nbsp;Seleccionar
                </a>
            </div>
        </div>

    </div><!-- end col -->