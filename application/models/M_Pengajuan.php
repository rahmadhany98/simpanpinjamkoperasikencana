<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengajuan extends CI_Model {

    //nama table
    private $table = 'pengajuan';

    //field table
    public $id_pengajuan;
    public $tanggal;
    public $nama;
    public $no_identitas;
    public $no_buku_tabungan;
    public $alamat;
    public $no_telepon;
    public $umur;
    public $pekerjaan;
    public $jumlah_pinjam;
    public $lama_pinjam;
    public $tujuan;
    public $jaminan;
    public $foto_jaminan;
    public $foto_ktp;
    public $foto_kk;
    public $nama_penjamin;
    public $alamat_penjamin;
    public $no_teleepon_penjamin;
    public $status;

    //datatable
    var $column_order = array(null, 'tanggal','nama','alamat','jumlah_pinjam','lama_pinjam'); //set column field database for datatable orderable
    var $column_search = array('nama','alamat'); //set column field database for datatable searchable 
    var $order = array('tanggal' => 'asc'); // default order 
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
        $this->db->where('status', 'Diverifikasi');
        
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
        return $this->db->get_where($this->table, ["id_pengajuan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pengajuan = uniqid();
        $this->tanggal = $post["tanggal"];
        $this->nama = $post["nama"];
        $this->no_identitas = $post["no_identitas"];
        $this->no_buku_tabungan = $post["no_buku_tabungan"];
        $this->alamat = $post["alamat"];
        $this->no_telepon = $post["no_telepon"];
        $this->umur = $post["umur"];
        $this->pekerjaan = $post["pekerjaan"];
        $this->jumlah_pinjam = $post["jumlah_pinjam"];
        $this->lama_pinjam = $post["lama_pinjam"];
        $this->tujuan = $post["tujuan"];
        $this->jaminan = $post["jaminan"];
        $this->foto_jaminan = "default.jpg";
        $this->foto_ktp = "default.jpg";
        $this->foto_kk = "default.jpg";
        $this->nama_penjamin = $post["nama_penjamin"];
        $this->alamat_penjamin = $post["alamat_penjamin"];
        $this->no_teleepon_penjamin = $post["no_telepon_penjamin"];
        $this->status = "Diverifikasi";
        return $this->db->insert($this->table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_pengajuan" => $id));
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengajuan = $post["id_pengajuan"];
        $this->tanggal = $post["tanggal"];
        $this->nama = $post["nama"];
        $this->no_identitas = $post["no_identitas"];
        $this->no_buku_tabungan = $post["no_buku_tabungan"];
        $this->alamat = $post["alamat"];
        $this->no_telepon = $post["no_telepon"];
        $this->umur = $post["umur"];
        $this->pekerjaan = $post["pekerjaan"];
        $this->jumlah_pinjam = $post["jumlah_pinjam"];
        $this->lama_pinjam = $post["lama_pinjam"];
        $this->tujuan = $post["tujuan"];
        $this->jaminan = $post["jaminan"];
        $this->foto_jaminan = "default.jpg";
        $this->foto_ktp = "default.jpg";
        $this->foto_kk = "default.jpg";
        $this->nama_penjamin = $post["nama_penjamin"];
        $this->alamat_penjamin = $post["alamat_penjamin"];
        $this->no_teleepon_penjamin = $post["no_telepon_penjamin"];
        $this->status = "Diverifikasi";
        return $this->db->update($this->table, $this, array('id_pengajuan' => $post["id_pengajuan"]));
    }

}

/* End of file M_anggota.php */

?>