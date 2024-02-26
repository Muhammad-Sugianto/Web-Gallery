<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_album extends CI_Model 
{
    
    public function get_all_data()
    {
        
        $this->db->order_by('album_id', 'desc');
        return $this->db->get('tbl_album')->result(); // Mengambil semua data album dari tabel
    }

    // public function get_data($album_id)
    // {
    //     return $this->db->get_where('tbl_album', array('album_id' => $album_id))->row_array();
    // }

    public function add($data)
    {
        $this->db->insert('tbl_album', $data); // Menambahkan data pengguna baru ke dalam tabel
    }

    public function edit($album_id, $data)
    {
        $this->db->where('album_id', $album_id);
        $this->db->update('tbl_album', $data);
    }

    public function get_album_by_id($album_id)
    {
     // Fetch user data based on user_id
      return $this->db->get_where('tbl_album', array('album_id' => $album_id))->row();
    }

    public function getDataalbum()
    {
        $this->db->select('tbl_album.*, tbl_user.username');
        $this->db->from('tbl_album');
        $this->db->join('tbl_user', 'tbl_album.user_id = tbl_user.user_id');
        $query = $this->db->get();
        return $query->result();
    }


    public function delete($album_id)
    {
        $this->db->where('album_id', $album_id);
        $this->db->delete('tbl_album');
    }
}
