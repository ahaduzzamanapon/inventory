<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        // $this->load->database();
        // $this->load->model('usermodel');
        $this->load->library('session');
        $this->load->helper('url');
    }


	
	public function index()
	{



		$this->load->view('admin/index');
	}
	public function categories()
	{



		$this->load->view('admin/categories');
	}
	public function catstor()
	{



		$this->load->view('admin/categories');
	}
	public function subcategories()
	{



		$this->load->view('admin/subcategories');
	}
}
