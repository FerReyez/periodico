<!DOCTYPE html>
<html lang="es">

<head>
	<title>Periodico Digital | <?php echo $titulo ?></title>
	<meta charset="UTF-8">
	<base href="<?php echo base_url(); ?>">

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<!-- Bootstrap Core Css -->
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/responsive.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/colors1.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/custom.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/animate.css" />
	<link href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<!-- revolution slider css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/revolution/css/settings.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/revolution/css/layers.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/revolution/css/navigation.css" />

	<!-- JQuery -->
	<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/web/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>

	<!-- Galeria -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fancybox-master/dist/jquery.fancybox.min.css" />
	<script src="<?php echo base_url(); ?>assets/plugins/fancybox-master/dist/jquery.fancybox.min.js"></script>

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
									<li><a href="<?php echo base_url() ?>perfiles">Perfiles</a></li>
									<li><a href="<?php echo base_url() ?>ediciones">Ediciones</a></li>
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
		transition: all 0.5s ease-out;
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

	
	$(document).on("click", "#btnPerfil", function (e) {
		e.preventDefault();
		var btnPerfilId = $(this).attr("data-btnPerfilId");
		localStorage.setItem("PerfilId",btnPerfilId);
		window.location.href = host + "perfil";
	});

	$(document).on("click", "#shareBtn", function (e) {
		var img = $(this).attr("data-img");
		var title = $(this).attr("data-title");
		window.open("http://twitter.com/intent/tweet?url="+host+"&title="+title);
	});
</script>
