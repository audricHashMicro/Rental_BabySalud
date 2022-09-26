<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model
{

    public function getList()
    {
        $user = $this->session->userdata('user_id');
        return $this->db->query("SELECT * FROM transaction WHERE trans_user_id = $user AND trans_status_id != 4")->result_array();
    }

    public function getItem()
    {
        $user = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * FROM transaction WHERE trans_user_id = $user AND trans_status_id != 4")->result_array();
        if ($query != NULL) {
            $id_status = $query[0]['trans_status_id'];
            if ($id_status == 5) {
                $this->session->set_userdata('cart');
            }
            if ($id_status == 1) {
                $this->session->set_userdata('paid');
            }
            if ($id_status == 2) {
                $this->session->set_userdata('paid');
                $this->session->set_userdata('arrive');
            }
            if ($id_status == 3) {
                $this->session->set_userdata('paid');
                $this->session->set_userdata('arrive');
                $this->session->set_userdata('pickup');
            }
        }

        $idx = 0;
        foreach ($query as $row) {
            $temp = $query[$idx]['trans_item_id'];
            $query[$idx] = $this->db->query("SELECT * FROM item WHERE item_id = $temp LIMIT 1")->result_array();
            // var_dump($query);
            $idx++;
        }
        return $query;
    }

    public function getCategory()
    {
        return $this->db->query("SELECT * FROM category")->result_array();
    }

    public function getStatus()
    {
        return $this->db->query("SELECT * FROM status")->result_array();
    }

    public function DeleteData($id)
    {
        $this->db->delete(
            'transaction',
            ['trans_item_id' => $id],
            ['trans_user_id' => $this->session->userdata('user_id')],
            ['trans_status_id' => 5]
        );

        $query = $this->db->query("SELECT item_category_id FROM item WHERE item_id = $id LIMIT 1")->result_array();
        $temp = "category" . $query[0]['item_category_id'];
        unset(
            $_SESSION[$temp]
        );
    }

    public function payment($duration)
    {
        $user = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * FROM transaction WHERE trans_user_id = $user AND trans_status_id = 5")->result_array();
        $idx = 0;
        foreach ($query as $row) {
            $total = $query[$idx]['trans_total'] * $duration;
            $item = $query[$idx]['trans_item_id'];
            $idx++;
            $this->db->query("UPDATE transaction SET duration = $duration, trans_total = $total, trans_status_id = 1
                            WHERE trans_user_id = $user AND trans_status_id = 5 AND trans_item_id = $item");
            $this->db->query("UPDATE item SET item_qty = item_qty-1 WHERE item_id = $item");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function pickup()
    {
        $user = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * FROM transaction WHERE trans_user_id = $user AND trans_status_id = 2")->result_array();
        $idx = 0;
        foreach ($query as $row) {
            $item = $query[$idx]['trans_item_id'];
            $idx++;
            $this->db->query("UPDATE transaction SET trans_status_id = 3
                            WHERE trans_user_id = $user AND trans_status_id = 2 AND trans_item_id = $item");
        }
        $this->session->set_userdata('pickup');
    }
}
