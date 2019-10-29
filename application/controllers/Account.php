<?php

class Account  extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->database();
    }
    public function index()
    {
        $ammount = 20;
        $sender_id = 1;
        $receiver_id = 2;

        $this->Account_model->transfer($ammount ,$sender_id ,$receiver_id);
    }
}