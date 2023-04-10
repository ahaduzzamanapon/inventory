<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
        $this->load->model('catmodel');
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
		$data = array('categories' => $categories);
		$this->load->view('admin/categories', $data);  


	}
	public function catstor() {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('catname', 'Category Name', 'required|max_length[12]|is_unique[categories.catname]');

        if ($this->form_validation->run() == FALSE) {
            $categories = $this->catmodel->get_categories();
		$data = array('categories' => $categories);
		$this->load->view('admin/categories', $data);  

         } else {
            // Validation passed, process the form data
            $catname = $this->input->post('catname');
           
            // Insert data into database
            $data = array (
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
}
