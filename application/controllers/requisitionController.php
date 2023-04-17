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
        $orders = $this->allOrders->showAllData();
        // $this->session->set_flashdata('success', 'Order Requested Successfully. Please Wait For Confirmation.');
        $flashmsg =$this->session->flashdata('success');
        // var_dump($flashmsg);
        // dd($orders);
        // $this->load->view('admin/allOrders', compact('orders','flashmsg'));
        $this->load->view('admin/requisition', compact('orders','flashmsg'));

	}
    public function approve($id)
    {
        $this->allOrders->approve($id);
        $this->session->set_flashdata('success', 'Order Confirmed Successfully.');
        redirect('requisitionController');
    }
    public function reject($id)
    {
        $this->allOrders->reject($id);
        $this->session->set_flashdata('success', 'Order Rejected Successfully.');
        redirect('requisitionController');
    }
    
}
    
    
?>