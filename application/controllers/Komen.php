<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komen extends CI_Controller {
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model('m_komen'); // Mengubah model yang di-load menjadi m_komen
       $this->load->library('form_validation'); // Load library validasi form
    }

    public function index()
    {
        $data = array (
            'title' => 'Komen',
            'komen' => $this->m_komen->get_all_data(), // Mengambil data dari model m_komen
            'isi' => 'komen/v_komen', // Pastikan v_komen sesuai dengan struktur yang baru
        );
        $this->load->view('layout/v_wrapper_backend', $data); // Load view dengan data yang diperlukan
    }
    
    public function add()
    {
        $this->form_validation->set_rules('komen_id', 'Komentar ID', 'required');
        $this->form_validation->set_rules('foto_id', 'Foto ID', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        $this->form_validation->set_rules('isi_komen', 'Isi Komentar', 'required');
        $this->form_validation->set_rules('tgl_komen', 'Tanggal Komentar', 'required|valid_date');
        
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Komen', // Ubah judul sesuai dengan struktur yang baru
                'isi' => 'komen/v_add', // Pastikan v_add_komen sesuai dengan struktur yang baru
            );
            $this->load->view('layout/v_wrapper_backend', $data);
        } else {
            $data = array(
                'komen_id' => $this->input->post('komen_id'),
                'foto_id' => $this->input->post('foto_id'),
                'user_id' => $this->input->post('user_id'),
                'isi_komen' => $this->input->post('isi_komen'),
                'tgl_komen' => date('Y-m-d', strtotime($this->input->post('tgl_komen'))),
            );
    
            $this->m_komen->add($data); // Menggunakan model m_komen
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambah');
            redirect('komen');
        }
    }
    


   public function edit($komen_id = null)
{
    if ($komen_id === null) {
        redirect('komen');
    }

    $this->form_validation->set_rules('komen_id', 'Komentar ID', 'required');
    $this->form_validation->set_rules('foto_id', 'Foto ID', 'required');
    $this->form_validation->set_rules('user_id', 'User ID', 'required');
    $this->form_validation->set_rules('isi_komen', 'Isi Komentar', 'required');
    $this->form_validation->set_rules('tgl_komen', 'Tanggal Komentar', 'required|valid_date');

    if ($this->form_validation->run() == FALSE) {
        $data = array(
            'title' => 'Edit Komen', // Ubah judul sesuai dengan struktur yang baru
            'komen_id' => $komen_id,
            'komen' => $this->m_komen->get_data($komen_id), // Menggunakan model m_komen
            'isi' => 'komen/v_edit', // Pastikan v_edit_komen sesuai dengan struktur yang baru
        );
        $this->load->view('layout/v_wrapper_backend', $data);
    } else {
        $data = array(
            'komen_id' => $this->input->post('komen_id'),
            'foto_id' => $this->input->post('foto_id'),
            'user_id' => $this->input->post('user_id'),
            'isi_komen' => $this->input->post('isi_komen'),
            'tgl_komen' => date('Y-m-d', strtotime($this->input->post('tgl_komen'))),
        );
        $this->m_komen->edit($komen_id, $data); // Menggunakan model m_komen
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
        redirect('komen');
    }
}
    
    
    public function delete($komen_id = NULL)
    {
        $this->m_komen->delete($komen_id); // Menggunakan model m_komen
        $this->session->set_flashdata('pesan', 'Data Berhasil DiDelete');
        redirect('komen');
    }
    
}

/* End of file Komen.php */
