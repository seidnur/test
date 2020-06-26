<?php


class changeAccount extends MY_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library( 'template' );
    }
public function index(){
$this->load->view('changePassword');
}
}