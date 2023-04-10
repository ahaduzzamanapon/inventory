<?php
class subModel extends CI_Model {

    public function get_categories() {

        // $query = $this->db->order_by('sid', 'desc')->get('subcategories');
        $this->db->select('categories.*','subcategories.*');
        $this->db->from('categorie');
        $this->db->join('subcategories','categorie.id = subcategories.catname');
        return $query->result();
    }
}