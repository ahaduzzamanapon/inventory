<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("form");
        $this->load->database();
        $this->load->model("catmodel");
        $this->load->model("subModel");
        $this->load->model("Unit");
        $this->load->library("session");
        $this->load->helper("url");
    }

    public function index()
    {
        // Load categories from the database
        $this->db->select("*");
        $this->db->from("categories");
        $query = $this->db->get();
        $data["categories"] = $query->result();

        $this->load->view("search_view", $data);
    }

    public function get_subcategories()
    {
        // Get subcategories for selected category
        $this->db->select("*");
        $this->db->from("subcategories");
        $this->db->where("catname", $this->input->post("catname"));
        $query = $this->db->get();
        $subcategories = $query->result_array();

        echo json_encode($subcategories);
    }
    public function add_item_to_cart()
    {
        // Get subcategories for selected category

        $this->db->from("items");
        $this->db->where("id", $this->input->post("itemid"));
        $query = $this->db->get();
        $items = $query->result_array();

        echo json_encode($items);
    }

    public function get_items()
{
    // Get items for selected subcategory
    $this->db->select("*");
    $this->db->from("items");
    $this->db->where("subid", $this->input->post("subid"));
    $this->db->where("status !=", 0);
    $this->db->where("quantity >=", 1); // Exclude items with quantity less than 1
    $query = $this->db->get();
    $items = $query->result_array();

    echo json_encode($items);
}


    public function search_items()
    {
        // Search for items by itemname
        $this->db->select("*");
        $this->db->from("items");
        $this->db->like("itemname", $this->input->post("search_text"));
        $this->db->where("status !=", 0);   
		$this->db->where("quantity >=", 1); // Exclude items with quantity less than 1

        $query = $this->db->get();
        $items = $query->result_array();

        echo json_encode($items);
    }
}
