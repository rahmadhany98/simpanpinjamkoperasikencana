<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pinjaman', 'm_pinjaman');
        $this->load->library('form_validation');
    }
    

    public function index()
    {
        $data['content'] = 'Pinjaman';
        $data['header'] = 'Pinjaman';
        $data['js'] = 'Pinjaman.php';
        $this->load->view('template', $data);
    }

    public function detail($id)
    {
        $data['content'] = 'DetailPinjaman';
        $data['header'] = 'Detail Pinjaman';
        $data['js'] = 'DetailPinjaman.php';
        $data['pinjaman'] = $this->m_pinjaman->getById($id);
        $no_pk = $this->m_pinjaman->getNoPK($id);
        $data['detail'] = $this->m_pinjaman->getDetail($no_pk); 
        $this->load->view('template', $data);
    }

    public function ajax_list()
    {
        $list = $this->m_pinjaman->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $anggota) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $anggota->no_pk;
            $row[] = $anggota->nama_debitor;
            $row[] = $anggota->alamat;
            $row[] = $anggota->jumlah_pinjam;
            $row[] = '<a class="btn btn-info btn-sm" href="'."".base_url('Pinjaman/detail/'.$anggota->id_pinjaman)."".'"><i class="fas fa-edit"></i> Detail</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_pinjaman->count_all(),
                        "recordsFiltered" => $this->m_pinjaman->count_filtered(),
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
