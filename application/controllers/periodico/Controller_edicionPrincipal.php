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
        $data['titulo'] = 'Editoriales Masferrerianas';
        $vista = "periodico/View_edicionesPrincipal";
        $this->cargar_plantilla($vista, $data);
    }

    public function vista_noticias(){
        $data['titulo'] = "Noticias Masferrerianas";
        $vista = "";
    }

    function listar_editoriales(){
        //$menu = $_POST["menu"];
        $buscar = $_POST["buscar"];
        $numeropagina = $_POST["numeropagina"];
        $cantidad = $_POST["cantidad"];

        $inicio = ($numeropagina - 1) * $cantidad;
        $output = array(
            "ediciones" => $this->Model_web->listar_editoriales($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_web->listar_editoriales($buscar)),
            "cantidad" => $cantidad
        );

        echo json_encode($output);
    }

    function obtener_noticias(){
        $edicion = $_POST["edicion"];
        $buscar = $_POST["buscar"];
        $numeropagina = $_POST["numeropagina"];
        $cantidad = $_POST["cantidad"];

        $inicio = ($numeropagina - 1) * $cantidad;
        $output = array(
            "noticias" => $this->Model_web->obtener_noticias($edicion,$buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_web->obtener_noticias($buscar)),
            "cantidad" => $cantidad
        );

        echo json_encode($output);
    }
}
