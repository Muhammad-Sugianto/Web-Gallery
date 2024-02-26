<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model('m_user');
       $this->load->library('form_validation'); // Load library validasi form
    }

    public function index()
    {
        $data = array (
            'title' => 'login',
            // 'login' => $this->m_user-->get_all_data(),
            'isi' => 'v_login',
        );
        $this->load->view('layout/v_wrapper_frontend', $data); // Load view dengan data yang diperlukan
    }
}