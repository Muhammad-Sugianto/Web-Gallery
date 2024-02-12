<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like extends CI_Controller {
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model('m_like'); // Mengubah model yang di-load menjadi m_like
       $this->load->library('form_validation'); // Load library validasi form
    }

    public function index()
    {
        $data = array (
            'title' => 'Like',
            'like' => $this->m_like->get_all_data(), // Mengambil data dari model m_like
            'isi' => 'like/v_like', // Pastikan v_like sesuai dengan struktur yang baru
        );
        $this->load->view('layout/v_wrapper_backend', $data); // Load view dengan data yang diperlukan
    }
    
    public function add()
    {
        $this->form_validation->set_rules('like_id', 'Like ID', 'required');
        $this->form_validation->set_rules('foto_id', 'Foto ID', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        $this->form_validation->set_rules('tgl_like', 'Tanggal Like', 'required|valid_date');
        
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Like', // Ubah judul sesuai dengan struktur yang baru
                'isi' => 'like/v_add', // Pastikan v_add_like sesuai dengan struktur yang baru
            );
            $this->load->view('layout/v_wrapper_backend', $data);
        } else {
            $data = array(
                'like_id' => $this->input->post('like_id'),
                'foto_id' => $this->input->post('foto_id'),
                'user_id' => $this->input->post('user_id'),
                'tgl_like' => date('Y-m-d', strtotime($this->input->post('tgl_like'))),
            );
    
            $this->m_like->add($data); // Menggunakan model m_like
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambah');
            redirect('like');
        }
    }
    


   public function edit($like_id = null)
{
    if ($like_id === null) {
        redirect('like');
    }

    $this->form_validation->set_rules('like_id', 'Like ID', 'required');
    $this->form_validation->set_rules('foto_id', 'Foto ID', 'required');
    $this->form_validation->set_rules('user_id', 'User ID', 'required');
    $this->form_validation->set_rules('tgl_like', 'Tanggal Like', 'required|valid_date');

    if ($this->form_validation->run() == FALSE) {
        $data = array(
            'title' => 'Edit Like', // Ubah judul sesuai dengan struktur yang baru
            'like_id' => $like_id,
            'like' => $this->m_like->get_data($like_id), // Menggunakan model m_like
            'isi' => 'like/v_edit', // Pastikan v_edit_like sesuai dengan struktur yang baru
        );
        $this->load->view('layout/v_wrapper_backend', $data);
    } else {
        $data = array(
            'like_id' => $this->input->post('like_id'),
            'foto_id' => $this->input->post('foto_id'),
            'user_id' => $this->input->post('user_id'),
            'tgl_like' => date('Y-m-d', strtotime($this->input->post('tgl_like'))),
        );
        $this->m_like->edit($like_id, $data); // Menggunakan model m_like
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
        redirect('like');
    }
}
    
    
    public function delete($like_id = NULL)
    {
        $this->m_like->delete($like_id); // Menggunakan model m_like
        $this->session->set_flashdata('pesan', 'Data Berhasil DiDelete');
        redirect('like');
    }
    
}

/* End of file User.php */
