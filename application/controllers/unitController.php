<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unitController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
        // $this->load->model('catmodel');
        // $this->load->model('subModel');
        $this->load->model('Unit');
        $this->load->library('session');
        $this->load->helper('url');
    }


	
	public function index()
	{
        $this->load->view('admin/unit');
	}
	public function units()
	{
		$units = $this->Unit->get_units();
		$data = array('units' => $units,
						'unitValidation1'=>$this->session->flashdata('unitValidation1'));
		$this->load->view('admin/unit', $data);  


	}
	public function catstor() {
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
            $this->session->set_flashdata('success', 'Record added successfully');
            $units = $this->catmodel->get_units();
            $data = array('units' => $units);
            $this->load->view('admin/unit', $data);        
         }

    }
	
   
}

