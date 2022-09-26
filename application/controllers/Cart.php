<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        if (!$this->session->userdata('user')) {
            redirect('authentication');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'duration',
            'duration',
            'required',
            array('required' => 'Duration must be filled.')
        );

        if ($this->form_validation->run() == FALSE) {
            $data['navbar'] = $this->load->view('template/navbar');
            $data['list'] = $this->cart_model->getList();
            $data['item'] = $this->cart_model->getItem();
            $data['category'] = $this->cart_model->getCategory();
            $data['status'] = $this->cart_model->getStatus();
            $this->session->set_flashdata('time', '<div class="text-danger">Duration must be filled!</div>');
            $data['duration'] = $this->input->post('duration');
            $this->load->view('pages/cart', $data);
        } else {
            $data['duration'] = $this->input->post('duration');
            $data['navbar'] = $this->load->view('template/navbar');
            $data['list'] = $this->cart_model->getList();
            $data['item'] = $this->cart_model->getItem();
            $data['category'] = $this->cart_model->getCategory();
            $data['status'] = $this->cart_model->getStatus();
            $this->cart_model->payment($this->input->post('duration'));
            $this->session->set_userdata(['paid' => $this->input->post('duration')]);
            $this->load->view('pages/cart', $data);
        }
    }

    public function del($id)
    {
        $this->cart_model->DeleteData($id);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function pickup()
    {
        $this->cart_model->pickup();
        redirect($_SERVER['HTTP_REFERER']);
    }
}
