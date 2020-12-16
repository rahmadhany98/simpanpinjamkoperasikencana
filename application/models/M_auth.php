<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {


    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    
    public function getById()
    {
        $post = $this->input->post();
        return $this->db->get_where('users', ["username" => $post["username"], "password" => md5($post["password"])])->row();
    }

    public function ceklogin()
    {
        $post = $this->input->post();
        return $this->db->get_where('users', ["username" => $post["username"], "password" => md5($post["password"])])->num_rows();
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->jenis_identitas = $post["jenis_identitas"];
        $this->no_identitas = $post["no_identitas"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        return $this->db->update($this->table, $this, array('id' => $post['id']));
    }

}

/* End of file M_anggota.php */

?>