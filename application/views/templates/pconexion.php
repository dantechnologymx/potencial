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
                                <li class="breadcrumb-item active">Conexiones</li>
                            <?php } ?>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


   
   <div class="row">
       <div class="col-12">
           <div class="card">
               <div class="card-header col-12 d-flex align-items-center">
                   <div class="col-10">
                       <h4 class="card-title">Conexiones</h4>
                   </div>
               </div>
           </div>
           <div class="card-body">
               <div class="table-rep-plugin">
                   <div class="table-responsive mb-0" data-pattern="priority-columns">
                       <table id="tech-companies-1" class="table table-striped">
                           <thead>
                               <tr>
                                   <th data-priority="1">ID</th>
                                   <th data-priority="1">IP</th>
                                   <th data-priority="1">ENDPOINT</th>
                                   <th data-priority="1">USUARIO</th>
                                   <th data-priority="1">CONTRASEÑA</th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php foreach($Conexiones as $conexiones){?>
                               <tr>
                                <td>
                                <div class="d-flex px-2 py-1">
                                           <div class="d-flex flex-column justify-content-center">
                                               <h6 class="mb-0 text-sm"><?php echo $conexiones->Id; ?></h6>
                                           </div>
                                       </div>
                                </td>
                                   <td>
                                       <div class="d-flex px-2 py-1">
                                           <div class="d-flex flex-column justify-content-center">
                                               <h6 class="mb-0 text-sm"><?php echo $conexiones->ip; ?></h6>
                                           </div>
                                       </div>
                                   </td>

                                   <td class="align-middle text-center text-sm">
                                       <span
                                           class="text-secondary text-xs font-weight-bold"><?php echo $conexiones->endpoint;?></span>
                                   </td>
                                   <td class="align-middle text-center">
                                       <span
                                           class="text-secondary text-xs font-weight-bold"><?php echo $conexiones->usuario; ?></span>
                                   </td>
                                   <td class="align-middle text-center">
                                       <span
                                           class="text-secondary text-xs font-weight-bold"><?php echo $conexiones->contrasena; ?></span>
                                   </td>
                                   <td class="align-middle">
                                       <a href="<?php echo site_url()."/C_configuracion/editConexion/".$conexiones->Id ?>"
                                           class="text-secondary font-weight-bold text-xs btn btn-outline-warning" data-toggle="tooltip"
                                           data-original-title="Editar Conexion">
                                           Modificar
                                       </a>

                                   </td>
                               </tr>
                               <?php } ?>
                           </tbody>
                       </table>
                   </div> 