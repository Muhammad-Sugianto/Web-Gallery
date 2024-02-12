<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model('m_user');
       $this->load->library('form_validation'); // Load library validasi form
    }

    public function index()
    {
        $data = array (
            'title' => 'User',
            'user' => $this->m_user->get_all_data(),
            'isi' => 'user/v_user',
        );
        $this->load->view('layout/v_wrapper_backend', $data); // Load view dengan data yang diperlukan
    }

    public function add()
    {
        // Set aturan validasi form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal, kembali ke halaman tambah user (v_add)
            $data = array(
                'title' => 'Tambah User',
                'isi' => 'user/v_add',
            );
            $this->load->view('layout/v_wrapper_backend', $data);
        } else {
            // Jika validasi form berhasil, simpan data ke dalam database
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'), // Pastikan nilai pass disertakan sesuai dengan input
                'email' => $this->input->post('email'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                
                'alamat' => $this->input->post('alamat'),
                // 'level' => $this->input->post('level') // Jika level masih diperlukan dalam penambahan user
            );
    
            $this->m_user->add($data); // Memanggil model untuk menambahkan data
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambah'); // Pesan sukses setelah menambahkan data
            redirect('user');
        }
    }
    
    
   // User.php (Controller)

   public function edit($user_id = null)
   {
       // Jika $user_id tidak ada, arahkan ke halaman index
       if ($user_id === null) {
           redirect('user');
       }
   
       // Set aturan validasi untuk form
       $this->form_validation->set_rules('username', 'Username', 'required');
       $this->form_validation->set_rules('password', 'Password', 'required');
       $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
       $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
       $this->form_validation->set_rules('alamat', 'Alamat', 'required');
   
       if ($this->form_validation->run() == FALSE) {
           // Jika validasi form gagal, kembali ke halaman edit user (v_edit)
           $data = array(
               'title' => 'Edit User',
               'user_id' => $user_id,
               'user' => $this->m_user->get_data($user_id), // Ambil data user berdasarkan user_id
               'isi' => 'user/v_edit',
           );
           $this->load->view('layout/v_wrapper_backend', $data);
       } else {
           // Jika validasi form berhasil, simpan data ke dalam database
           $data = array(
               'username' => $this->input->post('username'),
               'password' => $this->input->post('password'),
               'email' => $this->input->post('email'),
               'nama_lengkap' => $this->input->post('nama_lengkap'),
               'alamat' => $this->input->post('alamat'),
           );
           $this->m_user->edit($user_id, $data); // Panggil method edit dari model m_user
           $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
           redirect('user');
       }
   }
   

    
    
    public function delete($user_id = NULL)
    {
        $this->m_user->delete($user_id); // Mengirimkan user_id sebagai parameter
        $this->session->set_flashdata('pesan', 'Data Berhasil DiDelete');
        redirect('user');
    }
    
}

/* End of file User.php */
