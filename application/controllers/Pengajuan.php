<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengajuan', 'm_pengajuan');
        $this->load->library('form_validation');
    }
    

    public function index()
    {
        $data['content'] = 'Pengajuan';
        $data['header'] = 'Pengajuan';
        $data['js'] = 'Pengajuan.php';
        $this->load->view('template', $data);
    }

    public function ajax_list()
    {
        $list = $this->m_pengajuan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pengajuan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pengajuan->tanggal;
            $row[] = $pengajuan->nama;
            $row[] = $pengajuan->alamat;
            $row[] = $pengajuan->jumlah_pinjam;
            $row[] = $pengajuan->lama_pinjam;
            $row[] = '<a class="btn btn-warning btn-sm" href="'."".base_url('Pengajuan/edit/'.$pengajuan->id_pengajuan)."".'"><i class="fas fa-edit"></i> Edit</a> <button onclick="sweetAlert(this)" class="btn btn-danger btn-sm" value="delete/'."".$pengajuan->id_pengajuan."".'"><i class="fas fa-trash"></i> Delete</button>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_pengajuan->count_all(),
                        "recordsFiltered" => $this->m_pengajuan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function selectsearch()
    {
        $q = $this->input->get('q');
        echo json_encode($this->m_pengajuan->searchAnggota($q));
    }

    public function add()
    {
        $data['content'] = 'AddPengajuan';
        $data['header'] = 'Tambah Pengajuan';
        $data['js'] = 'AddPengajuan.php';
        $this->load->view('template', $data);
    }

    public function save()
    {
        $pengajuan = $this->m_pengajuan;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuan->rules());

        if ($validation->run()) {
            $pengajuan->save();
            $this->session->set_flashdata('success', 'Data barhasil disimpan');
            redirect(base_url('Pengajuan/'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil disimpan');
            redirect(base_url('Pengajuan/add'));
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_pengajuan->delete($id)) {
            $this->session->set_flashdata('delete', 'Data barhasil dihapus');
            redirect(base_url('Pengajuan/'));
        }
    }

    public function edit($id = null)
    {
        $data['content'] = 'EditPengajuan';
        $data['header'] = 'Edit Pengajuan';
        $data['js'] = 'EditPengajuan.php';
        $data['pengajuan'] = $this->m_pengajuan->getById($id);
        if (!$data['pengajuan']) show_404();
        $this->load->view('template', $data);
    }

    public function update()
    {
        $pengajuan = $this->m_pengajuan;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuan->rules());

        if ($validation->run()) {
            $pengajuan->update();
            $this->session->set_flashdata('success', 'Data barhasil diubah');
            redirect(base_url('Pengajuan/'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil diubah');
            redirect(base_url('Pengajuan/'));
        }
    }

}

/* End of file Anggota.php */
