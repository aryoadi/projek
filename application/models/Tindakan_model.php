<?php
class Tindakan_model extends CI_Model{
    var $table = 'tindakan';
    var $column_order = array(null, 'nama','penyakit','kategori_perawatan,','tarif'); 
    var $column_search = array('nama','penyakit','kategori_perawatan');  
    var $order = array('no_reg' => 'asc');
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    private function _get_datatables_query()
    {    
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
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
 
   
    function get_tindakan($no_reg)
    {
        return $this->db->get_where('tindakan',array('no_reg'=>$no_reg))->row_array();
    }
        
   
    function get_all_tindakan()
    {
        $this->db->order_by('no_reg', 'desc');
        return $this->db->get('tindakan')->result_array();
        $this->db->select('*');
        $this->db->from('tindakan');
        $query = $this->db->get();
        return $query->result();
    }
    
    function add_tindakan($params)
    {
        $this->db->insert('tindakan',$params);
        return $this->db->insert_id();
    }
   
    function update_tindakan($no_reg,$params)
    {
        $this->db->where('no_reg',$no_reg);
        return $this->db->update('tindakan',$params);
    }
    
    function delete_tindakan($no_reg)
    {
        return $this->db->delete('tindakan',array('no_reg'=>$no_reg));
    }
}
