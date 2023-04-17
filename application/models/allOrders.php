<?php
class allOrders extends CI_Model {

    public function showAllData() {
        $this->load->database();
        // $query = $this->db->order_by('orderId', 'asc')->get('allorders');
        // return $query->result();

        $this->db->select('items.id, items.itemname, categories.catname, subcategories.subcname, allorders.quantity, items.price, allorders.total, allorders.status');
        $this->db->from('allorders');
        $this->db->join('items', 'allorders.itemId = items.id');
        $this->db->join('categories', 'items.catid = categories.id');
        $this->db->join('subcategories', 'items.subid = subcategories.sid');
        return  $this->db->get()->result();
    }



}


?>