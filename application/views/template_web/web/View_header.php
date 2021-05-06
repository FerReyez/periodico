<!DOCTYPE html>
<html lang="es">

<head>
	<title>Periodico Digital | <?php echo $titulo ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo base_url(); ?>">

	<!-- site icons -->
	<link rel="icon" href="<?php echo base_url() ?>assets/web/images/fevicon/fevicon.png" type="image/gif" />
	<!-- bootstrap css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/bootstrap.min.css" />
	<!-- Site css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/style.css" />
	<!-- responsive css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/responsive.css" />
	<!-- colors css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/colors1.css" />
	<!-- custom css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/custom.css" />
	<!-- wow Animation css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/animate.css" />
	<!-- revolution slider css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/revolution/css/settings.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/revolution/css/layers.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/revolution/css/navigation.css" />
</head>

	<body id="default_theme" class="it_service">
	<div>
	<!-- loader -->
	<div class="bg_load"><img class="loader_animation" src="<?php echo base_url() ?>assets/web/papper.png" alt="#" /> </div>
	<!-- end loader -->
	<!-- header -->
	<header id="default_header" class="header_style_1">
		<!-- header bottom -->
		<!-- <div class="header_bottom" style="position: fixed; background-color:white;"> -->
		<div class="header_bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
						<!-- logo start -->
						<div class="logo"> <a href="<?php echo base_url() ?>inicio"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="logo" /></a> </div>
						<!-- logo end -->
					</div>
					<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
						<!-- menu start -->
						<div class="menu_side">
							<div id="navbar_menu">
								<ul class="first-ul">
									<li><a href="<?php echo base_url() ?>noticias">Noticias USAM</a></li>
									<li> <a class="active" href="<?php echo base_url() ?>noticias">Nacionales</a>
										<ul>
											<li><a href="<?php echo base_url() ?>noticias">Politica</a></li>
											<li><a href="<?php echo base_url() ?>noticias">Sucesos</a></li>
											<li><a href="<?php echo base_url() ?>noticias">Economia</a></li>
										</ul>
									</li>
									<li><a href="<?php echo base_url() ?>noticias">Deportes</a></li>
									<li> <a href="<?php echo base_url() ?>noticias">Revista</a>
										<ul>
											<li><a href="<?php echo base_url() ?>noticias">Espectaculos</a></li>
											<li><a href="<?php echo base_url() ?>noticias">Arte y Cultura</a></li>
											<li><a href="<?php echo base_url() ?>noticias">Reportajes</a></li>
											<li><a href="<?php echo base_url() ?>noticias">Academico</a></li>
											<li><a href="<?php echo base_url() ?>noticias">Tecnologia</a></li>
											<li><a href="<?php echo base_url() ?>personas">Perfiles</a></li>
										</ul>
									</li>
									<li><a href="<?php echo base_url() ?>editorial">Editorial - Opiniones</a></li>
									<li><a href="<?php echo base_url() ?>noticias">Ediciones</a></li>
								</ul>
								</div>
								<div class="search_icon">
									<ul>
										<li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
					</div>
				</div>
			</div>
	</header>
</body>

<style>
	.header_bottom {
		position: relative;
		/* default colors + transition */
		background-color: white;
		color: black;
		transition: all 0.3s ease-out;
	}

	/* scrolling state */
	.header_bottom.fixed-top {
	position: fixed;
	top: 0;
	width: 100%;
	/* scrolling colors */
	background-color: white;
	color: white;
	}

	.header_bottom.fixed-top a {
	color: white;
	}

	.bg_load {
		background-color: white !important;
	}
</style>
<script>
	document.addEventListener("scroll", function () {
	const navbar = document.querySelector(".header_bottom");
	const navbarHeight = 100;

	const distanceFromTop = Math.abs(
		document.body.getBoundingClientRect().top
	);

	if (distanceFromTop >= navbarHeight) navbar.classList.add("fixed-top");
	else navbar.classList.remove("fixed-top");
	});
</script>