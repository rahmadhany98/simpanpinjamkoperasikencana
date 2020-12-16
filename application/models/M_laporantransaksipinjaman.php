<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporantransaksipinjaman extends CI_Model {

    //nama table
    private $table = 'transaksi';


    //datatable
    // var $column_order = array(null,'no_rekening','debit','kredit'); //set column field database for datatable orderable
    // var $column_search = array('no_rekening'); //set column field database for datatable searchable 
    // var $order = array('tanggal_input' => 'desc'); // default order 
    public function __construct()
    {
        parent::__construct();
    }
    
    //query filter datatable
    private function _get_datatables_query_()
    {
        // //add custom filter here
        
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
        if($this->input->post('start_date') && $this->input->post('end_date'))
        {
            $this->db->where('tanggal_transaksi >=', $this->input->post('start_date'));
            $this->db->where('tanggal_transaksi <=', $this->input->post('end_date'));
        }else 
        {
            $this->db->where('tanggal_transaksi >=', date("YYYY-mm-dd"));
            $this->db->where('tanggal_transaksi <=', date("YYYY-mm-dd"));
        }
        $this->db->group_start();
        $this->db->where('kode_transaksi =', '301');
        $this->db->or_where('kode_transaksi =', '302');
        $this->db->group_end();
        $i = 0;
     
        // foreach ($this->column_search as $item) // loop column 
        // {
        //     if($_POST['search']['value']) // if datatable send POST for search
        //     {
                 
        //         if($i===0) // first loop
        //         {
        //             $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
        //             $this->db->like($item, $_POST['search']['value']);
        //         }
        //         else
        //         {
        //             $this->db->or_like($item, $_POST['search']['value']);
        //         }
 
        //         if(count($this->column_search) - 1 == $i) //last loop
        //             $this->db->group_end(); //close bracket
        //     }
        //     $i++;
        // }
         
        // if(isset($_POST['order'])) // here order processing
        // {
        //     $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        // } 
        // else if(isset($this->order))
        // {
        //     $order = $this->order;
        //     $this->db->order_by(key($order), $order[key($order)]);
        // }
    }
 
    public function get_datatables()
    {
        $this->_get_datatables_query_();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query_();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    

}

/* End of file M_simpanan.php */

?>