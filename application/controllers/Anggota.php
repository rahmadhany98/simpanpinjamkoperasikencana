<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota', 'm_anggota');
        $this->load->library('form_validation');
    }
    

    public function index()
    {
        $data['content'] = 'Anggota';
        $data['header'] = 'Anggota';
        $data['js'] = 'Anggota.php';
        $this->load->view('template', $data);
    }

    public function ajax_list()
    {
        $list = $this->m_anggota->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $anggota) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $anggota->nama;
            $row[] = $anggota->alamat;
            $row[] = '<a class="btn btn-warning btn-sm" href="'."".base_url('Anggota/edit/'.$anggota->id)."".'"><i class="fas fa-edit"></i> Edit</a> <button onclick="sweetAlert(this)" class="btn btn-danger btn-sm" value="delete/'."".$anggota->id."".'"><i class="fas fa-trash"></i> Delete</button>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_anggota->count_all(),
                        "recordsFiltered" => $this->m_anggota->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        $data['content'] = 'AddAnggota';
        $data['header'] = 'Tambah Anggota';
        $data['js'] = 'AddAnggota.php';
        $this->load->view('template', $data);
    }

    public function save()
    {
        $anggota = $this->m_anggota;
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        if ($validation->run()) {
            $anggota->save();
            $this->session->set_flashdata('success', 'Data barhasil disimpan');
            redirect(base_url('Anggota/'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil disimpan');
            redirect(base_url('Anggota/add'));
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_anggota->delete($id)) {
            $this->session->set_flashdata('delete', 'Data barhasil dihapus');
            redirect(base_url('Anggota/'));
        }
    }

    public function edit($id = null)
    {
        $data['content'] = 'EditAnggota';
        $data['header'] = 'Edit Anggota';
        $data['js'] = 'EditAnggota.php';
        $data['anggota'] = $this->m_anggota->getById($id);
        if (!$data['anggota']) show_404();
        $this->load->view('template', $data);
    }

    public function update()
    {
        $anggota = $this->m_anggota;
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        if ($validation->run()) {
            $anggota->update();
            $this->session->set_flashdata('success', 'Data barhasil diubah');
            redirect(base_url('Anggota/'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil diubah');
            redirect(base_url('Anggota/'));
        }
    }

}

/* End of file Anggota.php */
