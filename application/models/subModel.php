<?php
class subModel extends CI_Model {

    public function get_categories() {

        // $query = $this->db->order_by('sid', 'desc')->get('subcategories');
        $this->db->select('subcategories.sid, categories.catname, subcategories.subcname');
        $this->db->from('subcategories');
        $this->db->join('categories', 'categories.id = subcategories.catname');
        return  $this->db->get()->result();
    }

    public function get_sub_categories($sid) {

        $this->db->where("sid", $sid);
        $query = $this->db->get('subcategories');
        return $query->row();

    }

    
    public function get_catagory_by_id($id)
    {
        // Get the user by ID
        $this->db->where('id', $id);
        $query = $this->db->get('categories');
        return $query->row();
    }


    //update subcategory
    public function update_sub($id,$catname,$subname)
    {
        // Update the user data
        $data = array(
            'subcname' => $subname,
            'catname' => $catname,
        );
        $this->db->where('sid', $id);
        $this->db->update('subcategories', $data);
    }

public function delete_sub($sid){
    $this->db->where('sid', $sid);
    $this->db->delete('subcategories');
 
}

}