<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model 
{
    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username', $username);
        $user = $this->db->get('karyawan')->row_array();

        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return data pengguna jika login berhasil
        } else {
            return false; // Return false jika gagal
        }
    }
}

// <?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class m_login extends CI_Model 
// {
//     public function cek_login()
//     {
//         $username = $this->input->post('username');
//         $password = $this->input->post('password');

//         return $this->db->get_where('karyawan', array('username' => $username, 'password' => $password))->row_array();
//     }

// };