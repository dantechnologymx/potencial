<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="<?php echo site_url(); ?>/C_inicio/index">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard"><?= ('Inicio') ?></span>
                    </a>
                </li>

              
                <li>
                    <a href="<?php echo site_url(); ?>/C_configuracion/config">
                        <i data-feather="settings"></i>
                        <span data-key="t-dashboard"><?= ('Configuracion') ?></span>
                    </a>
                </li>

                
                <li>
                    <a href="<?php echo site_url(); ?>/C_layers/layers">
                        <i data-feather="grid"></i>
                        <span data-key="t-dashboard"><?= ('Layers') ?></span>
                    </a>
                </li>

                
                <li>
                    <a href="<?php echo site_url(); ?>/C_users/users">
                        <i data-feather="user"></i> 
                        <span data-key="t-dashboard"><?= ('Usuarios') ?></span>
                    </a>
                </li>

                
                <li>
                
                <a href="javascript: void(0);"  class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages"><?= ('Reportes') ?></span>
                    </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="<?php echo site_url(); ?>/C_reportes/reportsextend/temp" data-key="t-dashboard"><?= ('Personalizado') ?></a></li>
                    <li><a href="<?php echo site_url(); ?>/C_reportes/mqtt_data" data-key="t-dashboard"><?= ('Datos de estación') ?></a></li>
                    <li><a href="<?php echo site_url(); ?>/C_reportes/reports" data-key="t-dashboard"><?= ('Variables de medición') ?></a></li>
                    
                </ul>
                </li>
            </ul>
        </div>           
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->