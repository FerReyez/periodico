<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_noticia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        // $this->load->model('Model_noticia');
    }

   
    public function cargar_plantilla($vista, $data = '')
    {
        $data['main_content'] = $vista;
        $this->load->view('template/template', $data);
    }

    public function vista_noticia()
    {
        if (!isset($_SESSION['usuario'])) {
            redirect('Controller_home/index');
        }
        $roles = $this->Usuarios->obtener_roles();
        $data['roles'] = $roles;
        $vista = "periodico/View_noticia";
        $this->cargar_plantilla($vista, $data);
    }


