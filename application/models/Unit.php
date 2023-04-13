<?php
class Unit extends CI_Model {

    public function showAllData() {
        $this->load->database();
      

        $query = $this->db->order_by('unitId', 'asc')->get('units');
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


    public function get_unit_by_id($id)
    {
       
        $this->db->where('unitId', $id);
        $query = $this->db->get('units');
        return $query->row();
    }

    // public function delete_user($id)
    // {
    //     // Delete the user by ID
    //     $this->db->where('id', $id);
    //     $this->db->delete('categories');
    // }
    
    function updateUnit($unitId, $unitName)
    {
        $data = array(
            'unitName' => $unitName,
        );
        $this->db->where('unitId', $unitId);
        // print_r($result);die;
        $this->db->update('units', $data);
    }
    
    public function deleteUnit($id)
    {
        return $this->db->delete('units', ['unitId' => $id]);
    }

}


?>