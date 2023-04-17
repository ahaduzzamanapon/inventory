<?php
class allOrders extends CI_Model {

    public function showAllData() {
        $this->load->database();
        // $query = $this->db->order_by('orderId', 'asc')->get('allorders');
        // return $query->result();

        $this->db->select('allorders.orderId, items.itemname, categories.catname, subcategories.subcname, allorders.quantity, items.price, allorders.total, allorders.status');
        $this->db->from('allorders');
        $this->db->join('items', 'allorders.itemId = items.id');
        $this->db->join('categories', 'items.catid = categories.id');
        $this->db->join('subcategories', 'items.subid = subcategories.sid');
        return  $this->db->get()->result();
    }
    public function reject($id)
    {
        $this->db->set('status', 2);
        $this->db->where('orderId', $id);
        $this->db->update('allorders');
    }
    public function approve($id)
    {
        $this->db->set('status', 1);
        $this->db->where('orderId', $id);
        $this->db->update('allorders');
    }
    public function delivered($id)
    {
        $this->db->set('status', 3);
        $this->db->where('orderId', $id);
        $this->db->update('allorders');

    }



}


?>