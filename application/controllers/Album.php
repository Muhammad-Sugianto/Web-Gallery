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

   // Add a new item
   public function add()
   {
       // Load form validation library
       $this->load->library('form_validation');
   
       // Set form validation rules
       $this->form_validation->set_rules('album_id', 'Album id', 'required');
       $this->form_validation->set_rules('nama_album', 'Nama album', 'required');
       $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
       $this->form_validation->set_rules('tgl_buat', 'Tgl buat', 'required');
       $this->form_validation->set_rules('user_id', 'User_id', 'required');
   
       if ($this->form_validation->run() == TRUE) {
           $data = array(
               'album_id'         =>$this->input->post('album_id'),
               'nama_album'      =>$this->input->post('nama_album'),
               'deskripsi'            =>$this->input->post('deskripsi'),
               'tgl_buat'        =>$this->input->post('tgl_buat'),
               'user_id'        =>$this->input->post('user_id'),
       
           );
   
           $this->m_album->add($data);
           redirect('album');
       }
   
       $data = array(
           'title' => 'Add Album',
           'album'  => $this->m_album->get_all_data(),
           'isi'   => 'album/v_add',
       );
       $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }
    
 

   public function edit($album_id = NULL)
   {
       $this->form_validation->set_rules('nama_album', 'Nama album', 'required');
       $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
       $this->form_validation->set_rules('tgl_buat', 'Tgl buat', 'required');
       $this->form_validation->set_rules('user_id', 'User id', 'required');
   
       if ($this->form_validation->run() == TRUE) {
           $data = array(
               'album_id'=> $album_id,
               'nama_album'=>$this->input->post('nama_album'),
               'deskripsi'=>$this->input->post('deskripsi'),
               'tgl_buat'=> $this->input->post('tgl_buat'),
               'user_id'=>$this->input->post('user_id'),
           );
   
           $this->m_album->edit($album_id, $data);
           redirect('album');
       }
   
       // Ambil data album dari model
       $album = $this->m_album->get_album_by_id($album_id);
   
       $data = array(
           'title'    => 'Edit album',
           'album'    => $album, // Pass album data to the view
           'isi'      => 'album/v_edit',
       );
   
       $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }
   
    

    
    
    public function delete($album_id = NULL)
    {
        $this->m_album->delete($album_id); // Mengirimkan user_id sebagai parameter
        $this->session->set_flashdata('pesan', 'Data Berhasil DiDelete');
        redirect('album');
    }
    
}

/* End of file User.php */
