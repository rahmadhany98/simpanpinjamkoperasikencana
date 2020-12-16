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
    public $no_telepon_penjamin;
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

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'no_identitas',
            'label' => 'No Identitas',
            'rules' => 'numeric|required'],
            
            ['field' => 'no_buku_tabungan',
            'label' => 'no buku tabungan',
            'rules' => 'required'],

            ['field' => 'no_telepon',
            'label' => 'No telepon',
            'rules' => 'numeric|required'],

            ['field' => 'umur',
            'label' => 'umur',
            'rules' => 'numeric|required'],

            ['field' => 'pekerjaan',
            'label' => 'pekerjaan',
            'rules' => 'required'],

            ['field' => 'jumlah_pinjam',
            'label' => 'jumlah_pinjam',
            'rules' => 'numeric|required'],

            ['field' => 'lama_pinjam',
            'label' => 'lama_pinjam',
            'rules' => 'numeric|required'],
            
            ['field' => 'tujuan',
            'label' => 'tujuan',
            'rules' => 'required'],

            ['field' => 'jaminan',
            'label' => 'jaminan',
            'rules' => 'required'],

            ['field' => 'nama_penjamin',
            'label' => 'nama_penjamin',
            'rules' => 'required'],

            ['field' => 'alamat_penjamin',
            'label' => 'alamat_penjamin',
            'rules' => 'required'],

            ['field' => 'no_telepon_penjamin',
            'label' => 'no_telepon_penjamin',
            'rules' => 'required'],

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

    function searchAnggota($str)
    {
        $this->db->select('no_rekening as id, no_rekening as text');
        $this->db->like('no_rekening', $str);
        $this->db->where('jenis_simpanan', 'Simpanan Tabungan');
        $query = $this->db->get('simpanan');
        return $query->result();
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
        $this->foto_jaminan = $this->_uploadImage('foto_jaminan');
        $this->foto_ktp = $this->_uploadImage('foto_ktp');
        $this->foto_kk = $this->_uploadImage('foto_kk');
        $this->nama_penjamin = $post["nama_penjamin"];
        $this->alamat_penjamin = $post["alamat_penjamin"];
        $this->no_telepon_penjamin = $post["no_telepon_penjamin"];
        $this->status = "Diverifikasi";
        return $this->db->insert($this->table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_pengajuan" => $id));
    }

    private function _uploadImage($id)
{
    $config['upload_path']          = './upload/pengajuan/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $id.'_'.$this->id_pengajuan;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload($id)) {
        return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
    //return "default.jpg";
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
        if (!empty($_FILES["foto_jaminan"]["name"])) {
            $this->foto_jaminan = $this->_uploadImage('foto_jaminan');
        } else {
        $this->foto_jaminan = $post["old_jaminan"];
        }
        if (!empty($_FILES["foto_ktp"]["name"])) {
            $this->foto_ktp = $this->_uploadImage('foto_ktp');
        } else {
        $this->foto_ktp = $post["old_ktp"];
        }
        if (!empty($_FILES["foto_kk"]["name"])) {
            $this->foto_kk = $this->_uploadImage('foto_kk');
        } else {
        $this->foto_kk = $post["old_kk"];
        }
        $this->nama_penjamin = $post["nama_penjamin"];
        $this->alamat_penjamin = $post["alamat_penjamin"];
        $this->no_telepon_penjamin = $post["no_telepon_penjamin"];
        $this->status = "Diverifikasi";
        return $this->db->update($this->table, $this, array('id_pengajuan' => $post["id_pengajuan"]));
    }

    public function accept($id)
    {
        return $this->db->update($this->table, array('status' => 'Diterima'), array('id_pengajuan' => $id));
    }

    public function reject($id)
    {
        return $this->db->update($this->table, array('status' => 'Ditolak'), array('id_pengajuan' => $id));
    }

}

/* End of file M_anggota.php */

?>