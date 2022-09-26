<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user') == 'user' || $this->session->userdata('user') == 'admin') {
            $id_user = $this->session->userdata('user_id');
            $barang1 = $this->db->query("SELECT * FROM transaction WHERE trans_user_id = $id_user AND trans_status_id != 4")->result_array();
            // var_dump($barang1[0]['trans_status_id']);

            $idx = 0;
            foreach ($barang1 as $row) {
                $idx++;
            }

            unset(
                $_SESSION['paid'],
                $_SESSION['arrive'],
                $_SESSION['pickup'],
                $_SESSION['done'],
                $_SESSION['category1'],
                $_SESSION['category2'],
                $_SESSION['category3'],
                $_SESSION['category5'],
                $_SESSION['category6']
            );

            for ($i = 0; $i < $idx; $i++) {
                $id_item = $barang1[$i]['trans_item_id'];
                $barang2 = $this->db->query("SELECT * FROM item WHERE item_id = $id_item LIMIT 1")->result_array();
                $x = "category" . $barang2[0]['item_category_id'];
                $data = array(
                    $x => TRUE
                );
                $this->session->set_userdata($data);
            }
        }
    }

    public function getCategory()
    {
        return $this->db->get('category')->result_array();
    }

    public function getItem()
    {
        return $this->db->get('item')->result_array();
    }

    public function ShowCategory($id)
    {
        $this->db->trans_begin();
        $query1 = $this->db->query("SELECT * FROM item WHERE item_category_id='" . $id . "'");
        return $query1->result_array();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function ShowDetail($id)
    {
        $this->db->trans_begin();
        $query1 = $this->db->query("SELECT * FROM item WHERE item_id='" . $id . "'");
        return $query1->result_array();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function getProduct($id)
    {
        $query1 = $this->db->query("SELECT item_category_id FROM item WHERE item_id='" . $id . "'")->result_array();
        $temp = $query1[0]['item_category_id'];
        return $this->db->query("SELECT * FROM item WHERE item_category_id = $temp LIMIT 4")->result_array();
        // var_dump($query1[0]['item_category_id']);
    }

    public function addCart($id)
    {
        $barang = $this->db->query("SELECT * FROM item WHERE item_id = $id")->result_array();
        $this->db->trans_begin();
        $data = array(
            'trans_user_id' => $this->session->userdata('user_id'),
            'trans_item_id' => $id,
            'duration' => 1,
            'trans_total' => $barang[0]['item_price'],
            'trans_status_id' => 5
        );
        $this->db->insert('transaction', $data);
        $this->db->trans_complete();

        $this->session->set_userdata("category" . $barang[0]['item_category_id']);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function getList()
    {
        $user = $this->session->userdata('user_id');
        if ($user != NULL) {
            $query = $this->db->query("SELECT * FROM transaction WHERE trans_user_id = $user AND trans_status_id != 4")->result_array();
            foreach ($query as $item) {
                if ($item['trans_status_id'] == 1) {
                    $this->session->set_userdata(['paid' => 'paid']);
                }
                if ($item['trans_status_id'] == 2) {
                    $this->session->set_userdata(['paid' => 'paid']);
                    $this->session->set_userdata(['arrive' => 'arrive']);
                }
                if ($item['trans_status_id'] == 3) {
                    $this->session->set_userdata(['paid' => 'paid']);
                    $this->session->set_userdata(['arrive' => 'arrive']);
                    $this->session->set_userdata(['pickup' => 'pickup']);
                }
            }
        }
    }
}
