<?php
class itemmodel extends CI_Model {

    public function get_status_by_id($id)
    {
        // Get the user by ID
        $this->db->where('id',$id);
        $query = $this->db->get('categories');
        return $query->row();
    }
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('items');
     
    }

  

}


?>