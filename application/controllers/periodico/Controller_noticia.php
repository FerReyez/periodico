<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_noticia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_categoria');
        $this->load->model('Model_edicion');
        $this->load->model('Model_noticia');
    }

   
    public function cargar_plantilla($vista,$data)
    {
        $data['main_content'] = $vista;
        $this->load->view('template/template', $data);
    }

    public function vista_noticia()
    {
        if (!isset($_SESSION['usuario'])) {
            redirect('Controller_home/index');
        }
        $categoriass = $this->Model_categoria->obtener_categorias();
        $data['categorias'] = $categoriass;
        $edicioness = $this->Model_edicion->obtener_ediciones();
        $data['ediciones'] = $edicioness;
        $vista = "periodico/View_noticias";
        $this->cargar_plantilla($vista,$data);
    }

    public function listar_noticia() {

        $list = $this->Model_noticia->lista_noticia();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->Titular;
            $row[] = $person->Editor;
            $row[] = $person->Reportero;
            $row[] = "<i  class='".$person->nc_icono."'></i>  ".$person->nc_noticia."";
            $row[] = $person->Fecha;
            $row[] = "N° - ".$person->num_edicion;
            $row[] = "<center>
            <b class='tool'>
            <button class='btn bg-teal waves-effect btn-xs'><b><i class='material-icons' id='notaBtnId' data-notaBtnId='" . $person->id_noticia . "'>description</i></b></button>
            <span class='tooltip-css3'>NOTA</span>
            </b>
            <b class='tool'>
            <button class='btn bg-teal waves-effect btn-xs'><b><i class='material-icons' id='fotoBtnId' data-fotoBtnId='" . $person->id_noticia . "'>add_to_photos</i></b></button>
            <span class='tooltip-css3'>FOTOS</span>
            </b>
            <b class='tool'>
            <button class='btn bg-teal waves-effect btn-xs'><b><i class='material-icons' id='editBtnId' data-editBtnId='" . $person->id_noticia . "'>build</i></b></button>
            <span class='tooltip-css3'>EDITAR</span>
            </b>
            </center>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Model_noticia->count_all(),
            "recordsFiltered" => $this->Model_noticia->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function actualizar_crear_noticia() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {

                date_default_timezone_set('America/El_Salvador');
                $fecha_hora = date("Y-m-d H:i:s");
                $id_u = $_SESSION['idusuario'];
                $ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                $acciones = array(
                    'fecha_hora' => $fecha_hora,
                    'ip' => $ip,
                    'accion' => "CREAR",
                    'tabla' => "NOTICIA",
                    'nombre' => $_SESSION['nombre_completo'],
                    'id_usuario' => $id_u,
                );
                $this->Model_bitacora->guardar_bitacora($acciones) == true;

                $img = '';
                if ($_FILES['url_foto']['name'] != '') {
                    $img = $this->upload_img($_FILES['url_foto']);
                } else {
                    $img = '';
                }

                $data_noti = array(
                    'id_cat_noticia' => $_POST['categoria'],
                    'id_cat_nivel' => $_POST['nivel'],
                    'Titular' => $_POST['titulo'],
                    'Subtitulo' => $_POST['subtitulo'],
                    'Nota' => "",
                    'Fecha' => $_POST['fecha'],
                    'Editor' => $_POST['editor'],
                    'Reportero' => $_POST['reportero'],
                    'Visita' => 0,
                );

                $noti_id = $this->Model_noticia->crear_id('noticias', $data_noti);

                $data_edicion = array(
                    'id_noticia' => $noti_id,
                    'id_edicion' => $_POST['edicion'],
                );

                $result_edi = $this->Model_noticia->crear_data('edicion_noticia', $data_edicion);

                $data_foto = array(
                    'titulo_foto' => $_FILES['url_foto']['name'],
                    'url' => $img,
                    'Fotografo' => $_POST['fotografo'],
                    'Fecha' => $fecha_hora,
                );

                $foto_id = $this->Model_noticia->crear_id('fotografia', $data_foto);

                $data_foto_noti = array(
                    'id_noticia' => $noti_id,
                    'id_foto' => $foto_id,
                    'principal' => 1,
                );

                $result_foto = $this->Model_noticia->crear_data('noticia_foto', $data_foto_noti);

                if ($result_edi && $result_foto) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {

                date_default_timezone_set('America/El_Salvador');
                $fecha_hora = date("Y-m-d H:i:s");
                $id_u = $_SESSION['idusuario'];
                $ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                $acciones = array(
                    'fecha_hora' => $fecha_hora,
                    'ip' => $ip,
                    'accion' => "ACTUALIZAR",
                    'tabla' => "NOTICIA",
                    'nombre' => $_SESSION['nombre_completo'],
                    'id_usuario' => $id_u,
                );
                $this->Model_bitacora->guardar_bitacora($acciones) == true;

                $img = '';
                if ($_FILES['url_foto']['name'] != '') {
                    $img = $this->upload_img($_FILES['url_foto']);
                } else {
                    $img = $_POST['url'];
                }

                $data_noti = array(
                    'id_cat_noticia' => $_POST['categoria'],
                    'id_cat_nivel' => $_POST['nivel'],
                    'Titular' => $_POST['titulo'],
                    'Subtitulo' => $_POST['subtitulo'],
                    'Fecha' => $_POST['fecha'],
                    'Editor' => $_POST['editor'],
                    'Reportero' => $_POST['reportero'],
                );

                $notiId = 'id_noticia ='.$_POST['updateId'];

                $resultNoti = $this->Model_noticia->actualizar_data('noticias', $data_noti, $notiId);

                $fotoId = 'id_foto ='.$_POST['fotoId'];

                $data_foto = array(
                    'titulo_foto' => $_FILES['url_foto']['name'],
                    'url' => $img,
                    'Fotografo' => $_POST['fotografo'],
                    'Fecha' => $fecha_hora,
                );

                $resultFoto = $this->Model_noticia->actualizar_data('fotografia', $data_foto, $fotoId);

                if ($resultNoti && $resultFoto) {
                    echo 'update';
                }
            }
        }
    }

    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'noticias';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_noticia->linea_actualizar($editBtnId);
            foreach ($result as $value) {
                $output['Titular'] = $value->Titular;
                $output['Subtitulo'] = $value->Subtitulo;
                $output['url'] = $value->url;
                $output['Fotografo'] = $value->Fotografo;
                $output['Fecha'] = $value->Fecha;
                $output['Editor'] = $value->Editor;
                $output['Reportero'] = $value->Reportero;
                $output['id_cat_noticia'] = $value->id_cat_noticia;
                $output['id_edicion'] = $value->id_edicion;
                $output['id_cat_nivel'] = $value->id_cat_nivel;
                $output['Nota'] = $value->Nota;
            }
            echo json_encode($output);
        }
    }

    public function upload_img($file) {
        $extention = explode('.', $file['name']);
        $newName = rand() . '.' . $extention[1];
        $destination = './assets/upload/noticias/' . $newName;
        move_uploaded_file($file['tmp_name'], $destination);
        return $newName;
    }

}