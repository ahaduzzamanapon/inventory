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



		$this->load->view('admin/subcategories');
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
            // $categories = $this->catmodel->get_categories();
            // $data = array('categories' => $categories);
            // $this->load->view('admin/categories', $data); 
            redirect('admin/subcategories');  
                 
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