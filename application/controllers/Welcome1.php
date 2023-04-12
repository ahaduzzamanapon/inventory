<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome1 extends CI_Controller {
//Validating login
function __construct(){   
parent::__construct();
$this->load->helper('url');
$this->load->library('session');

}

public function index(){

    if(!$this->session->userdata('uid')){
//    print_r($this->session->userdata());die;
      redirect('signin');
    }
    else{
//    print_r($this->session->userdata());die;

    //   $userfname=$this->session->userdata('fname');	
    //  $this->load->view('welcome',['firstname'=>$userfname]);
     
      if($this->session->userdata('type')==1){

        $userfname=$this->session->userdata('fname');	
        // redirect('admin',['firstname'=>$userfname]);
        $this->load->view('admin/index',['firstname'=>$userfname]);


      }else{
        $userfname=$this->session->userdata('fname');	
         $this->load->view('welcome',['firstname'=>$userfname]);
      }

    }

}
}