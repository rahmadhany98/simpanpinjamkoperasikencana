<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

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

            ['field' => 'saldo_akhir',
            'label' => 'Saldo Akhir',
            'rules' => 'numeric|required|greater_than[0]'],

            ['field' => 'transaksi',
            'label' => 'Transaksi',
            'rules' => 'numeric|required|greater_than[0]']

        ];
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
        $this->db->select('no_rekening as id, no_rekening as text');
        $this->db->like('no_rekening', $str);
        $query = $this->db->get('simpanan');
        return $query->result();
    }

    public function save_simpanan()
    {
        $post = $this->input->post();
        $this->id_transaksi = uniqid();
        $this->tanggal_transaksi = $post["tanggal_transaksi"];
        $this->no_rekening = $post["no_rekening"];
        $this->kode_transaksi = $post["kode_transaksi"];
        if($this->kode_transaksi == "101") {
            $this->kredit = $post["transaksi"];
            $this->debit = 0;
        }elseif($this->kode_transaksi == "102") {
            $this->debit = $post["transaksi"];
            $this->kredit = 0;
        }
        $this->user_input = "U001";
        $this->tanggal_input = date("Y-m-d H:i:s");
        return $this->db->insert($this->table, $this);
    }

    public function getLastRecord()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('kode_transaksi', '101');
        $this->db->or_where('kode_transaksi', '102');
        $this->db->order_by('tanggal_input', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    // public function delete($id)
    // {
    //     return $this->db->delete($this->table, array("no_rekening" => $id));
    // }

    // public function update()
    // {
    //     $post = $this->input->post();
    //     $this->no_rekening = $post["no_rekening"];
    //     $this->id_anggota = $post["id_anggota"];
    //     $this->jenis_simpanan = $post["jenis_simpanan"];
    //     return $this->db->update($this->table, $this, array('no_rekening' => $post['id']));
    // }

}

/* End of file M_simpanan.php */

?>