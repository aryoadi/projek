<?php
 
class Pasien_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    

    function get_pasien($no_reg)
    {
        return $this->db->get_where('pasien',array('no_reg'=>$no_reg))->row_array();
    }
        
   
    function get_all_pasien()
    {
        $this->db->order_by('no_reg', 'desc');
        return $this->db->get('pasien')->result_array();
        $this->db->select('*');
        $this->db->from('pasien');
        $query = $this->db->get();
        return $query->result();
    }
        
   
    function add_pasien($params)
    {
        $this->db->insert('pasien',$params);
        return $this->db->insert_id();
    }
    
    
    function update_pasien($no_reg,$params)
    {
        $this->db->where('no_reg',$no_reg);
        return $this->db->update('pasien',$params);
    }
    
    
    function delete_pasien($no_reg)
    {
        return $this->db->delete('pasien',array('no_reg'=>$no_reg));
    }
}
