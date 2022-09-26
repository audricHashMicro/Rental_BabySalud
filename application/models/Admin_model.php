<?php

class Admin_model extends CI_Model
{
    public function getList()
    {
        return $this->db->query("SELECT * FROM transaction WHERE trans_status_id != 4 AND trans_status_id != 5")->result_array();
    }

    public function getUser()
    {
        return $this->db->query("SELECT * FROM user")->result_array();
    }

    public function getStatus()
    {
        return $this->db->query("SELECT * FROM status")->result_array();
    }

    //DETAIL
    public function getListDetail($id)
    {
        return $this->db->query("SELECT * FROM transaction WHERE trans_status_id != 4 AND trans_status_id != 5 AND trans_user_id = $id")->result_array();
    }

    public function getUserDetail($id)
    {
        return $this->db->query("SELECT * FROM user WHERE user_id = $id LIMIT 1")->result_array();
    }

    public function getItem()
    {
        return $this->db->query("SELECT * FROM item")->result_array();
    }

    //STATUS
    public function arrive($id)
    {
        $this->db->query("UPDATE transaction SET trans_status_id = 2 WHERE trans_user_id = $id AND trans_status_id = 1");
    }

    public function done($id)
    {
        $query = $this->db->query("SELECT * FROM transaction WHERE trans_user_id = $id AND trans_status_id = 3")->result_array();
        $barang = $this->db->query("SELECT * FROM item")->result_array();
        foreach ($query as $item) {
            $id_item = $item['trans_item_id'];
            foreach ($barang as $barangs) {
                $qty = $barangs['item_qty'] + 1;
                if ($id_item == $barangs['item_id']) {
                    $this->db->query("UPDATE item SET item_qty = $qty WHERE item_id = $id_item");
                    break;
                }
            }
        }
        $this->db->query("UPDATE transaction SET trans_status_id = 4 WHERE trans_user_id = $id AND trans_status_id = 3");
    }
}
