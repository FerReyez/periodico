<!-- section -->
<div class="section main_slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <div id="titulo"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <p>
                    <strong>Mostrar por : </strong>
                    <select name="cantidad" id="cantidad">
                        <option value="9">9</option>
                        <option value="12">12</option>
                        <option value="12">15</option>
                        <option value="12">18</option>
                    </select>
                </p>
            </div>
            <div class="col-md-3" >
                <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar noticia..." />
                <br>
            </div>
            <div class="row" id="tb_noticias"></div>
            <div class="col-md-12">
                <div class="center paginacion"></div>
                <div>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/lista_noticias.js"></script>