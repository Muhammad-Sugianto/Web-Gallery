<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
    public function login_user($username, $password) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function registrasi_user($data) {
        // Insert data user ke dalam tabel
        $this->db->insert('tbl_user', $data);
    }
}
