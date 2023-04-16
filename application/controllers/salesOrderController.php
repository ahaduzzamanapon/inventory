<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class salesOrderController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
        $this->load->model('catmodel');
        $this->load->model('subModel');
        $this->load->model('Unit');
        $this->load->model('Sales');
        $this->load->library('session');
        $this->load->helper('url');
    }


	
	public function index()
	{


        
                $this->db->select('items.id, items.itemname, categories.catname, subcategories.subcname, units.unitName, items.price, items.quantity, items.status, items.image');
                $this->db->from('items');
                $this->db->join('categories', 'categories.id = items.catid');
                $this->db->join('subcategories', 'subcategories.sid = items.subid');
                $this->db->join('units', 'units.unitid = items.unitid');
                $query = $this->db->get();
                $items = $query->result();



                $data['categories'] = $this->db->get('categories')->result();
                $units = $this->Unit->showAllData();
                $data['units'] = $units;
                $data['items'] = $items;
                $data['validationerrorstor'] = $this->session->flashdata('validationerrorstor');
                $data['imageerror'] = $this->session->flashdata('imageerror');
                $data['success'] = $this->session->flashdata('success');
                $data['error'] = $this->session->flashdata('error');
       



		$this->load->view('sales/salesOrder',$data);


	}

    public function get_subcategories() {
        $categoryId = $this->input->post('category_id');
        //  dd($categoryId);
        $subcategories = $this->db->get_where('subcategories', array('catname' => $categoryId))->result();
        // dd($subcategories);
        $html = '<option value="">Select Subcategory</option>';
        foreach($subcategories as $subcategory) 
        {
            $html .= '<option value="'.$subcategory->sid.'">'.$subcategory->subcname.'</option>';
        }
        echo $html;
    }
}
    ?>