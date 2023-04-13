<?php
class Sales extends CI_Model {
    public function getAllSubCategories()
    {
        $this->load->database();
        $query = $this->db->order_by('sid', 'asc')->get('subcategories');
        return $query->result();
    }    



}
?>