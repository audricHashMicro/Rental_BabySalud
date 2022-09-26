<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->home_model->getList();
    }

    public function index()
    {
        $data['navbar'] = $this->load->view('template/navbar');
        $data['item'] = $this->home_model->getItem();
        $data['category'] = $this->home_model->getCategory();
        $this->load->view('pages/home', $data);
    }

    public function product()
    {
        $data['navbar'] = $this->load->view('template/navbar', NULL);
        $data['id'] = 1;
        $data['item'] = $this->home_model->ShowCategory($data['id']);
        $data['category'] = $this->home_model->getCategory();
        $this->load->view('pages/product', $data);
    }
    public function ShowCategory()
    {
        $data['navbar'] = $this->load->view('template/navbar', NULL);
        $data['id'] = $this->input->get('id');
        $data['item'] = $this->home_model->ShowCategory($data['id']);
        $data['category'] = $this->home_model->getCategory();
        $this->load->view('pages/product', $data);
    }

    public function ShowDetail()
    {
        $data['navbar'] = $this->load->view('template/navbar', NULL);
        $data['id'] = $this->input->get('id');
        $data['item'] = $this->home_model->ShowDetail($data['id']);
        $data['product'] = $this->home_model->getProduct($data['id']);
        $this->load->view('pages/product-detail', $data);
    }

    public function addCart()
    {
        $data['navbar'] = $this->load->view('template/navbar', NULL);
        $data['id'] = $this->input->get('id');
        $data['add'] = $this->home_model->addCart($data['id']);
        $this->session->set_flashdata('add', '<div class="alert alert-success" role="alert">Item added!</div>');
        // $this->load->view('pages/detail', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
