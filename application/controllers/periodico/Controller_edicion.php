<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_edicion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_edicion');
    }

   
    public function cargar_plantilla($vista)
    {
        $data['main_content'] = $vista;
        $this->load->view('template/template', $data);
    }

    public function vista_edicion()
    {
        if (!isset($_SESSION['usuario'])) {
            redirect('Controller_home/index');
        }
        $vista = "periodico/View_ediciones";
        $this->cargar_plantilla($vista);
    }

    public function listar_edicion() {

        $list = $this->Model_edicion->lista_edicion();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = "Edicion N° - ".$person->num_edicion;
            $row[] = $person->fecha_publicacion;
            $row[] = $person->estado;
            $row[] = "<center>
            <b class='tool'>
              <button class='btn bg-teal waves-effect btn-xs'><b><i class='material-icons' id='editBtnId' data-editBtnId='" . $person->id_edicion . "'>build</i></b></button>
              <span class='tooltip-css3'>EDITAR</span>
            </b>
            <b class='tool'>
              <button id='delteBtnId' class='btn bg-blue-grey waves-effect btn-xs' data-delteBtnId='" . $person->id_edicion . "'><b><i class='material-icons'>delete_forever</i></b></button>
              <span class='tooltip-css3' >ELIMINAR</span>
            </b>
            </center>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Model_edicion->count_all(),
            "recordsFiltered" => $this->Model_edicion->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
}