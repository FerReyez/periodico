<!-- footer -->
<footer class="footer_style_2">
  <div class="container-fuild">
    <div class="row">      
      <div class="footer_blog">
        <div class="row">

          <div class="col-md-5">
            <div class="main-heading left_text">
              <h2>Mision</h2>
            </div>
            <p>Ser un medio de difusión objetivo y de promoción que destaque las actividades académicas, científicas, culturales y humanitarias de las diferentes facultades de la Universidad Salvadoreña Alberto Masferrer, mediante un ejercicio periodístico con alto sentido ético.</p>
            <div class="main-heading left_text">
              <h2>Vision</h2>
            </div>
            <p>Ser un medio de divulgación confiable cuyos contenidos reflejen calidad y responsabilidad ante la comunidad universitaria basado en los valores que rigen a la institución: verdad, justicia, moral, respeto, calidad humana, excelencia académica.</p>
          </div>

          <div class="col-md-4">
            <div class="main-heading left_text">
              <h2>Links Adicionales</h2>
            </div>
            <ul class="footer-menu">
              <?php foreach ($redes as $r) { ?>
                <li><a href="<?php echo $r['url']; ?>" target="_blank"><i class="<?php echo $r['icono']; ?>"></i> <?php echo $r['red_social']; ?></a></li>
              <?php } ?>
            </ul>
          </div>

          <div class="col-md-3">
            <div class="main-heading left_text">
              <h2>Contáctanos</h2>
            </div>
            <p>
                19 Av. Nte. entre 3 a Calle Pte.<br>
                y Alameda Juan Pablo II, San Salvador.<br>
                <span style="font-size:18px;"><a href="tel:+503">+(503) XXXX XXXX</a></span>
            </p>          
          </div>

        </div>
      </div>
      <div class="center">
        <p>Universidad Salvadoreña Alberto Masferrer - USAM © | CBN Solutions © Copyrights 2021 <span style="font-size:18px;"><a href="tel:+50372166991">+(503) 7216 6991</a></span></p>
      </div>
    </div>
  </div>
</footer>

<!-- end footer -->
<!-- js section -->
<script src="<?php echo base_url() ?>assets/web/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="<?php echo base_url() ?>assets/web/js/menumaker.js"></script>
<!-- wow animation -->
<script src="<?php echo base_url() ?>assets/web/js/wow.js"></script>
<!-- custom js -->
<script src="<?php echo base_url() ?>assets/web/js/custom.js"></script>
<!-- revolution js files -->
<script src="<?php echo base_url() ?>assets/web/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/revolution/js/extensions/revolution.extension.video.min.js"></script>
<!-- map js -->
<script>
         // This example adds a marker to indicate the position of Bondi Beach in Sydney,
         // Australia.
         function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 11,
             center: {lat: 40.645037, lng: -73.880224},
         styles: [
                  {
                    elementType: 'geometry',
                    stylers: [{color: '#fefefe'}]
                  },
                  {
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                  },
                  {
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#f5f5f5'}]
                  },
                  {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#bdbdbd'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.arterial',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#3d3523'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#000'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#c8d7d4'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#b1a481'}]
                  }
                ]
         });
         
           var image = '<?php echo base_url() ?>assets/web/images/it_service/location_icon_map_cont.png';
           var beachMarker = new google.maps.Marker({
             position: {lat: 40.645037, lng: -73.880224},
             map: map,
             icon: image
           });
         }
      </script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>

</body>
</html>