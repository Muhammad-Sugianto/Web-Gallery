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
}
