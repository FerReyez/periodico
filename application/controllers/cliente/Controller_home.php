<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_home extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        
    }

    public function cargar_plantilla_web($vista, $data) {
        $data['main_content'] = $vista;
        $this->load->view('template_web/web/View_template', $data);
    }

    public function index_web(){
        $data['titulo'] = "Inicio";
        $vista = "web/prueba";
        $this->cargar_plantilla_web($vista, $data);
    }
}