<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_simpanan', 'm_simpanan');
        $this->load->library('form_validation');
    }
    

    public function index()
    {
        $data['content'] = 'Simpanan';
        $data['header'] = 'Simpanan';
        $data['js'] = 'Simpanan.php';
        $this->load->view('template', $data);
    }

    public function ajax_list()
    {
        $list = $this->m_simpanan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $simpanan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $simpanan->nama;
            $row[] = $simpanan->no_rekening;
            $row[] = '<a class="btn btn-warning btn-sm" href="'."".base_url('Simpanan/edit/'.$simpanan->no_rekening)."".'"><i class="fas fa-edit"></i> Edit</a> <button onclick="sweetAlert(this)" class="btn btn-danger btn-sm" value="delete/'."".$simpanan->no_rekening."".'"><i class="fas fa-trash"></i> Delete</button>';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_simpanan->count_all(),
                        "recordsFiltered" => $this->m_simpanan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        $data['content'] = 'AddSimpanan';
        $data['header'] = 'Tambah Simpanan';
        $data['js'] = 'AddSimpanan.php';
        $this->load->view('template', $data);
    }

    function selectsearch()
    {
        $q = $this->input->get('q');
        echo json_encode($this->m_simpanan->searchAnggota($q));
    }

    public function save()
    {
        
        $simpanan = $this->m_simpanan;
        $validation = $this->form_validation;
        $validation->set_rules($simpanan->rules());
        $id = $this->input->post('no_rekening');
        $check = $simpanan->getNumRows($id);
        if ($validation->run()) {
            if($check > 0) {
                $this->session->set_flashdata('danger', 'No Rekening Sudah Ada');
                redirect(base_url('Simpanan/add'));
            }
            $simpanan->save();
            $this->session->set_flashdata('success', 'Data barhasil disimpan');
            redirect(base_url('Simpanan/'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil disimpan');
            redirect(base_url('Simpanan/add'));
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_simpanan->delete($id)) {
            $this->session->set_flashdata('delete', 'Data barhasil dihapus');
            redirect(base_url('Simpanan/'));
        }
    }

    public function edit($id = null)
    {
        $data['content'] = 'EditSimpanan';
        $data['header'] = 'Edit Simpanan';
        $data['js'] = 'EditSimpanan.php';
        $data['simpanan'] = $this->m_simpanan->getById($id);
        $data['anggota'] = $this->m_simpanan->getAnggota($id);
        if (!$data['simpanan']) show_404();
        $this->load->view('template', $data);
    }

    public function update()
    {
        $simpanan = $this->m_simpanan;
        $validation = $this->form_validation;
        $validation->set_rules($simpanan->rules());
        $no_rekening = $this->input->post('no_rekening');
        $id = $this->input->post('id');
        $check = $simpanan->getNumRows($no_rekening);
        if ($validation->run()) {
            if($no_rekening == $id) 
            {
            $simpanan->update();
            $this->session->set_flashdata('success', 'Data barhasil Diubah');
            redirect(base_url('Simpanan/'));
            }
            if($check > 0) {
                $this->session->set_flashdata('danger', 'No Rekening Sudah Ada');
                redirect(base_url('Simpanan/'));
            }
            $simpanan->update();
            $this->session->set_flashdata('success', 'Data barhasil Diubah');
            redirect(base_url('Simpanan/'));
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Data tidak barhasil Diubah');
            redirect(base_url('Simpanan/'));
        }
    }

}

/* End of file Simpanan.php */
