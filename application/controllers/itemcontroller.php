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


        $data['categories'] = $this->db->get('categories')->result();

		$this->load->view('admin/item',$data);


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
    

}
?>