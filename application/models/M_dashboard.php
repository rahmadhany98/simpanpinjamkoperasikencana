<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function getCountAnggota()
    {
        return $this->db->count_all('anggota');
    }

    public function getCountSetoran($id = null)
    {
        $this->db->select_sum('kredit');
        $this->db->where('MONTH(tanggal_transaksi)', ($id != null) ? $id : date('m'));
        $this->db->where('YEAR(tanggal_transaksi)', date('Y'));
        $this->db->where('kode_transaksi', '101');
        return $this->db->get('transaksi')->row();
    }

    public function getCountPenarikan($id = null)
    {
        $this->db->select_sum('debit');
        $this->db->where('MONTH(tanggal_transaksi)', ($id != null) ? $id : date('m'));
        $this->db->where('YEAR(tanggal_transaksi)', date('Y'));
        $this->db->where('kode_transaksi', '102');
        return $this->db->get('transaksi')->row();
    }

    public function getCountRealisasi($id = null)
    {
        $this->db->select_sum('kredit');
        $this->db->where('MONTH(tanggal_transaksi)', ($id != null) ? $id : date('m'));
        $this->db->where('YEAR(tanggal_transaksi)', date('Y'));
        $this->db->where('kode_transaksi', '201');
        return $this->db->get('transaksi')->row();
    }

    public function getCountAngsuran($id = null)
    {
        $this->db->select_sum('kredit');
        $this->db->where('MONTH(tanggal_transaksi)', ($id != null) ? $id : date('m'));
        $this->db->where('YEAR(tanggal_transaksi)', date('Y'));
        $this->db->group_start();
        $this->db->where('kode_transaksi =', '301');
        $this->db->or_where('kode_transaksi =', '302');
        $this->db->group_end();
        return $this->db->get('transaksi')->row();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->jenis_identitas = $post["jenis_identitas"];
        $this->no_identitas = $post["no_identitas"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        return $this->db->insert($this->table, $this);
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
