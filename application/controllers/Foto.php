<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Foto extends CI_Controller {
        
        public function __construct()
        {
        parent::__construct();
        $this->load->model('m_foto');
        $this->load->model('m_user');
        $this->load->model('m_like'); // Tambahkan load model m_like
        $this->load->model('m_komen'); // Tambahkan load model m_komen
        $this->load->model('m_album'); // Tambahkan load model m_komen
        }

        public function index()
        {
            // Mengambil semua data foto dari model
            $data['title'] = 'Foto';
            $data['foto'] = $this->m_foto->get_all_data();
            $data['isi'] = 'foto/v_foto';

            // Memanggil view dengan data yang diperlukan
            $this->load->view('layout/v_wrapper_backend', $data);
        }
        
        public function add() {
            // Validasi form
            $this->load->library('upload');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul_ft', 'Judul Foto', 'required');
            $this->form_validation->set_rules('desk_ft', 'Deskripsi Foto', 'required');
            $this->form_validation->set_rules('album_id', 'Album ID', 'required');
        
            // Ambil user_id dari sesi login
            $user_id = $this->session->userdata('user_id');
        
            if ($this->form_validation->run() == TRUE) {
                // Konfigurasi upload
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '10000';
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('lokasi_file')) {
                    $upload_data = $this->upload->data();
                    $data = array(
                        'judul_ft'   => $this->input->post('judul_ft'),
                        'desk_ft'    => $this->input->post('desk_ft'),
                        'tgl_unggah' => date('Y-m-d H:i:s'), // Tanggal saat ini
                        'lokasi_file'=> $upload_data['file_name'],
                        'album_id'   => $this->input->post('album_id'),
                        'user_id'    => $user_id, // Gunakan user_id dari sesi login
                    );
                    $this->m_foto->add($data);
                    redirect('foto');
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('layout/v_wrapper_backend', $error);
                }
            } else {
                $data = array(
                    'title' => 'Add Foto',
                    'album' => $this->m_album->get_all_data(),
                    'isi'   => 'foto/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            }
        }
        

        public function edit($foto_id) {
            $this->load->library('upload');
            $this->load->library('form_validation');
            $this->load->model('m_foto');
            $this->form_validation->set_rules('judul_ft', 'Judul Foto', 'required');
            $this->form_validation->set_rules('desk_ft', 'Deskripsi Foto', 'required');
            $this->form_validation->set_rules('album_id', 'Album ID', 'required');
            $this->form_validation->set_rules('user_id', 'User ID', 'required');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
                $config['max_size'] = '10000';
                $this->upload->initialize($config);

                $data = array(
                    'judul_ft'   => $this->input->post('judul_ft'),
                    'desk_ft'    => $this->input->post('desk_ft'),
                    'tgl_unggah' => date('Y-m-d H:i:s'),
                    'album_id'   => $this->input->post('album_id'),
                    'user_id'    => $this->input->post('user_id'),
                );

                if ($this->upload->do_upload('lokasi_file')) {
                    $upload_data = $this->upload->data();
                    $data['lokasi_file'] = $upload_data['file_name'];
                    $existing_data = $this->m_foto->get_foto($foto_id);

                    if (!empty($existing_data->lokasi_file)) {
                        $old_file_path = './assets/img/' . $existing_data->lokasi_file;
                        if (file_exists($old_file_path)) {
                            unlink($old_file_path);
                        }
                    }
                }

                $this->m_foto->edit($foto_id, $data);
                $this->session->set_flashdata('success_message', 'Foto berhasil diupdate.');
                redirect('foto');
            } else {
                $foto_data = $this->m_foto->get_foto($foto_id);

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
            $this->m_foto->delete($foto_id);
            $this->session->set_flashdata('pesan', 'Data Berhasil DiDelete');
            redirect('foto');
        }
        


        // public function detail($foto_id)
        // {
        //     // Mengambil data foto dari model
        //     $data['foto'] = $this->m_foto->get_foto($foto_id);
        
        //     // Mengambil total like dan comment dari model
        //     $data['total_like'] = $this->m_foto->get_total_like($foto_id);
        //     $data['total_comment'] = $this->m_foto->get_total_comment($foto_id);
        
        //     // Menampilkan view detail foto dengan data yang diperlukan
        //     $this->load->view('v_detail_postingan', $data);
        // }
        
        


       // Di dalam fungsi detail() pada controller Foto
public function detail($foto_id = null)
{
    // Ambil data foto berdasarkan $foto_id
    $foto = $this->m_foto->get_foto($foto_id);
    $comments = $this->m_komen->get_comments_with_user_info($foto_id);
    if (!$foto) {
        // Tangani jika foto tidak ditemukan
        // Misalnya, tampilkan pesan error atau redirect ke halaman lain
        redirect('halaman_not_found');
    }

    // Ambil informasi pengguna yang mengunggah foto
    $uploader = $this->m_user->get_user_by_id($foto->user_id);
    $total_likes_per_fotoid = $this->m_like->get_total_likes($foto_id);

    // Kirim data foto, pengguna yang mengunggah, dan profil ke view
    $data = array(
        'title' => 'Detail Foto',
        'level' => $this->session->userdata('level'),
        'is_liked' => $this->is_liked($foto_id),
        'comments' => $comments,
        'total_likes_per_fotoid' => $total_likes_per_fotoid,
        'foto' => $foto,
        'uploader' => $uploader, // Informasi pengguna yang mengunggah
        // ...
    );

    // $total_likes_per_fotoid = array();
    //     foreach ($data['foto'] as $foto) {
    //         $total_likes_per_fotoid[$foto->foto_id] = $this->m_like->get_total_likes($foto->foto_id);
    //     }

    // // // Ambil total jumlah komentar untuk setiap foto_id
    // // $total_comments_per_fotoid = array();
    // // foreach ($data['foto'] as $foto) {
    // //     $total_comments_per_fotoid[$foto->foto_id] = $this->m_komentar->get_total_comments($foto->foto_id);
    // // }

    // $data['total_likes_per_fotoid'] = $total_likes_per_fotoid;
    // // $data['total_comments_per_fotoid'] = $total_comments_per_fotoid;

    
    $this->load->view('v_detail_postingan', $data, false);
}

        
    

        public function add_like($foto_id)
        {
            // Lakukan verifikasi level_user atau kondisi lain yang diperlukan
            // $level_user = $this->session->userdata('level_user');
            // if ($level_user != 1 && $level_user != 2) {
            //     // Tambahkan logika atau tindakan lain jika level_user tidak memenuhi syarat
            //     redirect('login'); // Ganti dengan URL yang sesuai
            //     return;
            // }

            // Lakukan penambahan like
            $user_id = $this->session->userdata('user_id'); // Sesuaikan dengan cara Anda mengelola sesi login
            $this->m_like->add_like($foto_id, $user_id);

            // Redirect kembali ke halaman foto atau halaman lain yang sesuai
            redirect('foto/detail/' . $foto_id);
        }

        // Fungsi untuk memeriksa apakah foto sudah dilike oleh pengguna
        private function is_liked($foto_id)
        {
            $user_id = $this->session->userdata('user_id'); // Sesuaikan dengan cara Anda mengelola sesi login
            return $this->m_like->is_liked($foto_id, $user_id);
        }

        public function remove_like($foto_id)
        {
            // Lakukan verifikasi level_user atau kondisi lain yang diperlukan
            // $level_user = $this->session->userdata('level_user');
            // if ($level_user != 1 && $level_user != 2) {
            //     // Tambahkan logika atau tindakan lain jika level_user tidak memenuhi syarat
            //     redirect('login'); // Ganti dengan URL yang sesuai
            //     return;
            // }

            // Lakukan penghapusan like
            $user_id = $this->session->userdata('user_id'); // Sesuaikan dengan cara Anda mengelola sesi login
            $this->m_like->remove_like($foto_id, $user_id);

            // Redirect kembali ke halaman foto atau halaman lain yang sesuai
            redirect('foto/detail/' . $foto_id); // Ganti dengan URL yang sesuai
        }

        public function add_comment()
        {
            $foto_id = $this->input->post('foto_id');
            $komentar = $this->input->post('komentar');
            
            // Validasi apakah foto_id tidak kosong dan komentar tidak kosong
            if (!empty($foto_id) && !empty($komentar)) {
                $data = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'foto_id' => $foto_id,
                    'isi_komen' => $komentar,
                    'tgl_komen' => date('Y-m-d H:i:s')
                );
        
                // Panggil metode add_comment() dari model m_komen
                $this->m_komen->add($data);
        
                redirect('foto/detail/' . $foto_id);
            } else {
                // Handle kesalahan jika foto_id kosong atau komentar kosong
                // Misalnya, tampilkan pesan kesalahan atau redirect ke halaman lain
                // Anda dapat menambahkan logika penanganan kesalahan sesuai kebutuhan aplikasi Anda
                redirect('halaman_not_found'); // Contoh pengalihan ke halaman error
            }
        }
        
        
        public function like_photo()
        {
            // Lakukan verifikasi level_user atau kondisi lain yang diperlukan
            $level_user = $this->session->userdata('level_user');
            if ($level_user != 1 && $level_user != 2) {
                // Tambahkan logika atau tindakan lain jika level_user tidak memenuhi syarat
                redirect('login'); // Ganti dengan URL yang sesuai
                return;
            }
        
            // Ambil foto_id dari form atau sesuai dengan cara Anda mengelola data foto di halaman postingan
            $foto_id = $this->input->post('foto_id'); // Sesuaikan dengan nama input foto_id di form
        
            // Panggil model untuk menambahkan like
            $this->m_like->add_like($foto_id, $this->session->userdata('user_id'));
        
            // Redirect kembali ke halaman postingan
            redirect('foto/detail/' . $foto_id);
        }
        
        public function dislike_photo()
        {
            // Lakukan verifikasi level_user atau kondisi lain yang diperlukan
            $level_user = $this->session->userdata('level_user');
            if ($level_user != 1 && $level_user != 2) {
                // Tambahkan logika atau tindakan lain jika level_user tidak memenuhi syarat
                redirect('login'); // Ganti dengan URL yang sesuai
                return;
            }
        
            // Ambil foto_id dari form atau sesuai dengan cara Anda mengelola data foto di halaman postingan
            $foto_id = $this->input->post('foto_id'); // Sesuaikan dengan nama input foto_id di form
        
            // Panggil model untuk menghapus like
            $this->m_like->remove_like($foto_id, $this->session->userdata('user_id'));
        
            // Redirect kembali ke halaman postingan
            redirect('foto/detail/' . $foto_id);
        }
    }
    
    ?>
