<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18"><?php echo isset($mensaje)?$mensaje:'dashboard'; ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo 'Airwatch'; ?></a></li>
                            <?php if(isset($li_2)){  ?>
                                <li class="breadcrumb-item active"><?php echo $li_2 ?></li>
                            <?php }else{ ?>
                                <li class="breadcrumb-item active">Inicio</li>
                            <?php } ?>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


<div class="row ">
    <div class="col-lg-12 h-100 d-inline-block">
        <div class="card card-h-100">
            <div class="card-body">
                <div id="gmaps-overlay" class="gmaps" style=" position: inherit !important "></div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<div class="row">
    <!--<div class="col-lg-12 h-100 d-inline-block"> 
         <div class="d-flex flex-column"> -->
            <div class="col-md-12"><h4>Variables Meteorológicas<h4></div>
                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/temp' ?>">Temperatura</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $t = $temp[array_key_first($temp)]; echo floor($t->v*100)/100; ?>"><?php echo floor($t->v*100)/100; ?></span>&nbsp;°C
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series1"
                                        value="<?php foreach($temp as $t) {echo $t->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $temp[count($temp)-1]; $actual = $temp[array_key_first($temp)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/hum' ?>">Humedad Relativa</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $h = $hum[array_key_first($hum)]; echo floor($h->v*100)/100; ?>"><?php echo floor($h->v*100)/100; ?></span>&nbsp;%RH
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series2"
                                        value="<?php foreach($hum as $h) {echo $h->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $hum[count($hum)-1]; $actual = $hum[array_key_first($hum)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col-->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/prb' ?>">Presión Atmosférica</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $r = $prb[array_key_first($prb)]; echo floor($r->v*100)/100; ?>"><?php echo floor($r->v*100)/100; ?></span>&nbsp;hPa
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series3"
                                        value="<?php foreach($prb as $r) {echo $r->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $prb[count($prb)-1]; $actual = $prb[array_key_first($prb)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/wdr' ?>">Dirección del Viento</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $p = $wdr[array_key_first($wdr)]; echo $p->v; ?>"><?php echo $p->v; ?></span>&nbsp;°
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series4"
                                        value="<?php foreach($wdr as $p) {echo $p->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $wdr[count($wdr)-1]; $actual = $wdr[array_key_first($wdr)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    <!-- </div><!-- end col
               </div> end flex-column-->
     </div>
</div> <!-- end row -->
<div class="row">
    <!--<div class="col-lg-12 h-100 d-inline-block"> 
         <div class="d-flex flex-column"> -->
                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/wsp' ?>">Velocidad del Viento</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $t = $wsp[array_key_first($wsp)]; echo floor($t->v*100)/100; ?>"><?php echo floor($t->v*100)/100; ?></span>&nbsp;m/s
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series5"
                                        value="<?php foreach($wsp as $t) {echo $t->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart5" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $wsp[count($wsp)-1]; $actual = $wsp[array_key_first($wsp)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/raf' ?>">Precipitación Pluvial</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $h = $raf[array_key_first($raf)]; echo floor($h->v*100)/100; ?>"><?php echo floor($h->v*100)/100; ?></span>&nbsp;mm/h
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series6"
                                        value="<?php foreach($raf as $h) {echo $h->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart6" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $raf[count($raf)-1]; $actual = $raf[array_key_first($raf)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col-->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/rad' ?>">Radiación</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $r = $rad[array_key_first($rad)]; echo floor($r->v*100)/100; ?>"><?php echo floor($r->v*100)/100; ?></span>&nbsp;W/m2
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series7"
                                        value="<?php foreach($rad as $r) {echo $r->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart7" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $rad[count($rad)-1]; $actual = $rad[array_key_first($rad)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

</div> <!-- end row -->

<div class="row">
    <!--<div class="col-lg-12 h-100 d-inline-block"> 
         <div class="d-flex flex-column"> -->
            <div class="col-md-12"><h4>Calidad del Aire<h4></div>
                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/pm1' ?>">PM1</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $t = $pm1[array_key_first($pm1)]; echo floor($t->v*100)/100; ?>"><?php echo floor($t->v*100)/100; ?></span>&nbsp;µg/m3
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series8"
                                        value="<?php foreach($pm1 as $t) {echo $t->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart8" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $pm1[count($pm1)-1]; $actual = $pm1[array_key_first($pm1)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/pm25' ?>">PM 2.5</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $h = $pm25[array_key_first($pm25)]; echo floor($h->v*100)/100; ?>"><?php echo floor($h->v*100)/100; ?></span>&nbsp;µg/m3
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series9"
                                        value="<?php foreach($pm25 as $h) {echo $h->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart9" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $pm25[count($pm25)-1]; $actual = $pm25[array_key_first($pm25)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col-->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/pm10' ?>">PM 10</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $r = $pm10[array_key_first($pm10)]; echo floor($r->v*100)/100; ?>"><?php echo floor($r->v*100)/100; ?></span>&nbsp;µg/m3
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series10"
                                        value="<?php foreach($pm10 as $r) {echo $r->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart10" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $pm10[count($pm10)-1]; $actual = $pm10[array_key_first($pm10)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

</div> <!-- end row -->
<div class="row">
    <!--<div class="col-lg-12 h-100 d-inline-block"> 
         <div class="d-flex flex-column"> -->
                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/no2' ?>">NO2</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $t = $no2[array_key_first($no2)]; echo floor($t->v*100)/100; ?>"><?php echo floor($t->v*100)/100; ?></span>&nbsp;ppb
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series11"
                                        value="<?php foreach($no2 as $t) {echo $t->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart11" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $no2[count($no2)-1]; $actual = $no2[array_key_first($no2)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/co' ?>">CO</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $h = $co[array_key_first($co)]; echo floor($h->v*100)/100; ?>"><?php echo floor($h->v*100)/100; ?></span>&nbsp;ppm
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series12"
                                        value="<?php foreach($co as $h) {echo $h->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart12" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $co[count($co)-1]; $actual = $co[array_key_first($co)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col-->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/no' ?>">NO</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $r = $no[array_key_first($no)]; echo floor($r->v*100)/100; ?>"><?php echo floor($r->v*100)/100; ?></span>&nbsp;ppb
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series13"
                                        value="<?php foreach($no as $r) {echo $r->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart13" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $no[count($no)-1]; $actual = $no[array_key_first($no)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-3">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate"><h3><a href="<?php echo site_url().'/C_reportes/reportsextend/o3' ?>">O3</a></h3></span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php $p = $o3[array_key_first($o3)]; echo floor($p->v*100)/100; ?>"><?php echo floor($p->v*100)/100; ?></span>&nbsp;ppb
                                        </h4>
                                    </div>
                                    <input type="hidden" id="data-series14"
                                        value="<?php foreach($o3 as $p) {echo $p->v.",";} ?>">
                                    <div class="col-12">
                                        <div id="mini-chart14" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <?php $original = $o3[count($o3)-1]; $actual = $o3[array_key_first($o3)]; $variacion = $actual->v - $original->v; $divisor = ($original->v <= 0) ? 1 : $original->v;?>
                                    <span class="badge bg-soft-<?php echo ($variacion >= 0)? 'success':'danger'; ?> text-<?php echo ($variacion >= 0)? 'success':'danger'; ?>"><?php echo bcdiv(($variacion/$divisor * 100),'1',2) ?>%</span>
                                    <span class="ms-1 text-muted font-size-13">desde hace una hora</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    <!-- </div><!-- end col
               </div> end flex-column-->
     </div>
</div> <!-- end row -->