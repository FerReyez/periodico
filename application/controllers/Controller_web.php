<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_web extends CI_Controller {

    public function index() {
        parent::__construct();
        $this->load->model('Model_web');
    }

    public function cargar_plantilla_web($vista, $data) {
        $data['main_content'] = $vista;
        $this->load->view('template_web/web/View_template', $data);
    }

    public function index_web(){
        $categoria = $this->Model_web->listar_categoria();
        // $tab = "";
        // foreach ($menu as $m) {
        //     $tab .= '<tr>';
        //     $tab .= '<td>'. $m['nc_noticia'] .'</td>';
        //     $opciones = $this->Model_web->listar_opcion($m['nc_noticia']);
        //     foreach ($opciones as $o) {
        //         $tab .= '<td>'. $o['nc_noticia'] .'</td>';
        //     }
        //     $tab .= '</tr>';

        // }
        // $data['prueba'] = $tab;
        $data['categoria'] = $categoria;
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