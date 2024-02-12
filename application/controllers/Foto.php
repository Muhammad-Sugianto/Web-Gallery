<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model('m_foto');
    //    $this->load->library('form_validation'); // Load library validasi form
    }

    public function index()
    {
        $data = array (
            'title' => 'Foto',
            'foto' => $this->m_foto->get_all_data(),
            'isi' => 'foto/v_foto',
        );
        $this->load->view('layout/v_wrapper_backend', $data); // Load view dengan data yang diperlukan
    }
    
    public function add() {
        // Load libraries
        $this->load->library('upload');
        $this->load->library('form_validation');
    
        // Set form validation rules
        $this->form_validation->set_rules('judul_ft', 'Judul Foto', 'required');
        $this->form_validation->set_rules('desk_ft', 'Deskripsi Foto', 'required');
        $this->form_validation->set_rules('album_id', 'Album ID', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
    
        // Check if form validation passed
        if ($this->form_validation->run() == TRUE) {
            // Upload configuration
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '10000';
    
            // Initialize upload library with configuration
            $this->upload->initialize($config);
    
            // Check if file is uploaded successfully
            if ($this->upload->do_upload('lokasi_file')) {
                // Get upload data
                $upload_data = $this->upload->data();
                // Prepare data to be inserted into database
                $data = array(
                    'judul_ft'   => $this->input->post('judul_ft'),
                    'desk_ft'      => $this->input->post('desk_ft'),
                    'tgl_unggah'   => date('Y-m-d H:i:s'),
                    'lokasi_file'  => $upload_data['file_name'],
                    'album_id'     => $this->input->post('album_id'),
                    'user_id'      => $this->input->post('user_id'),
                );
                // Add data to database
                $this->m_foto->add($data);
                // Redirect to appropriate page
                redirect('foto');
            } else {
                // File upload failed, display error message
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('layout/v_wrapper_backend', $error);
            }
        } else {
            // Form validation failed, load add view
            $data = array(
                'title' => 'Add Foto',
                'isi'   => 'foto/v_add',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }
    }
    

    


 // Update one item
public function edit($foto_id) {
    // Load necessary libraries
    $this->load->library('upload');
    $this->load->library('form_validation');
    $this->load->model('M_foto');

    // Set form validation rules
    $this->form_validation->set_rules('judul_ft', 'Judul Foto', 'required');
    $this->form_validation->set_rules('desk_ft', 'Deskripsi Foto', 'required');
    $this->form_validation->set_rules('album_id', 'Album ID', 'required');
    $this->form_validation->set_rules('user_id', 'User ID', 'required');

    // Check if form validation passed
    if ($this->form_validation->run() == TRUE) {
        // Set upload configuration
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
        $config['max_size'] = '10000';

        // Initialize upload library with the configuration
        $this->upload->initialize($config);

        // Database data
        $data = array(
            'judul_ft'   => $this->input->post('judul_ft'),
            'desk_ft'     => $this->input->post('desk_ft'),
            'tgl_unggah'   => date('Y-m-d H:i:s'),
            'album_id'     => $this->input->post('album_id'),
            'user_id'      => $this->input->post('user_id'),
        );

        // Check if the file is uploaded successfully
        if ($this->upload->do_upload('lokasi_file')) {
            $upload_data = $this->upload->data();
            $data['lokasi_file'] = $upload_data['file_name'];

            // Fetch existing data for the photo with $foto_id from the database
            $existing_data = $this->M_foto->get_data($foto_id);

            // Delete the old file
            if (!empty($existing_data->lokasi_file)) {
                $old_file_path = './assets/img/' . $existing_data->lokasi_file;
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }
            }
        }

        // Save data to the database
        $this->M_foto->edit($foto_id, $data);

        // Redirect with success message
        $this->session->set_flashdata('success_message', 'Foto berhasil diupdate.');
        redirect('foto');
    } else {
        // Form validation failed or initial load
        // Fetch existing data for the photo with $foto_id from the database
        $foto_data = $this->M_foto->get_data($foto_id);

        // Prepare data to pass to the view
        $data = array(
            'title' => 'Edit Foto',
            'foto' => $foto_data, 
            'isi'   => 'foto/v_edit',
        );

        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
}

    
    
    public function delete($foto_id = NULL)
    {
        $this->m_foto->delete($foto_id); // Mengirimkan user_id sebagai parameter
        $this->session->set_flashdata('pesan', 'Data Berhasil DiDelete');
        redirect('foto');
    }
    
}

/* End of file User.php */
