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
        // $this->db->set('quantity', $quantity);
        $this->db->where('orderId', $id);
        $this->db->update('allorders');
        $itemId = $this->db->select('itemId')->from('allorders')->where('orderId', $id)->get()->result();
        $quantity = $this->db->select('quantity')->from('allorders')->where('orderId', $id)->get()->result();
        self::updateQuantity($itemId, $quantity);

    }
    public function updateQuantity($itemId, $quantity){
        // dd($itemId[0]->itemId);
       // dd($quantity[0]->quantity);
        
        // $dbquantity = $this->db->from('items')->where('id', $itemId)->get()->result();
        $this->db->select('quantity');
        $this->db->from('items');
        $this->db->where('id', $itemId[0]->itemId);
        $result = $this->db->get()->result();
       // dd($result[0]->quantity);
        //dd($result);
        $this->db->set('quantity', $result[0]->quantity-$quantity[0]->quantity);
        $this->db->where('id', $itemId[0]->itemId);
        $this->db->update('items');
    }



}


?>