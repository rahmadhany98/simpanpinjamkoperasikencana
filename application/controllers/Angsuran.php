<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_angsuran', 'm_angsuran');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['content'] = 'AngsuranPinjaman';
        $data['header'] = 'Angsuran Pinjaman';
        $data['js'] = 'AngsuranPinjaman.php';
        $this->load->view('template', $data);
    }


    public function hitung_saldo()
    {
        $id = $this->input->post('no_rekening');
        $jumlah_pinjaman = $this->m_angsuran->getJumlahPinjaman($id);
        $checkAngsuran = $this->m_angsuran->getNumRowsAngsuran($id);
        if($checkAngsuran == 0) {
            $sisa = $jumlah_pinjaman;
        }else if($checkAngsuran > 0) {
            $angsuran = $this->m_angsuran->getSisaPinjaman($id);
            $sisa = $jumlah_pinjaman - $angsuran;
        }
        $data = array(
            "jumlah_pinjaman" => $jumlah_pinjaman,
            "sisa_pinjaman" => $sisa
        );
        echo json_encode($data);
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
        echo json_encode($this->m_angsuran->searchAnggota($q));
    }

    public function save()
    {
        $id = $this->input->post('no_rekening');
        $transaksi = $this->m_angsuran;
        $validation = $this->form_validation;
        $validation->set_rules($transaksi->rules());
        if ($validation->run()) {
            $transaksi->save_pokok();
            $transaksi->save_bunga();
            $jumlah_pinjaman = $this->m_angsuran->getJumlahPinjaman($id);
            $sisa = $this->m_angsuran->getSisaPinjaman($id);
            if($jumlah_pinjaman == $sisa) {
            $transaksi->lunas($id);
        }
            $this->session->set_flashdata('success', 'Data barhasil disimpan');
            redirect(base_url('Angsuran'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil disimpan');
            redirect(base_url('Angsuran'));
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
