<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class itemcontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
        $this->load->model('catmodel');
        $this->load->model('subModel');
        $this->load->model('Unit');
        $this->load->library('session');
        $this->load->helper('url');
    }
	public function index()
	{


        
                $this->db->select('items.id, items.itemname, categories.catname, subcategories.subcname, units.unitName, items.price, items.quantity, items.status, items.image');
                $this->db->from('items');
                $this->db->join('categories', 'categories.id = items.catid');
                $this->db->join('subcategories', 'subcategories.sid = items.subid');
                $this->db->join('units', 'units.unitid = items.unitid');
                $query = $this->db->get();
                $items = $query->result();



                $data['categories'] = $this->db->get('categories')->result();
                $units = $this->Unit->showAllData();
                $data['units'] = $units;
                $data['items'] = $items;
                $data['validationerrorstor'] = $this->session->flashdata('validationerrorstor');
                $data['imageerror'] = $this->session->flashdata('imageerror');
                $data['success'] = $this->session->flashdata('success');
                $data['error'] = $this->session->flashdata('error');
       



		$this->load->view('admin/item',$data);


	}

    public function itemtest()
	{

 $this->db->select('items.id, items.itemname, categories.catname, subcategories.subcname, units.unitName, items.price, items.quantity, items.status, items.image');
 $this->db->from('items');
$this->db->join('categories', 'categories.id = items.catid');
$this->db->join('subcategories', 'subcategories.sid = items.subid');
$this->db->join('units', 'units.unitid = items.unitid');
$query = $this->db->get();
$result = $query->result();
print_r($result);



        


	}


    public function get_subcategories() {
        $categoryId = $this->input->post('category_id');
        $subcategories = $this->db->get_where('subcategories', array('catname' => $categoryId))->result();
        $html = '<option value="">Select Subcategory</option>';
        foreach($subcategories as $subcategory) {
            $html .= '<option value="'.$subcategory->sid.'">'.$subcategory->subcname.'</option>';
        }
        echo $html;
    }



    public function store_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
    
        // Set validation rules
        $this->form_validation->set_rules('itemname', 'Item Name', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('subcategory', 'Sub-Category', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('price', 'Item Price', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Item Quantity', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
    
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('validationerrorstor', validation_errors());
            $this->load->library('user_agent');
            // Redirect the user to the previous page
            redirect($this->agent->referrer());
        }
        else
        {
            // Form validation succeeded, store data in the database
            $data = array(
                'itemname' => $this->input->post('itemname'),
                'catid' => $this->input->post('category'),
                'subid' => $this->input->post('subcategory'),
                'unitid' => $this->input->post('unit'),
                'price' => $this->input->post('price'),
                'quantity' => $this->input->post('quantity'),
                'status' => $this->input->post('status')
            );
    
            // Store image on local storage and send image name to the database
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = uniqid(); // add an auto-generated unique id as the filename
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('image'))
            {
              echo"upload failed";
            }
            else
            {
                // File upload succeeded, store image name in the database
                $data['image'] = $this->upload->data('file_name');
                $this->db->insert('items', $data);
                $this->session->set_flashdata('success', 'Record added successfully');
                $this->load->library('user_agent');
        
                // Redirect the user to the previous page
                redirect($this->agent->referrer());
            }
        }
    }
    

public function edit($id){

// get item from database
    $this->db->where('id', $id);
    $query = $this->db->get('items');
    $item=$query->row();

// get category
    $this->load->model('catmodel');
    $catdeteils=$this->catmodel->get_user_by_id($item->catid);

// get Subcategory
    $this->load->model('subModel');
    $subcatdeteils=$this->subModel->get_sub_categories($item->subid);

    // get unit 
    $this->load->model('Unit');
    $unitdeteils = $this->Unit->get_unit_by_id($item->unitid);

if($item->status==1){
    $stutusd=array('value'=>1, 'name'=>'active');
}else{
    $stutusd=array('value'=>0, 'name'=>'Inactive');
}


    $data['categories'] = $this->db->get('categories')->result();
    $units = $this->Unit->showAllData();
    $data['units'] = $units;
    $data['stutusd'] = $stutusd;
  
    $data['item'] = $item;
    $data['catdeteils'] = $catdeteils;
    $data['subcatdeteils'] = $subcatdeteils;
    $data['unitdeteils'] = $unitdeteils;
$this->load->view('admin/edititem',$data);
   

}

    


public function update_item()
{
    // Sanitize the ID parameter to prevent SQL injection attacks
    $id =  $this->input->post('itemid');
  
    

    
    
    $data = array(
        'itemname' => $this->input->post('itemname'),
        'catid' => $this->input->post('category'),
        'subid' => $this->input->post('subcategory'),
        'unitid' => $this->input->post('unit'),
        'price' => $this->input->post('price'),
        'quantity' => $this->input->post('quantity'),
        'status' => $this->input->post('status')
    );

    

    if ($this->input->post('myImage')=="hi") {
        
         // Store image on local storage and send image name to the database
         $config['upload_path'] = './upload/';
         $config['allowed_types'] = 'gif|jpg|png';
         $config['file_name'] = uniqid(); // add an auto-generated unique id as the filename
 
         $this->load->library('upload', $config);
 
         if (!$this->upload->do_upload('image'))
         {
           // Show success message and redirect to previous page
        $this->session->set_flashdata('success', 'please try again update image formate gif|jpg|png ');
        redirect('itemcontroller/index');
         }
         else
         {
             // File upload succeeded, store image name in the database
             $data['image'] = $this->upload->data('file_name');
            
         }
       
    }

    
        // Update the item in the database
        $this->db->where('id', $id);
        $this->db->update('items', $data);
    
        // Show success message and redirect to previous page
        $this->session->set_flashdata('success', 'Record updated successfully');
       redirect('itemcontroller/index');
    }
    


    public function delete($id){
       

        $this->load->model('itemmodel');
        $deleted= $this->itemmodel->delete($id);
        
      if($deleted==false){
        $this->session->set_flashdata('success', 'Data delete successfully.');
    
        // Redirect to another function
        redirect('itemcontroller');
      }else{
           
        $this->session->set_flashdata('error', 'Data delete Unsuccessfully.');
    
        // Redirect to another function
        redirect('itemcontroller');
      }
        
    }

}
?>