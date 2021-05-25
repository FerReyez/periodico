<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_edicionPrincipal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuarios');
    }

    public function cargar_plantilla($vista, $data)
    {
        $data['main_content'] = $vista;
        $this->load->view('template/template', $data);
    }

    public function vista_edicionPrincipal()
    {
        $data['titulo'] = 'ESTO ES UNA PRUEBA';
        $vista = "periodico/View_edicionesPrincipal";
        $this->cargar_plantilla($vista, $data);
    }
}
