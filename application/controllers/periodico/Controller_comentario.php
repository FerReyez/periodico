<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_comentario  extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_comentario');
        $this->load->model('Model_perfiles');
    }

    public function listar_comentarios() {

        $list = $this->Model_comentario->lista_comentarios();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;            
            $row[] = $person->nc_nombre;
            $row[] = $person->nc_comentario;
            $row[] = $person->nc_titulo;
            $row[] = $person->nc_estado;
            $row[] = "<img src='".base_url()."assets/upload/perfiles/".$person->foto_comen."' style=heigth: 50px;>";
            $row[] = "<i  class='".$person->nc_icono."'></i>  ".$person->nc_icono."";
            $row[] = "<center>
            <b class='tool'>
              <button class='btn bg-teal waves-effect btn-xs'><b><i class='material-icons' id='editBtnId' data-editBtnId='" . $person->idperfiles . "'>build</i></b></button>
              <span class='tooltip-css3'>EDITAR</span>
            </b>
            <b class='tool'>
              <button id='delteBtnId' class='btn bg-blue-grey waves-effect btn-xs' data-delteBtnId='" . $person->idperfiles . "'><b><i class='material-icons'>delete_forever</i></b></button>
              <span class='tooltip-css3' >ELIMINAR</span>
            </b>
            </center>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Model_comentario->counwt_all(),
            "recordsFiltered" => $this->Model_comentario->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function actualizar_crear_comentario()
    {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {

                date_default_timezone_set('America/El_Salvador');
                $fecha_hora = date("Y-m-d H:i:s");
                $id_u = $_SESSION['idusuario'];
                $ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                $acciones = array(
                    'fecha_hora' => $fecha_hora,
                    'ip' => $ip,
                    'accion' => "CREAR",
                    'tabla' => "EDICION",
                    'nombre' => $_SESSION['nombre_completo'],
                    'id_usuario' => $id_u,
                );
                $this->Model_bitacora->guardar_bitacora($acciones) == true;

                $img = '';
                if ($_FILES['foto_comen']['name'] != '') {
                    $img = $this->upload_img($_FILES['foto_comen']);
                } else {
                    $img = '';
                }

                $table = 'comentario';

                $data = array(                    
                    'nombre' => $_POST['nombreComen'],
                    'comentario' => $_POST['comentario'],
                    'titulo' => $_POST['titulo'],
                    'estado' => $_POST['estado'],
                    'foto_comen' => $img,                
                    'idperfiles' => $_POST['idperfiles'],                    
                );
                $result = $this->Model_comentario->crear_comentario($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {

                date_default_timezone_set('America/El_Salvador');
                $fecha_hora = date("Y-m-d H:i:s");
                $id_u = $_SESSION['idusuario'];
                $ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                $acciones = array(
                    'fecha_hora' => $fecha_hora,
                    'ip' => $ip,
                    'accion' => "ACTUALIZAR",
                    'tabla' => "EDICION",
                    'nombre' => $_SESSION['nombre_completo'],
                    'id_usuario' => $id_u,
                );
                $this->Model_bitacora->guardar_bitacora($acciones) == true;

                $table = 'comentario';
                $updateId = $_POST['updateId'];

                $data = array(                    
                    'nombre' => $_POST['nombre'],
                    'comentario' => $_POST['comentario'],
                    'titulo' => $_POST['titulo'],
                    'estado' => $_POST['estado'],
                    'foto_comen' => $img, 
                    'idperfiles' => $_POST['idperfiles'],
                );
                $result = $this->Model_comentario->actualizar_comentario($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }

    public function linea_actualizar()
    {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'comentarios';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_comentario->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['idperfiles'] = $value->idperfiles;
                $output['nombre'] = $value->nombre;
                $output['comentario'] = $value->comentario;
                $output['titulo'] = $value->titulo;
                $output['estado'] = $value->estado;
                $output['foto_comen'] = $value->foto_comen;
                
            }
            echo json_encode($output);
        }
    }

    public function upload_img($file)
    {
        $extention = explode('.', $file['name']);
        $newName = rand() . '.' . $extention[1];
        $destination = './assets/upload/perfiles/' . $newName;
        move_uploaded_file($file['tmp_name'], $destination);
        return $newName;
    }
    
}