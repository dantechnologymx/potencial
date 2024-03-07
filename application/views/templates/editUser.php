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
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo 'Airwatch'; ?></a>
                                </li>
                                <?php if(isset($li_2)){  ?>
                                <li class="breadcrumb-item active"><?php echo $li_2 ?></li>
                                <?php }else{ ?>
                                <li class="breadcrumb-item active">Editar Usuarios</li>
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
                                        <?php echo isset($user) ? $user->Nombre_S." ".$user->Apellido_Paterno." ".$user->Apellido_Materno : 'Nuevo Usuario'; ?>
                                    </h4>
                                </div>
                                <div class="card-body">

                                <form action="<?php echo isset($user) ? site_url().'/C_users/updateUsuario/'.$user->Id : site_url().'/C_users/GuardarUsuario/';?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <div>
                                                        <label for="regexp-mask" class="form-label">Nombres</label>
                                                        <input type="text" name="Nombre_S" class="form-control"
                                                            value="<?php echo isset($user) ? $user->Nombre_S : ''; ?>" required>
                                                    </div>

                                                    <div class="mt-4">
                                                        <label for="phone-mask" class="form-label">Apellido
                                                            Paterno</label>
                                                        <input type="text" name="Apellido_Paterno" class="form-control"
                                                            value="<?php echo isset($user) ? $user->Apellido_Paterno:''; ?>" required>
                                                    </div>
                                                    <div class="mt-4">
                                                        <label for="number-mask" class="form-label">Apellido
                                                            Materno</label>
                                                        <input type="text" name="Apellido_Materno" class="form-control"
                                                            value="<?php echo isset($user) ? $user->Apellido_Materno :''; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="mt-4 mt-lg-0">
                                                    <div>
                                                        <label for="date-mask" class="form-label">Usuario</label>
                                                        <input type="text" name="Usuario" class="form-control"
                                                            value="<?php echo isset($user) ? $user->Usuario :''; ?>" required>
                                                    </div>

                                                    <div class="mt-4">
                                                        <label class="form-label">Rol</label>
                                                        <select name="Id_Rol" class="form-select" required>
                                                        <option value="" disabled selected >Seleccione un Rol</option>
                                                        <?php foreach ($Roles as $rol =>$Nombre): ?>
                                                        <option value="<?php echo $rol; ?>" <?php if (isset($user) && $user->Id_Rol == $rol): ?>selected<?php endif; ?>>
                                                        <?php echo $Nombre?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                     <div class="mt-4">
                                                        <label class="form-label">Estatus</label>
                                                        <select name="Id_Estatus" class="form-select" required>
                                                        <option value="" disabled selected >Seleccione un Estatus</option>
                                                        <?php foreach ($Estatus as $estatus =>$Nombre): ?>
                                                        <option value="<?php echo $estatus; ?>" <?php if (isset($user) && $user->Id_Estatus == $estatus): ?>selected<?php endif; ?>>
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
                                        echo isset($user) ?
                                            '<input type="hidden" name="Id" class="form-control" value="' . $user->Id . '">'
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
                                                        href="<?php echo site_url(); ?>/C_users/users"
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