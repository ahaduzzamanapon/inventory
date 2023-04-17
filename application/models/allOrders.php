<?php
class Unit extends CI_Model {

    public function showAllData() {
        $this->load->database();
        $query = $this->db->order_by('orderId', 'asc')->get('allorders');
        return $query->result();
    }



}


?>