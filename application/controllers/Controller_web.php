<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_web extends CI_Controller {

    public function index() {
        
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