<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('m_foto');
        $this->load->model('m_like');
        $this->load->model('m_komen');
        $this->load->model('m_user');
        $this->load->model('m_album');

       

    }
    
    public function index()
    {
        
        $data = array(
            'title' => 'Home',
            'foto' => $this->m_foto->get_all_data(),
            'user' => $this->m_user->get_all_data(),
            'data_album' => $this->m_album->getDataalbum(),
            'isi' => 'v_home',

        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        
    }   

    public function profile()
    {

        $data = array(
            'title' => 'profile',
            'isi' => 'profile/v_profile',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        
    }   

    public function postingan()
    {
        $data = array(
            'title' => 'Postingan',
            'foto' => $this->m_foto->get_all_data(),
            'level' => $this->session->userdata('level'),
            'isi' => 'v_postingan',
        );
    
        // Ambil total jumlah like untuk setiap fotoid
        $total_likes_per_fotoid = array();
        foreach ($data['foto'] as $foto) {
            $total_likes_per_fotoid[$foto->foto_id] = $this->m_like->get_total_likes($foto->foto_id);
        }
    
        // Sertakan total jumlah like per fotoid dalam data yang akan dikirim ke view
        $data['total_likes_per_fotoid'] = $total_likes_per_fotoid;
    
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    // public function detail()
    // {
    //      // Ambil data foto berdasarkan $foto_id
    //      $foto = $this->m_foto->get_data($foto_id);

    //     $data = array(
    //         'title' => 'Detail ',
    //         'foto' => $this->m_foto->get_all_data(),
    //         'level' => $this->session->userdata('level'),
    //         'isLiked' => $this->isLiked($foto_id), // Pass is_liked to the view
    //         'isi' => 'v_detail',
    //     );
    //     $this->load->view('layout/v_wrapper_frontend', $data, false);
    // }

    public function detail($foto_id = null)
    {
        // Ambil data foto berdasarkan $foto_id
        $foto = $this->m_foto->get_foto_by_id($foto_id); // Menggunakan row() untuk mendapatkan objek, bukan array
        if (!$foto) {
            show_error('Foto tidak ditemukan'); // Menampilkan pesan error jika foto tidak ditemukan
            return;
        }
    
        $detail_data = $this->m_foto->detail_data($foto_id);
        $comments = $this->m_komen->get_comments_with_user_info($foto_id);
        $total_likes_per_fotoid = $this->m_like->get_total_likes($foto_id);
    
        // Kirim data foto dan rekomendasi foto ke view detail
        $data = array(
            'title' => 'Detail Foto',
            'foto' => $foto, // Kirim data foto ke view
            'comments' => $comments, // Kirim data komentar ke view
            'level' => $this->session->userdata('level'),
            'total_likes_per_fotoid' => $total_likes_per_fotoid,
            'detail_data' => $detail_data,
            'is_liked' => $this->is_liked($foto_id),
            'isi' => 'v_detail',
        );
    
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }
    
    
   
    // private function is_liked($foto_id)
    // {
    //     $user_id = $this->session->userdata('user_id'); // Sesuaikan dengan cara Anda mengelola sesi login
    //     return $this->m_like->isliked($foto_id, $user_id);
    // }

    public function add_like($foto_id)
    {
        // Lakukan verifikasi level_user atau kondisi lain yang diperlukan
        $level = $this->session->userdata('level');
        if ($level != 1 && $level != 2) {
            // Tambahkan logika atau tindakan lain jika level tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        // Lakukan penambahan like
        $user_id = $this->session->userdata('user_id'); // Sesuaikan dengan cara Anda mengelola sesi login
        $this->m_like->add_like($foto_id, $user_id);

        // Redirect kembali ke halaman foto atau halaman lain yang sesuai
        redirect('home' . $foto_id);
    }

    // Fungsi untuk memeriksa apakah foto sudah dilike oleh pengguna
    // private function is_liked($foto_id)
    // {
    //     $user_id = $this->session->userdata('user_id'); // Sesuaikan dengan cara Anda mengelola sesi login
    //     return $this->m_like->isLiked($foto_id, $user_id);
    // }

    public function remove_like($foto_id)
    {
        // Lakukan verifikasi level atau kondisi lain yang diperlukan
        $level = $this->session->userdata('level');
        if ($level != 1 && $level != 2) {
            // Tambahkan logika atau tindakan lain jika level tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        // Lakukan penghapusan like
        $user_id = $this->session->userdata('user_id'); // Sesuaikan dengan cara Anda mengelola sesi login
        $this->m_like->remove_like($foto_id, $user_id);

        // Redirect kembali ke halaman foto atau halaman lain yang sesuai
        redirect('home' . $foto_id); // Ganti dengan URL yang sesuai
    }




    public function add_comment()
    {
        $foto_id = $this->input->post('foto_id');
        $isi_komen = $this->input->post('komen'); // Ubah menjadi 'komen' sesuai dengan atribut name pada textarea
        
        // Anda dapat menambahkan validasi input di sini
        
        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'foto_id' => $foto_id,
            'isi_komen' => $isi_komen,
            'tgl_komen' => date('Y-m-d H:i:s')
        );
        
        $this->m_komen->add_comment($data);
        
        redirect('foto/detail/' . $foto_id);
    }
    
    
    
    public function like_photo()
    {
        // Lakukan verifikasi level atau kondisi lain yang diperlukan
        $level = $this->session->userdata('level');
        if ($level != 1 && $level != 2) {
            // Tambahkan logika atau tindakan lain jika level_user tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }
    
        // Ambil foto_id dari form atau sesuai dengan cara Anda mengelola data foto di halaman postingan
        $foto_id = $this->input->post('foto_id'); // Sesuaikan dengan nama input foto_id di form
    
        // Panggil model untuk menambahkan like
        $this->m_like->add_like($foto_id, $this->session->userdata('user_id'));
    
        // Redirect kembali ke halaman postingan
        redirect('home/postingan');
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
        redirect('home/postingan');
    }
    
    private function is_liked($foto_id)
    {
        $user_id = $this->session->userdata('user_id'); // Sesuaikan dengan cara Anda mengelola sesi login
        return $this->m_like->is_liked($foto_id, $user_id);
    }

   
}