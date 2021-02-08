<?php 
/**
 * 
 */
class Model_menu extends CI_Model
{
	
	public function traer_menu(){
		$this->db->order_by("orden","asc");
		$result = $this->db->get('gu_menu');
		return $result->result();
	}

	public function save_orden_menu($array){
      $result = $this->db->update_batch("gu_menu",$array,"id_menu");
        return true;
    }
}

