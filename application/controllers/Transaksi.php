<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi', 'm_transaksi');
        $this->load->library('form_validation');
    }


    public function simpanan()
    {
        $data['content'] = 'TransaksiSimpanan';
        $data['header'] = 'Transaksi Simpanan';
        $data['js'] = 'TransaksiSimpanan.php';
        $this->load->view('template', $data);
    }


    public function hitung_saldo()
    {
        $id = $this->input->post('no_rekening');
        $checkSetoran = $this->m_transaksi->getNumRows($id, '101');
        $checkPenarikan = $this->m_transaksi->getNumRows($id, '102');
        if ($checkSetoran > 0 && $checkPenarikan > 0) {
            $setoran = $this->m_transaksi->getSaldoSetoran($id);
            $penarikan = $this->m_transaksi->getSaldoPenarikan($id);
            echo $setoran - $penarikan;
        }
        if ($checkSetoran > 0 && $checkPenarikan == 0) {
            $setoran = $this->m_transaksi->getSaldoSetoran($id);
            echo $setoran;
        }
        if ($checkSetoran == 0) {
            echo 0;
        }
    }
    // public function add()
    // {
    //     $data['content'] = 'AddSimpanan';
    //     $data['header'] = 'Tambah Simpanan';
    //     $data['js'] = 'AddSimpanan.php';
    //     $this->load->view('template', $data);
    // }

    function selectsearch()
    {
        $q = $this->input->get('q');
        echo json_encode($this->m_transaksi->searchAnggota($q));
    }

    public function save_simpanan()
    {

        $transaksi = $this->m_transaksi;
        $validation = $this->form_validation;
        $validation->set_rules($transaksi->rules());
        if ($validation->run()) {
            $transaksi->save_simpanan();
            $this->session->set_flashdata('success', 'Data barhasil disimpan');
            redirect(base_url('Transaksi/simpanan'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil disimpan');
            redirect(base_url('Transaksi/simpanan'));
        }
    }

    // public function delete($id=null)
    // {
    //     if (!isset($id)) show_404();

    //     if ($this->m_simpanan->delete($id)) {
    //         $this->session->set_flashdata('delete', 'Data barhasil dihapus');
    //         redirect(base_url('Simpanan/'));
    //     }
    // }

    // public function edit($id = null)
    // {
    //     $data['content'] = 'EditSimpanan';
    //     $data['header'] = 'Edit Simpanan';
    //     $data['js'] = 'EditSimpanan.php';
    //     $data['simpanan'] = $this->m_simpanan->getById($id);
    //     $data['anggota'] = $this->m_simpanan->getAnggota($id);
    //     if (!$data['simpanan']) show_404();
    //     $this->load->view('template', $data);
    // }

    // public function update()
    // {
    //     $simpanan = $this->m_simpanan;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($simpanan->rules());
    //     $no_rekening = $this->input->post('no_rekening');
    //     $id = $this->input->post('id');
    //     $check = $simpanan->getNumRows($no_rekening);
    //     if ($validation->run()) {
    //         if($no_rekening == $id) 
    //         {
    //         $simpanan->update();
    //         $this->session->set_flashdata('success', 'Data barhasil Diubah');
    //         redirect(base_url('Simpanan/'));
    //         }
    //         if($check > 0) {
    //             $this->session->set_flashdata('danger', 'No Rekening Sudah Ada');
    //             redirect(base_url('Simpanan/'));
    //         }
    //         $simpanan->update();
    //         $this->session->set_flashdata('success', 'Data barhasil Diubah');
    //         redirect(base_url('Simpanan/'));
    //     }else {
    //         $this->session->set_flashdata('error', $validation->error_array());
    //         $this->session->set_flashdata('danger', 'Data tidak barhasil Diubah');
    //         redirect(base_url('Simpanan/'));
    //     }
    // }

}

/* End of file Simpanan.php */
