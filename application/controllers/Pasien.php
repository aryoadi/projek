<?php
 
class Pasien extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_model','pasien_model');
    } 


    function insert_dumy(){
        $jumlah_data=50;
        for($i=1;$i<$jumlah_data;$i++){
            $data=array(
                'nama_pasien'=>'Adi',
                'umur'=>'17',
                'jk'=>'L',
                'alamat'=>'Depok',
                'tanggal'=>'2019-06-12');
            $this->db->insert('pasien',$data);
        }
        echo $i. 'Data telah di insert';
    }
    function json(){
        $this->load->library('Datatables');
        $this->datatables->select('no_reg,nama_pasien,umur,jk,alamat,tanggal');
        $this->datatables->add_column('edit', anchor('pasien/edit/$1','Edit',array('class'=>'btn btn-info btn=sm')),'no_reg');
        $this->datatables->add_column('remove',anchor('pasien/remove/$1','Hapus',array('class'=>'btn btn-danger btn=sm')),'no_reg');
        $this->datatables->from('pasien');
        return print_r($this->datatables->generate());

    }

    function index()
    {
        $data['pasien'] = $this->pasien_model->get_all_pasien();
        $data['title']='pasien';
        $data['_view'] = 'pasien/index';
        $this->load->view('partial/header',$data);
        $this->load->view('partial/maindashboard');
        $this->load->view('partial/footer');
    }

     public function export(){
        $data['title']='pasien';
        $data['pasien']=$this->pasien_model->get_all_pasien();
        $this->load->view('pasien/exportpasien',$data);
  }

    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nama_pasien' => $this->input->post('nama_pasien'),
				'umur' => $this->input->post('umur'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'tanggal' => $this->input->post('tanggal'),
            );
            
            $pasien_id = $this->pasien_model->add_pasien($params);
            redirect('pasien/index');
        }
        else
        {            
            $data['_view'] = 'pasien/add';
            $this->load->view('layouts/main',$data);
        }
    }  

  
    function edit($no_reg)
    {   
       
        $data['pasien'] = $this->pasien_model->get_pasien($no_reg);
        
        if(isset($data['pasien']['no_reg']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nama_pasien' => $this->input->post('nama_pasien'),
					'umur' => $this->input->post('umur'),
					'jk' => $this->input->post('jk'),
					'alamat' => $this->input->post('alamat'),
					'tanggal' => $this->input->post('tanggal'),
                );

                $this->pasien_model->update_pasien($no_reg,$params);            
                redirect('pasien/index');
            }
            else
            {
                $data['_view'] = 'pasien/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The pasien you are trying to edit does not exist.');
    } 

   
    function remove($no_reg)
    {
        $pasien = $this->pasien_model->get_pasien($no_reg);

       
        if(isset($pasien['no_reg']))
        {
            $this->pasien_model->delete_pasien($no_reg);
            redirect('pasien/index');
        }
        else
            show_error('The pasien you are trying to delete does not exist.');
    }
    
}
