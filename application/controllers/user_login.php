<?php


class user_login extends MY_controller
{
public function __construct()
{
    parent::__construct();
    $this->load->model('Model_bid_user');
}
public function index(){
    $this->form_validation->set_rules('username','Username','trim|required');
    $this->form_validation->set_rules('password','Password','trim|callback_validate_user');
    if($this->form_validation->run()==false){

    }
    else{
        redirect('bidder');
    }
}
public function validate_user(){

    $username=$this->input->post('username');
    $password=$this->input->post( 'password');
    $result=$this->Model_bid_user->login($username,$password);
    if($result){
        $data=array('is_logged'=>true,'username'=>$this->input->post('username'));
        $this->session->set_userdata($data);
        redirect('bidder');
    }
    else{
        $this->form_validation->set_message('validate_user',$this->lang->line('error_login'));
        redirect('login');
        return false;
    }
}
}