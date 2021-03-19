<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Noticias
                            <small>Aqui podras editar toda la información de las noticias del periodicos Patria Masferreriana</small>
                        </h2>
                        <ul class="header-dropdown m-r--5" >
                                <li class="dropdown ">
                                    <a aria-expanded="true" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" role="button">
                                        <i class="material-icons waves-effect bg-<?php echo $tema; ?>" style="font-size: 30px" id="add">
                                            add_circle
                                        </i>
                                    </a>
                                </li>
                            </ul>
                    </div>
                    <div class="container-fluid">
                        <div class="col-xs-12">
                            <div class="body table-responsive">
                                <table id="tb-noticia"class="table table-bordered table-striped table-condensed">
                                    <thead class="">
                                        <tr>
                                            <th>#</th>
                                            <th>TITULO</th>
                                            <th>EDITOR</th>
                                            <th>REPORTERO</th>
                                            <th>CATEGORIA</th>
                                            <th>FECHA</th>
                                            <th>EDICION</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                </div>
                                <div class="form-actions">
                                    <div class="text-center paginacion">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>



<div class="modal fade" id="create_form_modal" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form-title"></h4>
            </div>
            <div class="modal-body"> 
            <div id="carga"></div>
                <form  id="developer_cu_form">
                    <div class="modal-body users-cont">
                        <div class="row clearfix">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">receipt</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control date" placeholder="Titulo" id="titulo" name="titulo">
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">receipt</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control date" placeholder="Subtitulo" name="subtitulo" id="subtitulo">
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">add_a_photo</i>
                                </span>
                                <div class="form-line">
                                    <input type="file" class="form-control date" placeholder="Portada" name="url_foto" id="url_foto">
                                    <input type="hidden" name="url" id="url">
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control date" placeholder="Fotografo" name="fotografo" id="fotografo">
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="date" class="form-control date" placeholder="Fecha" name="fecha" id="fecha">
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control date" placeholder="Editor" name="editor" id="editor">
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control date" placeholder="Reportero" name="reportero" id="reportero">
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">content_paste</i>
                                </span>
                                <div class="form-line">
                                    <select name="categoria" id="categoria"  class="form-control date se" data-live-search="true" style="width: 100%;">
                                        <option selected="selected" value="">*Seleccione una Categoria*</option>
                                        <?php foreach ($categorias as $c) { ?>
                                            <option value="<?php echo $c["id_cat_noticia"]; ?>" data-icon="<?php echo $c["nc_icono"]; ?>">
                                                <?php echo $c["nc_noticia"]; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">attach_file</i>
                                </span>
                                <div class="form-line">
                                    <select name="edicion" id="edicion"  class="form-control date se" data-live-search="true" style="width: 100%;">
                                        <option selected="selected" value="">*Seleccione una Edicion*</option>
                                        <?php foreach ($ediciones as $e) { ?>
                                            <option value="<?php echo $e["id_edicion"]; ?>">
                                                Edicion Nro <?php echo $e["num_edicion"]; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">bookmark</i>
                                </span>
                                <div class="form-line">
                                    <select name="nivel" id="nivel"  class="form-control date se" style="width: 100%;">
                                        <option selected="selected" value="">*Seleccione Nivel*</option>
                                        <option value="1" data-icon="fa fa-check-circle">Principal</option>
                                        <option value="2" data-icon="fa fa-times-circle">Secundaria</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="updateId" name="updateId">
                    <input type="hidden" id="fotoId" name="fotoId">
                    <input type="hidden"  name="action" id="action" value="create">
                    </div>
                    <div class="modal-footer">
                        <button class="btn bg-<?php echo $tema; ?> waves-effect" type="submit"  name="submit" id="submit"  ><b id="nombreb"></b>
                        </button>
                        </form>
                <button class="btn btn-link waves-effect" data-dismiss="modal" type="button">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nota_modal" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="nota-title"></h4>
            </div>
            <div class="modal-body"> 
                <div id="carga-nota"></div>
                <form  id="nota-form">
                    <div class="modal-body users-cont">
                        <div class="row clearfix">
                            <div class="body">
                                <textarea name="nota" id="nota"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn bg-<?php echo $tema; ?> waves-effect" type="submit" name="submit" id="submit"><b id="btn-nota"></b></button>
                <button class="btn btn-link waves-effect" data-dismiss="modal" type="button">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/select2/js/select2.js"></script>                    
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/noticias.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('nota', {
        customConfig: '<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor_nota.js'
    });
    CKEDITOR.config.height = 650;

    $(document).on("click", "#notaBtnId", function (e) {
        e.preventDefault();
        var editBtnId = $(this).attr('data-notaBtnId');
        var action = 'fetchSingleRow';
        $.ajax({
            url: "periodico/Controller_noticia/linea_actualizar",
            method: "POST",
            data: {
                editBtnId: editBtnId,
                action: action
            },
            dataType: "json",
            beforeSend: function () {
                $("#carga-nota").css("display", "block");
                $("#nota_modal").modal("show");
            },
            success: function (data) {
                $("#carga-nota").fadeOut("slow");
                CKEDITOR.instances["nota"].setData(data.Nota)
                $("#nota-title").text("Editor de la Nota");
                $("#action").val('update');
                $("#btn-nota").text("Guardar");
                $("#updateId").val(editBtnId);
            }
        });
    });
</script>