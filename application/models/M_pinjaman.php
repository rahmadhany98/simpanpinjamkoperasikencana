<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pinjaman extends CI_Model {

    //nama table
    private $table = 'pinjaman';

    // //field table
    // public $id;
    // public $nama;
    // public $alamat;
    // public $jenis_kelamin;
    // public $jenis_identitas;
    // public $no_identitas;
    // public $tanggal_lahir;

    //datatable
    var $column_order = array(null, 'no_pk','nama_debitor','alamat','jumlah_pinjam'); //set column field database for datatable orderable
    var $column_search = array('no_pk','nama_debitor'); //set column field database for datatable searchable 
    var $order = array('id_pinjaman' => 'asc'); // default order 
    public function __construct()
    {
        parent::__construct();
    }
    
    //query filter datatable
    private function _get_datatables_query()
    {
         
        // //add custom filter here
        // if($this->input->post('country'))
        // {
        //     $this->db->where('country', $this->input->post('country'));
        // }
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
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'no_identitas',
            'label' => 'No Identitas',
            'rules' => 'numeric|required'],
            
            ['field' => 'tanggal_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_pinjaman" => $id])->row();
    }

    public function getDetail($id)
    {
        return $this->db->get_where('transaksi', ["no_rekening" => $id, "kode_transaksi" => "301"])->result();
    }

    public function getNoPK($id)
    {
        return $this->db->get_where($this->table, ["id_pinjaman" => $id])->row()->no_pk;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->jenis_identitas = $post["jenis_identitas"];
        $this->no_identitas = $post["no_identitas"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        return $this->db->insert($this->table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->jenis_identitas = $post["jenis_identitas"];
        $this->no_identitas = $post["no_identitas"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        return $this->db->update($this->table, $this, array('id' => $post['id']));
    }

}

/* End of file M_anggota.php */

?>