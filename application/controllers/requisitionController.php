<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class requisitionController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
        $this->load->model('catmodel');
        $this->load->model('subModel');
        $this->load->model('Unit');
        $this->load->model('allOrders');
        $this->load->library('session');
        $this->load->helper('url');
    }


	
	public function index()
	{
        $this->load->view('admin/requisition');

	}
    
}
    
    
?>