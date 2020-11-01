<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Realisasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_realisasi', 'm_realisasi');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['content'] = 'RealisasiPinjaman';
        $data['header'] = 'Realisasi Pinjaman';
        $data['js'] = 'RealisasiPinjaman.php';
        $this->load->view('template', $data);
    }


    public function tampil_data()
    {
        $id = $this->input->post('nama_debitor');
        $hasil = $this->m_realisasi->getByNama($id);
        echo json_encode($hasil);
    }
    public function hitung_tanggal()
    {
        $id = $this->input->post('tanggal_realisasi');
        $id2 = $this->input->post('bulan');
        $hasil = $this->m_realisasi->getDateDiff($id,$id2);
        echo $hasil;
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
        echo json_encode($this->m_realisasi->searchAnggota($q));
    }

    public function save()
    {

        $realisasi = $this->m_realisasi;
        $validation = $this->form_validation;
        $validation->set_rules($realisasi->rules());
        if ($validation->run()) {
            $realisasi->save();
            $realisasi->save_pinjaman();
            $realisasi->save_biaya_admin();
            $realisasi->save_materai();
            $realisasi->save_realisasi();
            $this->session->set_flashdata('success', 'Data barhasil disimpan');
            redirect(base_url('Realisasi/'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil disimpan');
            redirect(base_url('Realisasi/'));
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
