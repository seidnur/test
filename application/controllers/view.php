<?php


class view extends MY_controller
{function __construct()
{
    parent::__construct();
    $this->load->model('Model_bidder');
}
public function index($id){

        $data['post']=$this->Model_bidder->getView($id);
        $this->load->view('view',$data);


}
}