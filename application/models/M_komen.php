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
}
