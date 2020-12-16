<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard', 'm_dashboard');
        if($this->session->userdata('role') == NULL)
        {
            $this->session->set_flashdata('danger', 'Harap Login Terlebih Dahulu!');
            redirect(base_url('Auth/'));
        }
    }
    

    public function index()
    {
        $data['content'] = 'Dashboard';
        $data['header'] = 'Dashboard';
        $data['js'] = 'Dashboard.php';
        $data['anggota'] = $this->m_dashboard->getCountAnggota();
        $data['setoran'] = $this->m_dashboard->getCountSetoran();
        $data['penarikan'] = $this->m_dashboard->getCountPenarikan();
        $data['realisasi'] = $this->m_dashboard->getCountRealisasi();
        $data['angsuran'] = $this->m_dashboard->getCountAngsuran();
        for($bulan = 1; $bulan < 13; $bulan++)
{
    $set = $this->m_dashboard->getCountSetoran($bulan);
    $set1 = $this->m_dashboard->getCountPenarikan($bulan);
    $set2 = $this->m_dashboard->getCountRealisasi($bulan);
    $set3 = $this->m_dashboard->getCountAngsuran($bulan);
    $jumlah_set[] = $set->kredit;
    $jumlah_set1[] = $set1->debit;
    $jumlah_set2[] = $set2->kredit;
    $jumlah_set3[] = $set3->kredit;
}
        $data['sett'] = $jumlah_set;
        $data['sett1'] = $jumlah_set1;
        $data['sett2'] = $jumlah_set2;
        $data['sett3'] = $jumlah_set3;
        $this->load->view('template', $data);
        //echo uniqid();
    }

}

/* End of file Dashboard.php */
