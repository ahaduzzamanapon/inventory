<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchController extends CI_Controller {
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
    $keyword = $this->input->get('keyword'); // get search keyword from form
    $category = $this->input->get('category'); // get category from form


    $this->db->select('items.id, items.itemname, categories.catname, subcategories.subcname, units.unitName');
    $this->db->from('items');
    $this->db->join('subcategories', 'items.subid = subcategories.sid');
    $this->db->join('categories', 'subcategories.catname = categories.id');
    $this->db->join('units', 'items.unitid = units.unitId');
    
    // $query = $this->db->get();
    
    // $results = $query->result_array();

    

    // echo '<pre>';
    // print_r($results);
    // exit;
    // // $this->db->





   

    // $this->db->select('*'); // select all columns from your table
    // $this->db->from('items'); // replace with your table name

    // add search conditions
    if ($keyword) {
        $this->db->like('items.itemname', $keyword); // replace with your column name
        // $this->db->or_like('subcname', $keyword); // replace with your column name
    }

    if ($category) {
        $this->db->where('categories.catname', $category); // replace with your column name
    }

  

    $query = $this->db->get(); // execute the query

    $data['results'] = $query->result(); // fetch results and pass to view

    $this->load->view('search', $data); // replace with your view file name
}

}
