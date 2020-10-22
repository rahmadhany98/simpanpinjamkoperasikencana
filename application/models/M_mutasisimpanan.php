<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_mutasisimpanan extends CI_Model {

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
 
        if($this->input->post('no_rekening'))
        {
            $setquery = "SET @s:=0";
            $this->db->query($setquery);
            $querymutasi = "select tanggal_transaksi, debit, kredit, @s:=(kredit - debit + @s) as saldo_akumulasi from transaksi where no_rekening = '".$this->input->post('no_rekening')."' order by tanggal_transaksi";
            return $querymutasi;
        }
        $setquery = "SET @s:=0";
            $this->db->query($setquery);
            $querymutasi = "select tanggal_transaksi, debit, kredit, @s:=(kredit - debit + @s) as saldo_akumulasi from transaksi where no_rekening = 'xxx' order by tanggal_transaksi";
            return $querymutasi;
        // $i = 0;
     
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
        $query = $this->_get_datatables_query_();
        if($_POST['length'] != -1)
        $query2 = " LIMIT ".(int)$_POST['start'].", ".(int)$_POST['length'];
        $queryresult = $query . $query2;
        return $this->db->query($queryresult)->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query_();
        $query = $this->_get_datatables_query_();
        return $this->db->query($query)->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    

}

/* End of file M_simpanan.php */

?>