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
		$data = array('categories' => $categories,
					  'validation1'=>$this->session->flashdata('validation1'),
					  'validation2'=>$this->session->flashdata('validation2'),
					  'success'=>$this->session->flashdata('success'),
                    );
		$this->load->view('admin/categories', $data);  


	}
	public function catstor() {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('catname', 'Category Name', 'required|max_length[12]|is_unique[categories.catname]');

        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('validation1', validation_errors());
			$this->load->library('user_agent');


            // Redirect the user to the previous page
            redirect($this->agent->referrer());

         } else {
            // Validation passed, process the form data
            $catname = $this->input->post('catname');
           
            // Insert data into database
            $data = array (
                'catname' => $catname,
                 );
				
				 $this->load->database();

            $this->db->insert('categories', $data);

            $this->load->library('user_agent');

            $this->session->set_flashdata('success', 'Record update successfully');
            redirect($this->agent->referrer());
             
         }



         






    }


    
public function catupdate()
{




    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('catname', 'Category Name', 'required|max_length[12]');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('validation', 'Record update unsuccessfully');
        $this->session->set_flashdata('validation2', validation_errors());
        $this->load->library('user_agent');


        // Redirect the user to the previous page
        redirect($this->agent->referrer());
           
     } else {
    // Get the form data
    $id = $this->input->post('id');
    $catname = $this->input->post('catname');

    // Load the User model
    $this->load->model('catmodel');

    // Update the user data
    $this->catmodel->update_cat($id, $catname);

    // Redirect back to the user list page
    $this->session->set_flashdata('success', 'Record update successfully');
    $this->load->library('user_agent');


    // Redirect the user to the previous page
    redirect($this->agent->referrer());

   
     }
}
public function delete($id)
{
    // Load the User model
    $this->load->model('catmodel');
    
    // Delete the user by ID
    $this->catmodel->delete_categories($id);
    
    // Redirect back to the user list page
    $this->session->set_flashdata('success', 'Record delete  successfully');
    $this->load->library('user_agent');


    // Redirect the user to the previous page
    redirect($this->agent->referrer());


  
}




	public function subcategories()
	{



		$this->load->view('admin/subcategories');
	}

    // Unit Part Starts Here
    public function unit()
    {
        $this->load->view('admin/unit');
    }
}