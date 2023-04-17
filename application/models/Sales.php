<?php
class Sales extends CI_Model {
    public function getAllSubCategories()
    {
        $this->load->database();
        $query = $this->db->order_by('sid', 'asc')->get('subcategories');
        return $query->result();
    }    
    // public function fetch_subcategories($category_id)
    // {
    //     $this->db->where('catid', $category_id);
    //     $this->db->order_by('subcname', 'ASC');
    //     $query = $this->db->get('subcategories');
    //     $output = '<option value="">Select Subcategory</option>';
    //     foreach($query->result() as $row)
    //     {
    //         $output .= '<option value="'.$row->sid.'">'.$row->subcname.'</option>';
    //     }
    //     return $output;
    // }
    


}
?>