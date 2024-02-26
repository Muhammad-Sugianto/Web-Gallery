<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login {
    protected $ci;

    public function __construct() {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
        $this->ci->load->library('session');
    }

    public function login($username, $password) {
        $user = $this->ci->m_auth->login_user($username, $password);

        if ($user) {
            $user_id = $user->user_id; 
            $profil = $user->profil;
            $nama_lengkap = $user->nama_lengkap; 
            $level = $user->level; 
           
            $this->ci->session->set_userdata('user_id', $user_id);
            $this->ci->session->set_userdata('profil', $profil);
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_lengkap', $nama_lengkap);
            $this->ci->session->set_userdata('level', $level);
            
            if ($user->level == 'admin') {
                redirect(base_url('admin/dashboard')); // Sesuaikan dengan alamat dashboard admin
            } else {
                redirect(base_url('user/dashboard')); // Sesuaikan dengan alamat dashboard user
            }
        } else {
            $this->ci->session->set_flashdata('error', 'Username atau Password Salah!!');
            redirect(base_url('login'));
        }
    }

    public function proteksi_halaman()
    {
        if (!$this->is_logged_in()) {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login !!');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->ci->session->unset_userdata('user_id');
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_lengkap');
        $this->ci->session->unset_userdata('level');
        $this->ci->session->set_flashdata('pesan', 'Anda berhasil logout'); 
        redirect('login');
    }

    private function is_logged_in() {
        return $this->ci->session->userdata('user_id') !== null;
    }
}
