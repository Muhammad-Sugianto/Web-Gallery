<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_like extends CI_Model 
{
    public function get_all_data()
    {
        $this->db->order_by('like_id', 'desc');
        return $this->db->get('tbl_like')->result(); // Mengambil semua data pengguna dari tabel
    }

    public function add($data)
    {
        $this->db->insert('tbl_like', $data); // Menambahkan data pengguna baru ke dalam tabel
    }

    public function edit($like_id, $data)
    {
        $this->db->where('like_id', $like_id);
        $this->db->update('tbl_like', $data);
    }

    public function delete($like_id)
    {
        $this->db->where('like_id', $like_id);
        $this->db->delete('tbl_like');
    }

    //like
    public function add_like($foto_id, $user_id)
    {
        $data = array(
            'foto_id' => $foto_id,
            'user_id' => $user_id,
            'tgl_like' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tbl_like', $data);
        return $this->db->insert_id();
    }

    public function remove_like($foto_id, $user_id)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_like');
    }
    
    public function is_liked($foto_id, $user_id)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_like');

        return $query->num_rows() > 0;
    }

    public function get_total_likes_all_photos()
    {
        $this->db->select('COUNT(*) as total_likes');
        $this->db->from('tbl_like');
        $query = $this->db->get();
        $result = $query->row();

        // Mengembalikan total jumlah like dari semua foto
        return $result->total_likes;
    }

    public function get_total_likes($foto_id)
    {
        $this->db->select('COUNT(*) as total_likes_id');
        $this->db->from('tbl_like');
        $this->db->where('foto_id', $foto_id);
        $query = $this->db->get();
        $result = $query->row();

        // Mengembalikan total jumlah like
        return $result->total_likes_id;
    }

    
}
