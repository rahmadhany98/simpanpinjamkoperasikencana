<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengurus', 'm_pengurus');
        $this->load->library('form_validation');
    }
    

    public function index()
    {
        $data['content'] = 'Pengurus';
        $data['header'] = 'Pengurus';
        $data['js'] = 'Pengurus.php';
        $this->load->view('template', $data);
    }

    public function ajax_list()
    {
        $list = $this->m_pengurus->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $anggota) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $anggota->nama;
            $row[] = $anggota->role;
            $row[] = '<a class="btn btn-warning btn-sm" href="'."".base_url('Pengurus/edit/'.$anggota->id)."".'"><i class="fas fa-edit"></i> Edit</a> <button onclick="sweetAlert(this)" class="btn btn-danger btn-sm" value="delete/'."".$anggota->id."".'"><i class="fas fa-trash"></i> Delete</button>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_pengurus->count_all(),
                        "recordsFiltered" => $this->m_pengurus->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        $data['content'] = 'AddPengurus';
        $data['header'] = 'Tambah Pengurus';
        $data['js'] = 'AddPengurus.php';
        $this->load->view('template', $data);
    }

    public function save()
    {
        $anggota = $this->m_pengurus;
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        if ($validation->run()) {
            $anggota->save();
            $this->session->set_flashdata('success', 'Data barhasil disimpan');
            redirect(base_url('Pengurus/'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil disimpan');
            redirect(base_url('Pengurus/add'));
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_pengurus->delete($id)) {
            $this->session->set_flashdata('delete', 'Data barhasil dihapus');
            redirect(base_url('Pengurus/'));
        }
    }

    public function edit($id = null)
    {
        $data['content'] = 'EditPengurus';
        $data['header'] = 'Edit Pengurus';
        $data['js'] = 'EditPengurus.php';
        $data['anggota'] = $this->m_pengurus->getById($id);
        if (!$data['anggota']) show_404();
        $this->load->view('template', $data);
    }

    public function update()
    {
        $anggota = $this->m_pengurus;
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        if ($validation->run()) {
            $anggota->update();
            $this->session->set_flashdata('success', 'Data barhasil diubah');
            redirect(base_url('Pengurus/'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil diubah');
            redirect(base_url('Pengurus/'));
        }
    }

}

/* End of file Anggota.php */
