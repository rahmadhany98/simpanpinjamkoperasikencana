<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth', 'm_auth');
        $this->load->library('form_validation');
    }
    

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $anggota = $this->m_auth;
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        if ($validation->run()) {
            if($anggota->ceklogin() > 0)
            {
                $login = $anggota->getById();
                $this->session->set_userdata('id', $login->id);
                    $this->session->set_userdata('nama', $login->nama);
                    $this->session->set_userdata('role', $login->role);
                    $this->session->set_userdata('level', $login->username); 
                    redirect(base_url('Dashboard/'));
            }else
            {
                $this->session->set_flashdata('danger', 'User Tidak DItemukan!');
            redirect(base_url('Auth/'));
            }
        }else {
            $this->session->set_flashdata('error', $validation->error_array());
            $this->session->set_flashdata('danger', 'Ada Field yang Belum Diisi!');
            redirect(base_url('Auth/'));
        }
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
