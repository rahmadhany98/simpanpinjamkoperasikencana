<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_simpanan extends CI_Model {

    //nama table
    private $table = 'simpanan';

    //field table
    public $no_rekening;
    public $id_anggota;
    public $jenis_simpanan;

    //datatable
    var $column_order = array(null, 'nama','no_rekening'); //set column field database for datatable orderable
    var $column_search = array('nama','no_rekening'); //set column field database for datatable searchable 
    var $order = array('no_rekening' => 'asc'); // default order 
    public function __construct()
    {
        parent::__construct();
    }
    
    //query filter datatable
    private function _get_datatables_query()
    {
         
        // //add custom filter here
        if($this->input->post('jenis_simpanan'))
        {
            $this->db->where('jenis_simpanan', $this->input->post('jenis_simpanan'));
        }
        // if($this->input->post('FirstName'))
        // {
        //     $this->db->like('FirstName', $this->input->post('FirstName'));
        // }
        // if($this->input->post('LastName'))
        // {
        //     $this->db->like('LastName', $this->input->post('LastName'));
        // }
        // if($this->input->post('address'))
        // {
        //     $this->db->like('address', $this->input->post('address'));
        // }
 
        $this->db->from($this->table);
        $this->db->join('anggota', 'anggota.id = simpanan.id_anggota');
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function rules()
    {
        return [
            ['field' => 'no_rekening',
            'label' => 'No Rekening',
            'rules' => 'required'],

            ['field' => 'id_anggota',
            'label' => 'Nama ANggota',
            'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["no_rekening" => $id])->row();
    }

    public function getAnggota($id)
    {
        $anggota = $this->db->get_where($this->table, ["no_rekening" => $id])->row()->id_anggota;
        return $this->db->get_where('anggota', ["id" => $anggota])->row();
    }

    public function getNumRows($id)
    {
        return $this->db->get_where($this->table, ["no_rekening" => $id])->num_rows();
    }

    function searchAnggota($str)
    {
        $this->db->select('id, nama as text');
        $this->db->like('nama', $str);
        $query = $this->db->get('anggota');
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no_rekening = $post["no_rekening"];
        $this->id_anggota = $post["id_anggota"];
        $this->jenis_simpanan = $post["jenis_simpanan"];
        return $this->db->insert($this->table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("no_rekening" => $id));
    }

    public function update()
    {
        $post = $this->input->post();
        $this->no_rekening = $post["no_rekening"];
        $this->id_anggota = $post["id_anggota"];
        $this->jenis_simpanan = $post["jenis_simpanan"];
        return $this->db->update($this->table, $this, array('no_rekening' => $post['id']));
    }

}

/* End of file M_simpanan.php */

?>