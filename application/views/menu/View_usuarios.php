<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Usuarios
                                <small>Aqui podras editar toda la información de los usuarios del sistema</small>
                            </h2>
                        </div>
                        <br>
                        <p>
                         <div class="col-md-1">
                           
                                <button type="button" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal" onclick="$('#carga').css('display','none')" class="btn bg-<?php echo $tema; ?> waves-effect btn-block">
                                    <i class="material-icons" >add_box</i>
                                </button>
                            
                        </div>   
                        </p>
                        
                        <p><div class="col-md-2 " >
                            
                               <select name="cantidad" id="cantidad" class="form-control show-tick">
                                <option value="20">Mostrar por:</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="60">60</option>
                                <option value="70">70</option>
                                <option value="80">80</option>
                                <option value="90">90</option>
                                <option value="100">100</option>
                            </select> 

                            
                    </div></p>
                        <p>
                         <div class="col-md-8">
                        
                           <div class="input-group">
                                        <div class="form-line">
                                             <input class="btn-block form-control" placeholder="Buscar" type="text" id="busqueda" name="busqueda">
                                        </div>
                                    </div>  
                    </div>   
                        </p>
                    
<div class="container-fluid">
    <div class="col-xs-12">
         <div class="body table-responsive">
                           <table id="tbuser"class="table table-bordered table-striped table-condensed">
                            <thead class="">
                                <tr>
                                    <th>
                                        CORRELATIVO
                                    </th>
                                    <th>
                                        USUARIO
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        ACCIONES
                                    </th>
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
                                <h4 class="modal-title" id="form-title">
                                    
                                </h4>
                            </div>
                            <div class="modal-body"> 
                                <div id="carga"></div>
<form  id="developer_cu_form">
                <div class="modal-body users-cont">
                    <div class="row clearfix">
                                
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">@</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Correo" id="nombre" name="nombre">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Nombre completo" name="nombre_completo" id="nombre_completo">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">vpn_key</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Clave" name="clave" id="clave">
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">security</i>
                                        </span>
                                        <div >
                                            <select name="id_rol" id="id_rol" data-live-search="true">
                                    <option value="ns">Rol</option>
                                    <?php foreach ($roles as $key => $value): ?>
                                        <option value="<?php echo $value->id_rol ?>"><?php echo $value->rol ?></option>
                                    <?php endforeach ?>
                                </select>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">insert_emoticon</i>
                                        </span>
                                        <div >
                                            <select  id="estado" name="estado"  data-live-search="true">
                                    <option value="ns">Estado</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                                        </div>
                                    </div> 
                            </div>
                </div>
                 <input type="hidden" id="updateId" name="updateId">
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
                    




<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/create_user.js"></script>


