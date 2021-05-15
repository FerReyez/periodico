<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_web extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_web');
    }

    public function cargar_plantilla_web($vista, $data) {
        $menus = $this->Model_web->listar_menu();
        $opciones = $this->Model_web->listar_opcion();
        $redes = $this->Model_web->listar_redes();
        
        $data['menus'] = $menus;
        $data['opciones'] = $opciones;
        $data['redes'] = $redes;
        $data['main_content'] = $vista;
        $this->load->view('template_web/web/View_template', $data);
    }

    public function index_web(){
        $carrousel = $this->Model_web->listar_carrousel();
        $last_ed = $this->Model_web->ultima_edicion();
        $id_ed = 0;
        foreach ($last_ed as $l) {
            $id_ed = $l['id_edicion'];
        }
        $noticias = $this->Model_web->ultimas_noticias($id_ed);
        $ediciones = $this->Model_web->ultimas_ediciones();
        
        $data['carrousel'] = $carrousel;
        $data['last_ed'] = $last_ed;
        $data['noticias'] = $noticias;
        $data['ediciones'] = $ediciones;
        $data['titulo'] = "Inicio";
        $vista = "web/prueba";
        $this->cargar_plantilla_web($vista, $data);
    }

    function listaNoticias() {
        $data['titulo'] = "Noticias";
        $vista = "web/View_listNoticias";
        $this->cargar_plantilla_web($vista, $data);
    }

    function noticias() {
        $data['titulo'] = "Noticia";
        $vista = "web/View_noticia";
        $this->cargar_plantilla_web($vista, $data);
    }

    function editorial() {
        $data['titulo'] = "Editorial";
        $vista = "web/editorial";
        $this->cargar_plantilla_web($vista, $data);
    }

    function personas() {
        $data['titulo'] = "Personas";
        $vista = "web/View_personas";
        $this->cargar_plantilla_web($vista, $data);
    }

    function personasInd() {
        $data['titulo'] = "Personas";
        $vista = "web/View_personasInd";
        $this->cargar_plantilla_web($vista, $data);
    }
}