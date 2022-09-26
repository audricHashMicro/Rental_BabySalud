<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        if (!$this->session->userdata('user')) {
            $config = array(
                array(
                    'field' => 'email',
                    'rules' => 'required|trim',
                    'errors' => array(
                        'required' => 'Email must be filled.',
                    )
                ),
                array(
                    'field' => 'password',
                    'rules' => 'required|trim',
                    'errors' => array(
                        'required' => 'Password must be filled.'
                    )
                ),
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $this->load->view('pages/login.php');
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $user = $this->db->get_where('user', ['user_email' => $email], 1)->row_array();

                $captcha_response = trim($this->input->post('g-recaptcha-response'));
                if ($captcha_response != '') {
                    $keySecret = '6LerPyAbAAAAAKTV_qXa6AQTb88ngd29Yjx0h5FC';
                    $check = array(
                        'secret' => $keySecret,
                        'response' => $this->input->post('g-recaptcha-response')
                    );

                    $start = curl_init();
                    curl_setopt($start, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
                    curl_setopt($start, CURLOPT_POST, true);
                    curl_setopt($start, CURLOPT_POSTFIELDS, http_build_query($check));
                    curl_setopt($start, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($start, CURLOPT_RETURNTRANSFER, true);
                    $receiveData = curl_exec($start);
                    $finalResponse = json_decode($receiveData, true);

                    $final = json_decode($receiveData, true);

                    if ($finalResponse['success']) {
                        if ($user) {
                            if (password_verify($password, $user['user_password'])) {
                                if ($user['user_email'] == "admin@umn.ac.id") {
                                    $newdata = array(
                                        'user' => 'admin',
                                        'user_email'  => $user['user_email'],
                                        'user_name'   => $user['user_name'],
                                    );
                                    $this->session->set_userdata($newdata);
                                    // echo $this->session->userdata('user_name');
                                    redirect('admin');
                                } else {
                                    $newdata = array(
                                        'user' => 'user',
                                        'user_email'  => $user['user_email'],
                                        'user_name'   => $user['user_name'],
                                        'user_id'   => $user['user_id'],
                                    );
                                    $this->session->set_userdata($newdata);
                                    $this->session->set_flashdata('captcha', 'Captcha Succeed!');
                                    redirect('home');
                                }
                            } else {
                                $this->session->set_flashdata('wrong', '<div class="text-danger">Wrong email or password!</div>');
                                redirect('authentication');
                            }
                        } else {
                            $this->session->set_flashdata('wrong', '<div class="text-danger">Wrong email or password!</div>');
                            redirect('authentication');
                        }
                    } else {
                        $this->session->set_flashdata('captcha', 'Validation Failed! Try Again.');
                        redirect('authentication');
                    }
                } else {
                    $this->session->set_flashdata('captcha', 'Validation Failed! Try Again!');
                    redirect('authentication');
                }
            }
        } else {
            redirect('home');
        }
    }

    public function validate()
    {
    }

    public function registration()
    {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim|min_length[5]|max_length[128]',
                'errors' => array(
                    'required' => 'Name must be filled.',
                    'min_length' => 'Name contains at least 5 characters',
                    'max_length' => 'Name contains a maximum 128 characters'
                ),
            ),
            array(
                'field' => 'address',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'Address must be filled.'
                ),
            ),
            array(
                'field' => 'email',
                'rules' => 'required|trim|valid_email|is_unique[user.user_email]',
                'errors' => array(
                    'required' => 'Email must be filled.',
                    'valid_email' => 'Wrong email format.',
                    'is_unique' => 'This email has already registered.'
                ),
            ),
            array(
                'field' => 'phone',
                'rules' => 'required|trim|numeric',
                'errors' => array(
                    'required' => 'Phone Number must be filled.',
                    'numeric' => 'Phone Number must numeric.'
                ),
            ),
            array(
                'field' => 'password',
                'rules' => 'required|min_length[8]|max_length[25]|trim',
                'errors' => array(
                    'required' => 'Password must be filled.',
                    'min_length' => 'Password contains at least 8 characters.',
                    'max_length' => 'Password contains a maximum 25 characters.',
                ),
            ),
            array(
                'field' => 'cpassword',
                'rules' => 'required|trim|matches[password]',
                'errors' => array(
                    'required' => 'Confirm Password must be filled.',
                    'matches' => 'Password do not match.'
                ),
            )
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $this->load->view('pages/registration.php');
        } else {
            $data = [
                'user_name' => htmlspecialchars($this->input->post('name', TRUE)),
                'user_email' => htmlspecialchars($this->input->post('email', TRUE)),
                'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'user_address' => htmlspecialchars($this->input->post('address', TRUE)),
                'user_phone' => $this->input->post('phone'),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created!</div>');
            redirect('authentication');
        }
    }

    public function logout()
    {
        unset(
            $_SESSION['admin'],
            $_SESSION['user'],
            $_SESSION['category1'],
            $_SESSION['category2'],
            $_SESSION['category3'],
            $_SESSION['category5'],
            $_SESSION['category6'],
            $_SESSION['paid'],
            $_SESSION['arrive'],
            $_SESSION['pickup'],
            $_SESSION['done']
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been Logged Out!</div>');
        redirect('authentication');
    }
}
