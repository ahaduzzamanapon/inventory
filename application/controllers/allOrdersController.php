<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class allOrdersController extends CI_Controller
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
        // $this->load->view('admin/allOrders');
        $orders = $this->allOrders->showAllData();
        $flashmsg =$this->session->flashdata('success');
        // var_dump($flashmsg);
        // dd($orders);
        $this->load->view('admin/allOrders', compact('orders','flashmsg'));
	}
    public function delivered($id)
    {
        $this->allOrders->delivered($id);
        $this->session->set_flashdata('success', 'Order Delivered Successfully.');
        redirect('allOrdersController');
    }
    
}
    
    
?>