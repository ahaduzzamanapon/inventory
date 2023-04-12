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
        $data['items'] = $this->db->get('items')->result();
        $units = $this->Unit->showAllData();
        $data['units'] = $units;
        $data['validationerrorstor'] = $this->session->flashdata('validationerrorstor');
        $data['imageerror'] = $this->session->flashdata('imageerror');
       



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



    public function store_item()
{
    $this->load->library('form_validation');
    $this->load->helper('form');

    // Set validation rules
    $this->form_validation->set_rules('itemname', 'Item Name', 'required');
    $this->form_validation->set_rules('category', 'Category', 'required');
    $this->form_validation->set_rules('subcategory', 'Sub-Category', 'required');
    $this->form_validation->set_rules('unit', 'Unit', 'required');
    $this->form_validation->set_rules('price', 'Item Price', 'required|numeric');
    $this->form_validation->set_rules('quantity', 'Item Quantity', 'required|numeric');
    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == FALSE)
    {
        $this->session->set_flashdata('validationerrorstor', validation_errors());
        $this->load->library('user_agent');
         // Redirect the user to the previous page
        redirect($this->agent->referrer());
    }
    else
    {
        // Form validation succeeded, store data in the database
        $data = array(
            'itemname' => $this->input->post('itemname'),
            'catid' => $this->input->post('category'),
            'subid' => $this->input->post('subcategory'),
            'unitid' => $this->input->post('unit'),
            'price' => $this->input->post('price'),
            'quantity' => $this->input->post('quantity'),
            'status' => $this->input->post('status')
        );

        // Store image on local storage and send image name to the database
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image'))
        {
            // File upload failed, show error message
            
            $this->session->set_flashdata('imageerror', $this->upload->display_errors());

            $this->load->library('user_agent');
             
            redirect($this->agent->referrer());
        }
        else
        {
            // File upload succeeded, store image name in the database
            $data['image'] = $this->upload->data('file_name');
            $this->db->insert('items', $data);
            $this->session->set_flashdata('success', 'Record added successfully');
            $this->load->library('user_agent');
    
    
            // Redirect the user to the previous page
            redirect($this->agent->referrer());
        }
    }
}

    

}
?>