<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_web extends CI_Model{

    public function listar_categoria() {
        $this->db->select('*');
        $this->db->from('cat_noticia');
        $query =  $this->db->get();
        return $query->result_array();
    }

    // public function listar_categoria_sub($id_categoria) {
    //     $this->db->select('*');
    //     $this->db->from('cat_noticia');
    //     $this->db->where('id_cat_noticia', $id_categoria);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

}