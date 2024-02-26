<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller {
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model('m_album');
    //    $this->load->library('form_validation'); // Load library validasi form
    }

    public function index()
    {
        $data = array (
            'title' => 'Album',
            'album' => $this->m_album->get_all_data(),
            'isi' => 'album/v_album',
        );
        $this->load->view('layout/v_wrapper_backend', $data); // Load view dengan data yang diperlukan
    }

    public function add()
    {
        // Load form validation library
        $this->load->library('upload');
        $this->load->library('form_validation');
    
        // Set form validation rules
        $this->form_validation->set_rules('album_id', 'Album id', 'required');
        $this->form_validation->set_rules('nama_album', 'Nama album', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tgl_buat', 'Tgl buat', 'required');
        $this->form_validation->set_rules('user_id', 'User_id', 'required');
    
        // Jika validasi formulir berhasil
        if ($this->form_validation->run() == TRUE) {
            // Set upload configuration
            $config['upload_path'] = './assets/album/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';
    
            // Initialize upload library with the configuration
            $this->upload->initialize($config);
    
            // Check if the file is uploaded successfully
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
    
                // Database data
                $data = array(
                    'album_id'   => $this->input->post('album_id'),
                    'nama_album' => $this->input->post('nama_album'),
                    'deskripsi'  => $this->input->post('deskripsi'),
                    'gambar'     => $upload_data['file_name'],
                    'tgl_buat'   => $this->input->post('tgl_buat'),
                    'user_id'    => $this->input->post('user_id'),
                );
    
                // Simpan data ke database
                $this->m_album->add($data); // Asumsi Anda memiliki metode "add" di model Anda
    
                // Redirect atau tampilkan pesan sukses
                redirect('album'); // Ganti "your_controller/success" dengan halaman sukses yang sesungguhnya
            } else {
                // Kesalahan unggah file
                $error = array('error' => $this->upload->display_errors());
                $data = array(
                    'title' => 'Add Album',
                    'album' => $this->m_album->get_all_data(),
                    'isi'   => 'album/v_add',
                    'error' => $error, // Teruskan pesan kesalahan ke tampilan
                );
                $this->load->view('layout/v_wrapper_backend', $data); // Ganti "your_view" dengan tampilan aktual untuk menampilkan kesalahan
            }
        } else {
            // Validasi formulir gagal
            $data = array(
                'title' => 'Add Album',
                'album' => $this->m_album->get_all_data(),
                'isi'   => 'album/v_add',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }
    }
    
    
 

    public function edit($album_id)
    {
        // Load form validation library
        $this->load->library('upload');
        $this->load->library('form_validation');
    
        // Set form validation rules
        $this->form_validation->set_rules('nama_album', 'Nama album', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tgl_buat', 'Tgl buat', 'required');
        $this->form_validation->set_rules('user_id', 'User_id', 'required');
    
        if ($this->form_validation->run() == TRUE) {
            // Set upload configuration
            $config['upload_path'] = './assets/album/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';
    
            // Initialize upload library with the configuration
            $this->upload->initialize($config);
    
            // Check if the file is uploaded successfully
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
    
                // Database data
                $data = array(
                    'album_id'   => $album_id,
                    'nama_album' => $this->input->post('nama_album'),
                    'deskripsi'  => $this->input->post('deskripsi'),
                    'gambar'     => $upload_data['file_name'],
                    'tgl_buat'   => $this->input->post('tgl_buat'),
                    'user_id'    => $this->input->post('user_id'),
                );
    
                // Update data in the database
                $this->m_album->edit($album_id, $data); // Using the "edit" method from your model M_album
    
                // Redirect or show success message
                redirect('album'); // Replace "your_controller/success" with your actual success page
            } else {
                // File upload failed
                $error = array('error' => $this->upload->display_errors());
                $data = array(
                    'title' => 'Edit Album',
                    'album' => $this->m_album->get_album_by_id($album_id), // Using the "get_album_by_id" method from your model M_album
                    'isi'   => 'album/v_edit',
                    'error' => $error, // Pass the error message to the view
                );
                $this->load->view('layout/v_wrapper_backend', $data); // Replace "your_view" with your actual view for displaying errors
            }
        } else {
            // Validation failed
            $data = array(
                'title' => 'Edit Album',
                'album' => $this->m_album->get_album_by_id($album_id), // Using the "get_album_by_id" method from your model M_album
                'isi'   => 'album/v_edit',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }
    }
    
   
    

    
    
    public function delete($album_id = NULL)
    {
        $this->m_album->delete($album_id); // Mengirimkan user_id sebagai parameter
        $this->session->set_flashdata('pesan', 'Data Berhasil DiDelete');
        redirect('album');
    }
    
}

/* End of file User.php */
