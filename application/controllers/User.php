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

     // Add a new item
public function add()
{
    // Load form validation library
    $this->load->library('upload');
    $this->load->library('form_validation');

    // Set form validation rules
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    // $this->form_validation->set_rules('level', 'Level', 'required');

    if ($this->form_validation->run() == TRUE) {
        // Set upload configuration
        $config['upload_path'] = './assets/profil/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
        $config['max_size'] = '10000';

        // Initialize upload library with the configuration
        $this->upload->initialize($config);

        // Check if the file is uploaded successfully
        if ($this->upload->do_upload('profil')) {
            $upload_data = $this->upload->data();

            // Hash the password
            // $hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            // Database data
            $data = array(
                'username'      => $this->input->post('username'),
                'password'      => $this->input->post('password'),
                'email'         => $this->input->post('email'),
                'profil'   => $upload_data['file_name'],
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'alamat'        => $this->input->post('alamat'),
                // 'level'         => $this->input->post('level'),
            );

            // Save data to the database
            $this->m_user->add($data); // Assuming you have an "add" method in your model

            // Redirect or show success message
            redirect('user'); // Replace "your_controller/success" with your actual success page
        } else {
            // File upload failed
            $error = array('error' => $this->upload->display_errors());
            $data = array(
                'title' => 'Add User',
                'user'  => $this->m_user->get_all_data(),
                'isi'   => 'user/v_add',
                'error' => $error, // Pass the error message to the view
            );
            $this->load->view('layout/v_wrapper_backend', $data); // Replace "your_view" with your actual view for displaying errors
        }
    } else {
        $data = array(
            'title' => 'Add User',
            'user'  => $this->m_user->get_all_data(),
            'isi'   => 'user/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
}


    
    
    // public function file_check($str)
    // {
    //     $allowed_mime_types = array('image/gif', 'image/jpeg', 'image/png', 'image/jpg');
    //     $mime = $_FILES['profil']['type'];
    //     if (isset($_FILES['profil']['name']) && $_FILES['profil']['name'] != "") {
    //         if (in_array($mime, $allowed_mime_types)) {
    //             return TRUE;
    //         } else {
    //             $this->form_validation->set_message('file_check', 'Please select only GIF, JPG, JPEG or PNG file for profil.');
    //             return FALSE;
    //         }
    //     } else {
    //         $this->form_validation->set_message('file_check', 'Please choose a file for profil.');
    //         return FALSE;
    //     }
    // }
    
    

    
    
    public function edit($user_id)
    {
        // Load form validation library
        $this->load->library('upload');
        $this->load->library('form_validation');
    
        // Set form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    
        if ($this->form_validation->run() == TRUE) {
            // Set upload configuration
            $config['upload_path'] = './assets/profil/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';
    
            // Initialize upload library with the configuration
            $this->upload->initialize($config);
    
            // Check if the file is uploaded successfully
            if ($this->upload->do_upload('profil')) {
                $upload_data = $this->upload->data();
    
                // Database data
                $data = array(
                    'username'      => $this->input->post('username'),
                    'email'         => $this->input->post('email'),
                    'profil'   => $upload_data['file_name'],
                    'nama_lengkap'  => $this->input->post('nama_lengkap'),
                    'alamat'        => $this->input->post('alamat'),
                );
    
                // Update data in the database
                $this->m_user->edit($user_id, $data); // Menggunakan metode edit() dari model M_user
    
                // Redirect or show success message
                redirect('user'); // Replace "your_controller/success" with your actual success page
            } else {
                // File upload failed
                $error = array('error' => $this->upload->display_errors());
                $data = array(
                    'title' => 'Edit User',
                    'user'  => $this->m_user->get_user_by_id($user_id), // Menggunakan metode get_user_by_id() dari model M_user
                    'isi'   => 'user/v_edit',
                    'error' => $error, // Pass the error message to the view
                );
                $this->load->view('layout/v_wrapper_backend', $data); // Replace "your_view" with your actual view for displaying errors
            }
        } else {
            $data = array(
                'title' => 'Edit User',
                'user'  => $this->m_user->get_user_by_id($user_id), // Menggunakan metode get_user_by_id() dari model M_user
                'isi'   => 'user/v_edit',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
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
