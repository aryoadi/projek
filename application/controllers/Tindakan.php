<?php 
class Tindakan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tindakan_model','tindakan_model');
    } 

    function get_data_user()
    {
        $list = $this->tindakan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->no_reg;
            $row[] = $field->nama;
            $row[] = $field->penyakit;
            $row[] = $field->kategori_perawatan;
            $row[] = $field->tarif; 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tindakan_model->count_all(),
            "recordsFiltered" => $this->tindakan_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
     function insert_dumy(){
        $jumlah_data=50;
        for($i=1;$i<$jumlah_data;$i++){
            $data=array(
                'nama'=>'Adi',
                'penyakit'=>'DBD',
                'kategori_perawatan'=>'ranap',
                'tarif'=>'500000');
            $this->db->insert('tindakan',$data);
        }
        echo $i. 'Data telah di insert';
    }

    function index()
    {
        $data['tindakan'] = $this->tindakan_model->get_all_tindakan();
         $data['title']='tindakan';
        $data['_view'] = 'tindakan/index';
        $this->load->view('partial/header',$data);
        $this->load->view('partial/maindashboard');
        $this->load->view('partial/footer');
    }



     public function export(){
        $data['title']='tindakan';
        $data['tindakan']=$this->tindakan_model->get_all_tindakan();
        $this->load->view('tindakan/exporttindakan',$data);
  }

    
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nama' => $this->input->post('nama'),
				'penyakit' => $this->input->post('penyakit'),
				'kategori_perawatan' => $this->input->post('kategori_perawatan'),
				'tarif' => $this->input->post('tarif'),
            );
            
            $tindakan_id = $this->tindakan_model->add_tindakan($params);
            redirect('tindakan/index');
        }
        else
        {            
            $data['_view'] = 'tindakan/add';
            $this->load->view('layouts/main',$data);
        }
    }  

   
    function edit($no_reg)
    {   
        
        $data['tindakan'] = $this->tindakan_model->get_tindakan($no_reg);
        
        if(isset($data['tindakan']['no_reg']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nama' => $this->input->post('nama'),
					'penyakit' => $this->input->post('penyakit'),
					'kategori_perawatan' => $this->input->post('kategori_perawatan'),
					'tarif' => $this->input->post('tarif'),
                );

                $this->tindakan_model->update_tindakan($no_reg,$params);            
                redirect('tindakan/index');
            }
            else
            {
                $data['_view'] = 'tindakan/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tindakan you are trying to edit does not exist.');
    } 

    function remove($no_reg)
    {
        $tindakan = $this->tindakan_model->get_tindakan($no_reg);
        if(isset($tindakan['no_reg']))
        {
            $this->tindakan_model->delete_tindakan($no_reg);
            redirect('tindakan/index');
        }
        else
            show_error('The tindakan you are trying to delete does not exist.');
    }
    
}
