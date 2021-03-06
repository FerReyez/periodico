<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_categoria');
    }

   
    public function cargar_plantilla($vista)
    {
        $data['main_content'] = $vista;
        $this->load->view('template/template', $data);
    }

    public function vista_categoria()
    {
        if (!isset($_SESSION['usuario'])) {
            redirect('Controller_home/index');
        }
        $vista = "periodico/View_categorias";
        $this->cargar_plantilla($vista);
    }

    public function listar_categoria() {

        $list = $this->Model_categoria->lista_categoria();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nc_noticia;
            $row[] = $person->nc_icono;
           
            $row[] = "<center>
            <b class='tool'>
              <button class='btn bg-teal waves-effect btn-xs'><b><i class='material-icons' id='editBtnId' data-editBtnId='" . $person->id_cat_noticia . "'>build</i></b></button>
              <span class='tooltip-css3'>EDITAR</span>
            </b>
            <b class='tool'>
              <button id='delteBtnId' class='btn bg-blue-grey waves-effect btn-xs' data-delteBtnId='" . $person->id_cat_noticia . "'><b><i class='material-icons'>delete_forever</i></b></button>
              <span class='tooltip-css3' >ELIMINAR</span>
            </b>
            </center>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Model_categoria->count_all(),
            "recordsFiltered" => $this->Model_categoria->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function actualizar_crear_categoria() {
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
                    'tabla' => "CATEGORIA",
                    'nombre' => $_SESSION['nombre_completo'],
                    'id_usuario' => $id_u,
                );
                $this->Model_bitacora->guardar_bitacora($acciones) == true;


                $table = 'cat_noticia';

                $data = array(
                    'nc_noticia' => $_POST['categoria'],
                    'nc_icono' => $_POST['icono'],
                    'nc_categoria' => $_POST['cat_s'],
                );
                $result = $this->Model_categoria->crear_categoria($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            /*if ($_POST['action'] == 'update') {

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

                $table = 'edicion';
                $updateId = $_POST['updateId'];

                $data = array(
                    'fecha_publicacion' => $_POST['fecha'],
                    'num_edicion' => $_POST['edicion'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_edicion->actualizar_edicion($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }*/
        }
    }

}