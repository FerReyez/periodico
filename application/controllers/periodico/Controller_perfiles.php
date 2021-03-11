<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_perfiles extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_perfiles');
    }


    public function cargar_plantilla($vista)
    {
        $data['main_content'] = $vista;
        $this->load->view('template/template', $data);
    }

    public function vista_perfiles()
    {
        if (!isset($_SESSION['usuario'])) {
            redirect('Controller_home/index');
        }
        $vista = "periodico/View_perfiles";
        $this->cargar_plantilla($vista);
    }

    public function listar_perfiles()
    {

        $list = $this->Model_perfiles->lista_perfiles();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nombre;
            $row[] = $person->fecha_crea;
            $row[] = $person->estado;
            $row[] = "<center>
            <b class='tool'>
              <button class='btn bg-teal waves-effect btn-xs'><b><i class='material-icons' id='editBtnId' data-editBtnId='" . $person->idperfiles . "'>build</i></b></button>
              <span class='tooltip-css3'>EDITAR</span>
            </b>            
            </center>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Model_perfiles->count_all(),
            "recordsFiltered" => $this->Model_perfiles->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function actualizar_crear_perfiles()
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


                $table = 'perfiles';

                $data = array(
                    'nombre' => $_POST['nombre'],
                    'fecha_crea' => $_POST['fecha_crea'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_perfiles->crear_perfil($table, $data);
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

                $table = 'perfiles';
                $updateId = $_POST['updateId'];

                $data = array(
                    'nombre' => $_POST['nombre'],
                    'fecha_crea' => $_POST['fecha_crea'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_perfiles->actualizar_perfil($table, $data, $updateId);
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
            $table = 'perfiles';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_perfiles->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['nombre'] = $value->nombre;
                $output['fecha_crea'] = $value->fecha_crea;
                $output['estado'] = $value->estado;
            }
            echo json_encode($output);
        }
    }
}
