<?php
class catmodel extends CI_Model {

    public function get_categories() {
        $this->load->database();
      

        $query = $this->db->order_by('id', 'desc')->get('categories');
        return $query->result();
    }

    // public function update_user($id, $name, $email)
    // {
    //     // Update the user data
    //     $data = array(
    //         'name' => $name,
    //         'email' => $email
    //     );
    //     $this->db->where('id', $id);
    //     $this->db->update('categories', $data);
    // }


    // public function get_user_by_id($id)
    // {
    //     // Get the user by ID
    //     $this->db->where('id', $id);
    //     $query = $this->db->get('categories');
    //     return $query->row();
    // }

    // public function delete_user($id)
    // {
    //     // Delete the user by ID
    //     $this->db->where('id', $id);
    //     $this->db->delete('categories');
    // }

}


?>