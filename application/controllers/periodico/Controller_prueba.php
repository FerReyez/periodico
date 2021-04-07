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
        $this->load->view('template/template',$data);
    }

    public function vista_image()
    {
        if (!isset($_SESSION['usuario'])) {
            redirect('Controller_home/index');
        }
        $vista = "periodico/View_image";
        $this->cargar_plantilla($vista);
    }

    public function fileUpload(){

        if(!empty($_FILES['file']['name'])){
     
          // Set preference
          $config['upload_path'] = 'uploads/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '1024'; // max_size in kb
          $config['file_name'] = $_FILES['file']['name'];
     
          //Load upload library
          $this->load->library('upload',$config); 
     
          // File upload
          if($this->upload->do_upload('file')){
            // Get data about the file
            $uploadData = $this->upload->data();
          }
        }
    }

    public function upload() {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = "./assets/upload/noticias/";
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);
        // if you want to save in db,where here
        // with out model just for example
        // $this->load->database(); // load database
        // $this->db->insert('file_table',array('file_name' => $fileName));
        }
    }

    public function upload_img() {
        $extention = explode('.', $_FILES['file']['name']);
        $newName = rand() . '.' . $extention[1];
        $destination = './assets/upload/noticias/' . $newName;
        move_uploaded_file($_FILES['file']['name'], $destination);
        return $newName;
    }

}