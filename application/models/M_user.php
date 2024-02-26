<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('user_id', 'desc');
        return $this->db->get()->result();
    }   

    // public function get_user_by_id($user_id) {
    //     $this->db->select('username');
    //     $this->db->where('user_id', $user_id);
    //     return $this->db->get('tbl_user')->row(); // Ganti 'nama_tabel_user' dengan nama tabel yang sesuai di database Anda
    // }
    

    public function add($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    public function get_data($user_id) 
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
    }

    public function get_user_by_id($user_id)
    {
        return $this->db->get_where('tbl_user', array('user_id' => $user_id))->row();
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

    public function get_user_with_foto($user_id)
    {
        $this->db->select('u.*, f.*'); // Select all columns from both tables
        $this->db->from('tbl_user u');
        $this->db->join('tbl_foto f', 'u.user_id = f.user_id', 'left');
        $this->db->where('u.user_id', $user_id);
        return $this->db->get()->result();
    }

    public function get_user_by_email($email)
    {
        return $this->db->where('email', $email)->get('tbl_user')->row();
    }
}
