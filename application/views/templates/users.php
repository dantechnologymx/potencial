<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18"><?php echo isset($mensaje)?$mensaje:'Usuarios'; ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo 'Airwatch'; ?></a></li>
                            <?php if(isset($li_2)){  ?>
                                <li class="breadcrumb-item active"><?php echo $li_2 ?></li>
                            <?php }else{ ?>
                                <li class="breadcrumb-item active">Usuarios</li>
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
                    <h4 class="card-title">Usuarios</h4>
                </div>
                <div class="col-12 align-right">
                    <a class="btn btn-primary waves-effect waves-light"
                        href="<?php echo site_url()."/C_users/newUser/"?>"><i
                            class="material-icons text-sm">+</i>&nbsp;&nbsp;Nuevo Usuario</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-rep-plugin">
                <div class="table-responsive mb-0" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table table-striped">
                        <thead>
                            <tr>
                                <th data-priority="1">USUARIO</th>
                                <th data-priority="1">PERFIL</th>
                                <th data-priority="1">ULTIMO ACCESO</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($Usuarios as $user){?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="<?php echo base_url(); ?>assets/img/<?php echo $user->Imagen_Perfil; ?>.jpg"
                                                class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">
                                                <?php echo $user->Nombre_S." ".$user->Apellido_Paterno." ".$user->Apellido_Materno; ?>
                                            </h6>
                                            <p class="text-xs text-secondary mb-0"><?php echo $user->Usuario; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"><?php echo $Roles[$user->Id_Rol]; ?></p>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold"><?php echo $user->Ultimo_Ingreso; ?></span>
                                </td>
                                <td class="align-middle">
                                    <a href="<?php echo site_url()."/C_users/edituser/".$user->Id ?>"
                                        class="text-secondary font-weight-bold text-xs btn btn-outline-warning" data-toggle="tooltip"
                                        data-original-title="Edit user">
                                        Modificar
                                    </a>

                                    <a href="#"
                                           class="font-weight-bold text-xs btn btn-<?php echo ($user->Id_Estatus == 1)?'success':'danger'; ?>" data-toggle="tooltip"
                                           data-original-title="Estatus" disabled>
                                           <?php echo ($user->Id_Estatus == 1)?'Activo':'Inactivo'; ?>
                                       </a>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>