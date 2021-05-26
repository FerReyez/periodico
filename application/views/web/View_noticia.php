<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left" id="titulo"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end inner page banner -->
<!-- section -->
<div class="section padding_layout_1 blog_grid">
  <div class="container">
    <div class="row">
    <div class="col-md-2"></div>
      <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 pull-center">
        <div class="full">
          <div class="blog_section margin_bottom_0" >
            <div id="noticia"></div>
            <div class="list-unstyled row clearfix" id="lightgallery">
              <!-- <div id="galeria"> -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                  <a class="custom-selector" href="http://localhost/template/assets/upload/noticias/1389458111.png">
                      <img class="img-responsive thumbnail" src="http://localhost/template/assets/upload/noticias/1389458111.png" />
                  </a>
                </div>
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section padding_layout_1 blog_grid">
  <div class="container">
    <div class="row" id="sugerencias"></div>
  </div>
</div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/get_noticia.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/light-gallery/js/lightgallery-all.js"></script>
<script>
  $("#lightgallery").lightGallery({
    // speed: 1000,
    // mode: 'lg-fade',
    selector: '.custom-selector',
    download: false,
    share: false,
  });
</script>