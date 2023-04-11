<?php
class catmodel extends CI_Model {

    public function get_categories() {
        $this->load->database();
      

        $query = $this->db->order_by('id', 'desc')->get('categories');
        return $query->result();
    }

    public function update_cat($id, $catname)
    {
        // Update the user data
        $data = array(
            'catname' => $catname,
        );
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }


    public function get_user_by_id($id)
    {
        // Get the user by ID
        $this->db->where('id',$id);
        $query = $this->db->get('categories');
        return $query->row();
    }

    public function delete_categories($id)
    {
        // Delete the user by ID
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }

}


?>