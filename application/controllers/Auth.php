<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function login()
    {
        $this->load->library('form_validation');
        $this->load->model('m_auth');
    
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => 'Username Harus Diisi!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => 'Password Harus Diisi!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user_data = $this->m_auth->login_user($username, $password); // Ubah nama model sesuai dengan model yang Anda buat

            if ($user_data) {
                // Pastikan Anda memeriksa level pengguna setelah memvalidasi login
                if ($user_data->level == 'admin') {
                    $this->session->set_userdata('user_id', $user_data->user_id);
                    $this->session->set_userdata('username', $user_data->username);
                    $this->session->set_userdata('email', $user_data->email);
                    $this->session->set_userdata('nama_lengkap', $user_data->nama_lengkap);
                    $this->session->set_userdata('alamat', $user_data->alamat);
                    $this->session->set_userdata('level', $user_data->level);
                    
                    $this->session->set_flashdata('pesan', 'Anda berhasil login sebagai admin.');
                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_userdata('user_id', $user_data->user_id);
                    $this->session->set_userdata('username', $user_data->username);
                    $this->session->set_userdata('email', $user_data->email);
                    $this->session->set_userdata('nama_lengkap', $user_data->nama_lengkap);
                    $this->session->set_userdata('alamat', $user_data->alamat);
                    $this->session->set_userdata('level', $user_data->level);
                    
                    $this->session->set_flashdata('pesan', 'Anda berhasil login.');
                    redirect(base_url('home'));
                }
            } else {
                // Hapus pengaturan flash error yang tidak perlu
                $this->session->set_flashdata('pesan', 'Username atau password salah.');
                redirect(base_url('login'));
            }
        }
    
        $data = array(
            'title' => 'Login',
        );
        $this->load->view('v_login', $data); // Sesuaikan dengan nama view yang Anda buat
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Anda berhasil logout.');
        redirect('home');
    }


    public function registrasi()
    {
        $this->load->library('form_validation');
        $this->load->model('m_auth');
    
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_user.email]', array(
            'required' => 'Email harus diisi!',
            'valid_email' => 'Format email tidak valid!',
            'is_unique' => 'Email sudah digunakan!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => 'Password harus diisi!'
        ));
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', array(
            'required' => 'Nama lengkap harus diisi!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => 'Alamat harus diisi!'
        ));
    
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'level' => 'user' // Level default untuk user baru
            );
    
            $this->m_auth->registrasi_user($data);
    
            $this->session->set_flashdata('pesan', 'Registrasi berhasil. Silakan login.');
            redirect(base_url('auth/login'));
        }   
    
        $data = array(
            'title' => 'Registrasi',
        );
        $this->load->view('v_registrasi', $data); // Sesuaikan dengan nama view yang Anda buat
    }
    
}
