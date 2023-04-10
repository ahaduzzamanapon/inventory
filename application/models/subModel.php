<?php
class subModel extends CI_Model {

    public function get_categories() {

        $query = $this->db->order_by('sid', 'desc')->get('subcategories');
        return $query->result();
    }
}