<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
        $this->load->model('catmodel');
        $this->load->model('subModel');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('user_agent');
    }

	
	
	public function index()
	{
		$this->load->view('admin/order');
	}
}
