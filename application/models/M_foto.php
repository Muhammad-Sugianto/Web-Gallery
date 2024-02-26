<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_foto extends CI_Model 
{

    public function get_all_data()
    {
        // Gabungkan tabel foto dengan tabel pengguna untuk mendapatkan informasi pengguna (username)
        $this->db->select('tbl_foto.*, tbl_user.username, tbl_user.profil');
        $this->db->select('COUNT(tbl_like.foto_id) AS total_like');
        $this->db->select('COUNT(tbl_komen.foto_id) AS total_comment');
        $this->db->from('tbl_foto');
        $this->db->join('tbl_user', 'tbl_foto.user_id = tbl_user.user_id', 'left');
        $this->db->join('tbl_like', 'tbl_foto.foto_id = tbl_like.foto_id', 'left');
        $this->db->join('tbl_komen', 'tbl_foto.foto_id = tbl_komen.foto_id', 'left');
        $this->db->group_by('tbl_foto.foto_id');
        $this->db->order_by('tbl_foto.foto_id', 'desc');
        return $this->db->get()->result();
    }
    
    

    public function add($data)
    {
        $this->db->insert('tbl_foto', $data); // Menambahkan data foto baru ke dalam tabel
    }

    public function edit($foto_id, $data)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->update('tbl_foto', $data); // Mengedit data foto berdasarkan foto_id
    }

    public function get_data_album($foto_id){
        $this->db->select('*');
        $this->db->from('tbl_foto');
        $this->db->join('tbl_album', 'tbl_album.album_id = tbl_foto.album_id', 'left');
        $this->db->where('foto_id', $foto_id);
        return $this->db->get()->row();
    }

    public function get_foto($foto_id)
    {
        // Mengambil data foto berdasarkan foto_id dan join dengan tbl_user
        $this->db->select('tbl_foto.*, tbl_user.profil');
        $this->db->from('tbl_foto');
        $this->db->join('tbl_user', 'tbl_foto.user_id = tbl_user.user_id', 'left');
        $this->db->where('tbl_foto.foto_id', $foto_id);
        return $this->db->get()->row();
    }
    
    

    // public function get_foto($foto_id)
    // {
    //     $this->db->select('f.*, u.username, u.nama_lengkap, u.profil');
    //     $this->db->from('tbl_foto f');
    //     $this->db->join('tbl_user u', 'u.user_id = f.user_id');
    //     // $this->db->join('tbl_album a', 'a.album_id = f.album_id');
    //     $this->db->where('f.foto_id', $foto_id);
    //     return $this->db->get()->row();
    // }

    public function delete($foto_id)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->delete('tbl_foto'); // Menghapus data foto berdasarkan foto_id
    }

    // Fungsi untuk mengambil total like berdasarkan foto_id
    public function get_total_like($foto_id)
    {
        $this->db->select('COUNT(*) as total_like');
        $this->db->from('tbl_like');
        $this->db->where('foto_id', $foto_id);
        $query = $this->db->get();
        return $query->row()->total_like;
    }

    // Fungsi untuk mengambil total comment berdasarkan foto_id
    public function get_total_comment($foto_id)
    {
        $this->db->select('COUNT(*) as total_comment');
        $this->db->from('tbl_komen');
        $this->db->where('foto_id', $foto_id);
        $query = $this->db->get();
        return $query->row()->total_comment;
    }

    // Fungsi untuk menambah like
    public function like_photo($foto_id)
    {
        $data = array(
            'foto_id' => $foto_id,
            // tambahkan data user_id jika diperlukan
        );
        $this->db->insert('tbl_like', $data);
    }

    // Fungsi untuk menghapus like
    public function unlike_photo($foto_id)
    {
        $this->db->where('foto_id', $foto_id);
        // tambahkan kondisi jika perlu bergantung pada user_id
        $this->db->delete('tbl_like');
    }

}
?>
