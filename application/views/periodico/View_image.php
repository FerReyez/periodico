<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DropzoneJs
                            <small>Prueba para subir imagenes</small>
                        </h2>
                    </div>
                    <div class="container-fluid">
                        <div class="col-xs-12">
                            <form id="frmFileUpload" class="dropzone">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
                                    <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                                </div>
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<script>
    Dropzone.options.frmFileUpload = {
        url: host+"imagen_prueba",
        paramName: "file",
        acceptedFiles: 'image/*',
        maxFilesize: 20,
        autoQueue: true,
        addRemoveLinks: true,
        dictCancelUpload: true,
        dictFileTooBig:"El archivo es muy grande, limite de 20MB!",
        dictInvalidFileType:"Solo se permite subir imagenes!",
        dictRemoveFile:"Eliminar Imagen",
        accept: function(file, done) {
            if (file.name == "prueba.png") {
                done("Naha, you don't.");
            }
            else {
                done(); 
            }
        },
        removedfile: function(file) {
            swal({
            title: "Gilberto se la come!",
            type: "warning"
        });
        }
    };
</script>