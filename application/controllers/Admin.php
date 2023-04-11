<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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



		$this->load->view('admin/index');
	}
	public function categories()
	{


		$categories = $this->catmodel->get_categories();
		$data = array('categories' => $categories,
						'validation1'=>$this->session->flashdata('validation1'));
		$this->load->view('admin/categories', $data);  


	}
	public function catstor() {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('catname', 'Category Name', 'required|max_length[12]|is_unique[categories.catname]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('validation1', validation_errors());
            $this->load->library('user_agent');


            // Redirect the user to the previous page
            redirect($this->agent->referrer());
        } else {
            // Validation passed, process the form data
            $catname = $this->input->post('catname');

            // Insert data into database
            $data = array(
                'catname' => $catname,
                 );

            $this->load->database();

            $this->db->insert('categories', $data);
            $this->session->set_flashdata('success', 'Record added successfully');
            $categories = $this->catmodel->get_categories();
            $data = array('categories' => $categories);
            $this->load->view('admin/categories', $data);        
         }



         






    }
	public function subcategories()
	{


        $categories = $this->catmodel->get_categories();
        $Subcategories = $this->subModel->get_categories();
		$data = array('categories' => $categories,'Subcategories'=>$Subcategories);
        $this->load->view('admin/subcategories',$data);
	}


    public function subCatStor(){

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('subCat', ' SubCategory Name', 'required|max_length[12]|is_unique[Subcategories.subcname]');
       


        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('validation1', validation_errors());
			$this->load->library('user_agent');


            // Redirect the user to the previous page
            redirect($this->agent->referrer());

         } else {
            // Validation passed, process the form data
            $subcname = $this->input->post('subCat');
            $catname = $this->input->post('catId');
           
            // Insert data into database
            $data = array (
                'subcname' => $subcname,
                'catname' => $catname,
                 );
				
				 $this->load->database();

            $this->db->insert('subcategories', $data);
            $this->session->set_flashdata('success', 'Record added successfully');
              $Subcategories = $this->subModel->get_categories();
              $categories = $this->catmodel->get_categories();
            $data = array('Subcategories' => $Subcategories,'categories' => $categories);
            $this->load->view('admin/subcategories', $data); 
           
                 
         }


    }

    public function edit($id)
{
    // Load the model for the item being edited
    $this->load->model('subModel');

    
    
    // Get the item data from the database
    $item= $this->subModel->get_sub_categories($id);
     $catId= $item->catname;
 
    
		$categories = $this->catmodel->get_categories();
        $catName = $this->subModel->get_catagory_by_id($catId);


		$data = array('categories' => $categories,
						'item'=>$item, 
                        'catName'=>$catName);
   
    
    // Load the edit form view and pass the item data to it
    $this->load->view('admin/subEdit',$data);
}

//sub catagory update here

public function upDated(){
    $id=$this->input->post('subId');
    $catname=$this->input->post('catId');
    $subname=$this->input->post('subname');
   
    $this->load->model('subModel');
     $update1=$this->subModel->update_sub($id,$catname,$subname);
     if($update1 == false){
     

        $this->session->set_flashdata('success', 'Record Updated successfully');
        $Subcategories = $this->subModel->get_categories();
        $categories = $this->catmodel->get_categories();
      $data = array('Subcategories' => $Subcategories,'categories' => $categories);
      $this->load->view('admin/subcategories', $data); 
     }else{
        
        $this->session->set_flashdata('error', 'Record Updated Unsuccessfully');
        $Subcategories = $this->subModel->get_categories();
        $categories = $this->catmodel->get_categories();
        $data = array('Subcategories' => $Subcategories,'categories' => $categories);
       $this->load->view('admin/subcategories', $data); 
     }
}

public function delete_sub($sid){

    $this->load->model('subModel');
    $deleted= $this->subModel->delete_sub($sid);
    
  if($deleted==false){
    $this->session->set_flashdata('success', 'Record Deleted successfully');
    $Subcategories = $this->subModel->get_categories();
    $categories = $this->catmodel->get_categories();
    $data = array('Subcategories' => $Subcategories,'categories' => $categories);
    $this->load->view('admin/subcategories', $data);
  }else{
    $this->session->set_flashdata('error', 'Record Deleted Unsuccessfully');
     $Subcategories = $this->subModel->get_categories();
     $categories = $this->catmodel->get_categories();
     $data = array('Subcategories' => $Subcategories,'categories' => $categories);
    $this->load->view('admin/subcategories', $data); 
  }
    
}


    public function units()
    {

        $units = $this->Unit->get_units();



        $data = array('units' => $units,
                        'unitValidation1'=>$this->session->flashdata('unitValidation1'));
        $this->load->view('admin/unit', $data);
    }

    public function unitStore()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('unitName', 'Unit Name', 'required|max_length[12]|is_unique[units.unitName]');

        if ($this->form_validation->run() == false) 
        {
            $this->session->set_flashdata('unitValidation1', validation_errors());
            $this->load->library('user_agent');
            
            redirect($this->agent->referrer());  // Redirect the user to the previous page
        } 
        else {
        
            $unitName = $this->input->post('unitName');    // Validation passed, process the form data

            // Insert data into database
            $data = array(
                'unitName' => $unitName,
                 );

            $this->load->database();
            $this->db->insert('units', $data);
            $this->session->set_flashdata('success', 'Unit added successfully');
            $units = $this->Unit->get_units();
            $data = array('units' => $units);
            $this->load->view('admin/unit', $data);
        }
    }
}