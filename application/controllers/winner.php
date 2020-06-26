<?php


class winner extends MY_Controller
{
public function __construct()
{
    parent::__construct();
    $this->load->model('Model_winner');
    $this->load->model('Model_bidder');
}
public function index()
{
$topwinner['winner']=$this->Model_winner->getWinner();

    $this->load->view('header');
    $this->load->view('winner',$topwinner);
    $this->load->view('footer');
}
public function withdraw($id){
    $withdraw=$this->Model_winner->getWithdraw($id);
    if($withdraw==true){
        redirect('bidder');
    }
else{
    $this->session->set_flashdata('success', 'Successfully withdraw your request');
    redirect('winner');
}
}
public function viewInfo($id){
     $bidderInfo['data']=$this->Model_bidder->viewInfo($id);
     $this->load->view('header');
    $this->load->view('viewInfo',$bidderInfo);
    $this->load->view('footer');



}

}