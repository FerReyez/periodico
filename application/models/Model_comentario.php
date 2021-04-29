<?php

class Model_comentario extends CI_Model
{

    public $column = array(
        'idComentario',
        'nombre',
        'comentario',
        'titulo',
        'estado',
        'foto_comen',
        'idperfiles'
    );

    public $order = array('idComentario' => 'desc');

    public function obtener_perfiles()
    {
        $this->db->select('*');
        $this->db->from('comentario');
        $query =  $this->db->get();
        return $query->result_array();
    }

    private function _get_comentario($term = '')
    {
        $column = array(
            'idComentario',
            'nombre',
            'comentario',
            'titulo',
            'estado',
            'foto_comen',
            'idperfiles'
        );

        $this->db->select('*');
        $this->db->from('comentario');
        $this->db->group_start();
        $this->db->like('foto_comen', $term);

        $this->db->group_end();
        if (isset($_REQUEST['order'])) // here order processing
        {
            $this->db->order_by($column[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function lista_comentarios()
    {
        $term = $_REQUEST['search']['value'];
        $this->_get_comentario($term);
        if ($_REQUEST['length'] != -1) {
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {   
        $this->db->select('*');
        $this->db->from('comentario');
        return $this->db->count_all_results();
    }

    public function crear_comentario($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function eliminar_comentario($table, $delteBtnId) {
        $this->db->where('idComentario', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }
    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('idComentario', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_comentario($table, $data, $updateId) {
        $this->db->where('idComentario', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}
