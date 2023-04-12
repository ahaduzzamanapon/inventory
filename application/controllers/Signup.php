<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Signup extends CI_Controller {

    public function __construct(){
       
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('user_agent');
        $this->load->model('Signup_Model');
    }

public function index()
{
//Form Validation
$this->form_validation->set_rules('firstname','First Name','required|alpha');
$this->form_validation->set_rules('lastname','Last Name','required|alpha');
$this->form_validation->set_rules('emailid','EmailId','required|valid_email');
$this->form_validation->set_rules('password','Password','required|min_length[6]');
$this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[password]');
$this->form_validation->set_message('is_unique', 'This email is already exists.');
if($this->form_validation->run())
{
//Getting Post Values
$fname=$this->input->post('firstname');
$lname=$this->input->post('lastname');
$emailid=$this->input->post('emailid');
$password=$this->input->post('password');

$this->Signup_Model->index($fname,$lname,$emailid,$password);
} else {
$this->load->view('signup');
}
}}
