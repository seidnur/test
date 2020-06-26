<?php


class bidder extends MY_Controller
{
function __construct()
{
    parent::__construct();
    $this->load->model('Model_bidder');
}
function index(){
   $data['post']=$this->Model_bidder->getbidData();
    $this->load->view('header');
    $this->load->view('bidder',$data);
    $this->load->view('footer');

}
public function view($id){
    $data['view']=$this->Model_bidder->getView($id);
    $this->load->view('view',$data);

}
}