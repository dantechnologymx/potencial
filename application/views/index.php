<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title>Air Watch</title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maps.google.com/maps/api/js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/gmaps.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/prettify.js"></script>
	<!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?php echo base_url(); ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

</head>
<body>
	<header>
		<div class="row">
			<div class="col s4">
				<div class="col s6">
					<a href="https://www.ucol.mx/" title="ucol.mx">
						<img class="responsive-img" src="<?php echo base_url(); ?>assets/img/UdeC_2L izq_Negro 80_.png" alt="ucol.mx">
					</a> 
				</div>
				<div class="col s6">
					<a href="https://www.conacyt.mx/" title="conacyt.mx">
						<img class="responsive-img" src="<?php echo base_url(); ?>assets/img/logo-conacyt.png" alt="conacyt.mx">
					</a>
				</div>
				
			</div>
			<div class="col s8">
				<div class="col s6 offset-s6">

					<a href="<?php echo site_url('c_login/index');?>" title="Acceso">
						<span class="tiempo-tarjeta">
						<i class="material-icons left text-blue" width="32" height="32">login</i>&nbsp;&nbsp;&nbsp;
							<span class="datos texto-1">
								<h4 class="lugar">
									<strong class="texto-2">Acceso</strong>
									<span>Login</span>
								</h4>
								<span id="fav-carrusel-der" class="icon"> 
									<svg viewBox="0 0 24 24">
										<path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"></path>
									</svg> 
								</span>
							</span>
						</span>
					</a>
				</div>
			</div>
		</div> 
	</header>

</body>
</html>