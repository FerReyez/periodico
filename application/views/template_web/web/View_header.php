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

	<link href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>

	<script>
		host = "<?php echo base_url(); ?>"
	</script>
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
									<?php foreach ($menus as $m) { ?>
										<?php if($m['nc_categoria'] == NULL) { ?>
											<?php if($m['count'] > 0) { ?>
												<li><a><?php echo $m['nc_noticia']; ?></a>
													<ul>
													<?php foreach ($opciones as $o) { ?>
														<?php if($m['id_cat_noticia'] == $o['nc_categoria']) { ?>
															<li><a href="" id="btnMenu" data-btnMenuId="<?php echo $o['id_cat_noticia']; ?>"><?php echo $o['nc_noticia']; ?></a></li>
														<?php } ?>
													<?php } ?>
													</ul>
												</li>
											<?php } else { ?>
												<li><a href="" id="btnMenu" data-btnMenuId="<?php echo $m['id_cat_noticia']; ?>"><?php echo $m['nc_noticia']; ?></a></li>
											<?php } ?>
										<?php } ?>
									<?php } ?>
									<li><a href="<?php echo base_url() ?>personas">Perfiles</a></li>
									<li><a href="<?php echo base_url() ?>editorial">Ediciones</a></li>
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

	$(document).on("click", "#btnMenu", function (e) {
    	e.preventDefault();
		var btnMenuId = $(this).attr("data-btnMenuId");
		localStorage.setItem("CatId",btnMenuId);
		window.location.href = host + "noticias";
	});

	$(document).on("click", "#btnNoticia", function (e) {
    	e.preventDefault();
		var btnNoticiaId = $(this).attr("data-btnNoticiaId");
		localStorage.setItem("NotiId",btnNoticiaId);
		window.location.href = host + "noticia";
	});
</script>