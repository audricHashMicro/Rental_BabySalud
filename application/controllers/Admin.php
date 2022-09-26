<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        if ($this->session->userdata('user') != 'admin')
            redirect('authentication');
    }

    public function index()
    {
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table('item');
        $crud->columns('item_name', 'item_category_id', 'item_price', 'item_qty', 'item_desc', 'item_photo');

        $crud->display_as('item_name', 'Name');
        $crud->display_as('item_category_id', 'Category');
        $crud->display_as('item_price', 'Price');
        $crud->display_as('item_qty', 'Quantity');
        $crud->display_as('item_desc', 'Description');
        $crud->display_as('item_photo', 'Photo');

        $crud->set_field_upload('item_photo', 'assets/uploads/photo');
        $crud->set_relation('item_category_id', 'category', 'category_name');
        $crud->callback_edit_field('Deskripsi', array($this, 'edit_description'));
        $crud->callback_add_field('Deskripsi', array($this, 'add_description'));
        $crud->set_crud_url_path(site_url(strtolower(__CLASS__ . "/" . __FUNCTION__)), base_url() . 'admin');
        $crud->set_lang_string('list_add', 'Add')->set_lang_string('list_record', 'Item');
        $output = $crud->render();
        $data['crud'] = get_object_vars($output);

        // $this->load->library('grocery_CRUD');
        // $crud = new grocery_CRUD();
        // $crud->set_table('category');
        // $crud->columns('category_id', 'category_name', 'category_image');

        // $crud->display_as('category_id', 'ID');
        // $crud->display_as('category_name', 'Name');
        // $crud->display_as('category_image', 'Image');

        // $crud->set_field_upload('category_image', 'assets/uploads/image');
        // $crud->callback_edit_field('Deskripsi', array($this, 'edit_description'));
        // $crud->callback_add_field('Deskripsi', array($this, 'add_description'));
        // $crud->set_crud_url_path(site_url(strtolower(__CLASS__ . "/" . __FUNCTION__)), base_url() . 'admin/category');
        // $crud->set_lang_string('list_add', 'Add')->set_lang_string('list_record', 'Item');
        // $output = $crud->render();

        $data['style'] = $this->load->view('include/style-admin', $data, TRUE);
        $data['script'] = $this->load->view('include/script', $data, TRUE);
        $data['navbar'] = $this->load->view('template/navbar-admin', NULL);
        $this->load->view('pages/admin', $data);
    }

    public function transaction()
    {
        $data['list'] = $this->admin_model->getList();
        $data['user'] = $this->admin_model->getUser();
        $data['status'] = $this->admin_model->getStatus();
        $data['navbar'] = $this->load->view('template/navbar-admin', NULL);
        $this->load->view('pages/admin-transaction', $data);
    }

    public function transaction_detail()
    {
        $data['id'] = $this->input->get('id');
        $data['list'] = $this->admin_model->getListDetail($data['id']);
        $data['user'] = $this->admin_model->getUserDetail($data['id']);
        $data['status'] = $this->admin_model->getStatus();
        $data['item'] = $this->admin_model->getItem();
        $data['navbar'] = $this->load->view('template/navbar-admin', NULL);
        $this->load->view('pages/admin-trans-detail', $data);
    }

    public function arrive()
    {
        $data['id'] = $this->input->get('id');
        $this->admin_model->arrive($data['id']);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function done()
    {
        $data['id'] = $this->input->get('id');
        $this->admin_model->done($data['id']);
        $data['list'] = $this->admin_model->getList();
        $data['user'] = $this->admin_model->getUser();
        $data['status'] = $this->admin_model->getStatus();
        $data['navbar'] = $this->load->view('template/navbar-admin', NULL);
        $this->load->view('pages/admin-transaction', $data);
    }

    public function category()
    {
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table('category');
        $crud->columns('category_id', 'category_name', 'category_image');

        $crud->display_as('category_id', 'ID');
        $crud->display_as('category_name', 'Name');
        $crud->display_as('category_image', 'Image');

        $crud->set_field_upload('category_image', 'assets\uploads\image');
        $crud->callback_edit_field('Deskripsi', array($this, 'edit_description'));
        $crud->callback_add_field('Deskripsi', array($this, 'add_description'));
        $crud->set_crud_url_path(site_url(strtolower(__CLASS__ . "/" . __FUNCTION__)), base_url() . 'admin/category');
        $crud->set_lang_string('list_add', 'Add')->set_lang_string('list_record', 'Item');
        $output = $crud->render();

        $data['crud'] = get_object_vars($output);
        $data['style'] = $this->load->view('include/style-admin', $data, TRUE);
        $data['script'] = $this->load->view('include/script', $data, TRUE);
        $data['navbar'] = $this->load->view('template/navbar-admin', NULL);
        $this->load->view('pages/admin-category', $data);
    }


    function edit_description($value)
    {
        return "<textarea name='Deskripsi'> $value </textarea>";
    }

    function add_description()
    {
        return "<textarea name='Deskripsi'> </textarea>";
    }
}
