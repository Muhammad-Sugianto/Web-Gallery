<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{

 

    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('user_id', 'desc');
        return $this->db->get()->result();
    }   

    public function add($data)
    {
        $this->db->insert('tbl_user', $data); // Menambahkan data pengguna baru ke dalam tabel
    }

    public function get_data($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
        
    }

    public function edit($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user', $data);
    }
    

    public function delete($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_user');
    }
}
