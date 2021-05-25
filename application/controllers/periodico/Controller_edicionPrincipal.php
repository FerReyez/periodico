<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_edicionPrincipal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_web');
    }

    public function cargar_plantilla($vista, $data){
        $menus = $this->Model_web->listar_menu();
        $opciones = $this->Model_web->listar_opcion();
        $redes = $this->Model_web->listar_redes();
        
        $data['menus'] = $menus;
        $data['opciones'] = $opciones;
        $data['redes'] = $redes;
        $data['main_content'] = $vista;
        $this->load->view('template_web/web/View_template', $data);
    }

    public function vista_edicionPrincipal()
    {
        $data['titulo'] = 'ESTO NO ES UNA PRUEBA';
        $vista = "periodico/View_edicionesPrincipal";
        $this->cargar_plantilla($vista, $data);
    }
}
