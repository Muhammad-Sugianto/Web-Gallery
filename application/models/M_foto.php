<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_foto extends CI_Model 
{

 
    public function get_all_data()
    {
        // Gabungkan tabel foto dengan tabel pengguna untuk mendapatkan informasi pengguna (username)
        $this->db->select('tbl_foto.*, tbl_user.username');
        $this->db->from('tbl_foto');
        $this->db->join('tbl_user', 'tbl_foto.user_id = tbl_user.user_id', 'left');
        $this->db->order_by('tbl_foto.foto_id', 'desc');
        return $this->db->get()->result(); // Mengambil semua data foto dari tabel
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

    public function get_foto($foto_id)
    {
        return $this->db->get_where('tbl_foto', array('foto_id' => $foto_id))->row(); // Mengambil data foto berdasarkan foto_id
    }

    public function delete($foto_id)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->delete('tbl_foto'); // Menghapus data foto berdasarkan foto_id
    }
}
?>
