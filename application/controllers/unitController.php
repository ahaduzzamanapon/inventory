<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unitController extends CI_Controller
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


	
	// public function index()
	// {
    //     $this->load->view('admin/unit');
	// }
	public function index()
	{
		$units = $this->Unit->showAllData();
		$data = array('units' => $units,
						'unitValidation1'=>$this->session->flashdata('unitValidation1'));
		$this->load->view('admin/unit', $data);  


	}
	public function unitStore() {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('unitName', 'Unit Name', 'required|max_length[12]|is_unique[units.unitName]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('unitValidation1', validation_errors());
            $this->load->library('user_agent');

            // Redirect the user to the previous page
            redirect($this->agent->referrer());
        } else {
            // Validation passed, process the form data
            $unitName = $this->input->post('unitName');

            // Insert data into database
            $data = array(
                'unitName' => $unitName,
                 );

            $this->load->database();

            $this->db->insert('units', $data);
            $this->session->set_flashdata('success', 'Unit added successfully');
            $units = $this->Unit->showAllData();
            $data = array('units' => $units);
         
            // // echo "<pre>";
            // // print_r($data);die;
            // $this->load->view('unitController/index', $data);   
            $this->load->library('user_agent');

            // Redirect the user to the previous page
            redirect($this->agent->referrer());     
         }
         

    }

    public function update()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('unitName', 'Unit Name', 'required|max_length[12]');
    
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('validation2', 'Unit update unsuccessfully');
            $this->session->set_flashdata('validation2', validation_errors());
            $this->load->library('user_agent');
    
    
            // Redirect the user to the previous page
            redirect($this->agent->referrer());
               
         } else {
        // Get the form data
        // print_r($_POST);die;
        $unitId = $this->input->post('id');
        $unitName = $this->input->post('unitName');
        // print_r($unitId);die;

    
        // Load the User model
        $this->load->model('Unit');
    
        // Update the user data
        $this->Unit->updateUnit($unitId, $unitName);
    
        // Redirect back to the user list page
        $this->session->set_flashdata('success', 'Unit update successfully');
        $this->load->library('user_agent');
    
    
        // Redirect the user to the previous page
        redirect($this->agent->referrer());
    
       
         }
    }

    public function delete($id)
    {
        $this->load->model('Unit');
        $this->Unit->deleteUnit($id);
        $this->session->set_flashdata('success', 'Unit deleted successfully');
        $this->load->library('user_agent');

        // Redirect the user to the previous page
        redirect($this->agent->referrer());
    }
	
   
}