<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_prueba extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
    }

   
    public function cargar_plantilla($vista)
    {
        $data['main_content'] = $vista;
        $this->load->view('template/template');
    }

    public function vista_image()
    {
        if (!isset($_SESSION['usuario'])) {
            redirect('Controller_home/index');
        }
        $vista = "periodico/View_image";
        $this->cargar_plantilla($vista);
    }
}