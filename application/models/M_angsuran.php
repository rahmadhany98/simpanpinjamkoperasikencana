<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_angsuran extends CI_Model {

    //nama table
    private $table = 'transaksi';

    //field table
    public $id_transaksi;
    public $tanggal_transaksi;
    public $no_rekening;
    public $debit;
    public $kredit;
    public $kode_transaksi;
    public $user_input;
    public $tanggal_input;


    public function rules()
    {
        return [
            ['field' => 'no_rekening',
            'label' => 'No Rekening',
            'rules' => 'required'],

            ['field' => 'tanggal_transaksi',
            'label' => 'Tanggal Transaksi',
            'rules' => 'required'],

            ['field' => 'pokok',
            'label' => 'Pokok',
            'rules' => 'numeric|required|greater_than[0]'],

            ['field' => 'total',
            'label' => 'Total',
            'rules' => 'numeric|required|greater_than[0]']

        ];
    }

    public function getNumRowsAngsuran($id)
    {
        return $this->db->get_where($this->table, ["no_rekening" => $id, "kode_transaksi" => "301"])->num_rows();
    }

    public function getJumlahPinjaman($id)
    {
        return $this->db->get_where($this->table, ["no_rekening" => $id, "kode_transaksi" => "201"])->row()->kredit;
    }

    public function getSisaPinjaman($id)
    {
        $this->db->select_sum('kredit');
        $this->db->from($this->table);
        $this->db->where('no_rekening', $id);
        $this->db->where('kode_transaksi', "301");
        $query = $this->db->get();
        return $query->row()->kredit;
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["no_rekening" => $id])->row();
    }

    public function getAnggota($id)
    {
        $anggota = $this->db->get_where($this->table, ["no_rekening" => $id])->row()->id_anggota;
        return $this->db->get_where('anggota', ["id" => $anggota])->row();
    }

    public function getNumRows($id,$id2)
    {
        return $this->db->get_where($this->table, ["no_rekening" => $id, "kode_transaksi" =>$id2])->num_rows();
    }

    public function getSaldoSetoran($id)
    {
        $this->db->select_sum('kredit');
        $this->db->from($this->table);
        $this->db->where('no_rekening', $id);
        $query = $this->db->get();
        return $query->row()->kredit;
    }
    public function getSaldoPenarikan($id)
    {
        $this->db->select_sum('debit');
        $this->db->from($this->table);
        $this->db->where('no_rekening', $id);
        $query = $this->db->get();
        return $query->row()->debit;
    }

    function searchAnggota($str)
    {
        $this->db->select('no_pk as id, no_pk as text');
        $this->db->like('no_pk', $str);
        $this->db->where('status', 'Belum Lunas');
        $query = $this->db->get('pinjaman');
        return $query->result();
    }

    public function save_pokok()
    {
        $post = $this->input->post();
        $this->id_transaksi = uniqid();
        $this->tanggal_transaksi = $post["tanggal_transaksi"];
        $this->no_rekening = $post["no_rekening"];
        $this->debit = 0;
        $this->kredit = $post["pokok"];
        $this->kode_transaksi = "301";
        $this->user_input = "U001";
        $this->tanggal_input = date("Y-m-d H:i:s");
        return $this->db->insert($this->table, $this);
    }

    public function save_bunga()
    {
        $post = $this->input->post();
        $this->id_transaksi = uniqid();
        $this->tanggal_transaksi = $post["tanggal_transaksi"];
        $this->no_rekening = $post["no_rekening"];
        $this->debit = 0;
        $this->kredit = $post["bunga"];
        $this->kode_transaksi = "302";
        $this->user_input = "U001";
        $this->tanggal_input = date("Y-m-d H:i:s");
        return $this->db->insert($this->table, $this);
    }

    // public function delete($id)
    // {
    //     return $this->db->delete($this->table, array("no_rekening" => $id));
    // }

    public function lunas($id)
    {
        return $this->db->update('pinjaman', array('status' => 'Lunas'), array('no_pk' => $id));
    }

}

/* End of file M_simpanan.php */

?>