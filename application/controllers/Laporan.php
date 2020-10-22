<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ajax_list_laporan_transaksi_simpanan()
    {
        $this->load->model('M_laporantransaksisimpanan', 'm_laporan');
        $list = $this->m_laporan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $transaksi) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $transaksi->no_rekening;
            $row[] = $transaksi->debit;
            $row[] = $transaksi->kredit;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_laporan->count_all(),
                        "recordsFiltered" => $this->m_laporan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function TransaksiSimpanan()
    {
        $data['content'] = 'LaporanTransaksiSimpanan';
        $data['header'] = ' Laporan Transaksi Simpanan';
        $data['js'] = 'LaporanTransaksiSimpanan.php';
        $this->load->view('template', $data);
    }

    public function ajax_list_laporan_mutasi_simpanan()
    {
        $this->load->model('M_mutasisimpanan', 'm_laporan');
        $list = $this->m_laporan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $transaksi) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $transaksi->tanggal_transaksi;
            $row[] = $transaksi->debit;
            $row[] = $transaksi->kredit;
            $row[] = $transaksi->saldo_akumulasi;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_laporan->count_all(),
                        "recordsFiltered" => $this->m_laporan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function MutasiSimpanan()
    {
        $data['content'] = 'MutasiSimpanan';
        $data['header'] = 'Mutasi Simpanan';
        $data['js'] = 'MutasiSimpanan.php';
        $this->load->view('template', $data);
    }

}

/* End of file Simpanan.php */
