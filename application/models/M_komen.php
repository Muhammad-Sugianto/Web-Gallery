<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_komen extends CI_Model 
{
    public function get_all_data()
    {
        $this->db->order_by('komen_id', 'desc');
        return $this->db->get('tbl_komen')->result(); // Mengambil semua data pengguna dari tabel
    }

    public function add($data)
    {
        $this->db->insert('tbl_komen', $data); // Menambahkan data pengguna baru ke dalam tabel
    }

    public function edit($komen_id, $data)
    {
        $this->db->where('komen_id', $komen_id);
        $this->db->update('tbl_komen', $data);
    }

    public function delete($komen_id)
    {
        $this->db->where('komen_id', $komen_id);
        $this->db->delete('tbl_komen');
    }

    public function add_comment($data)
    {
        $this->db->insert('tbl_komen', $data); // Menambahkan komentar baru ke dalam tabel
    }

    public function get_comments_with_user_info($foto_id)
    {
        $this->db->select('k.*, u.nama_lengkap, u.username, u.profil');
        $this->db->from('tbl_komen k');
        $this->db->join('tbl_user u', 'u.user_id = k.user_id');
        $this->db->where('k.foto_id', $foto_id);
        $this->db->order_by('k.tgl_komen', 'asc');
        return $this->db->get()->result();
    }
}
?>
