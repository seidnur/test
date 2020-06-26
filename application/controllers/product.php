<?php


class product extends MY_controller
{
public function __construct()
{
    parent::__construct();
    $this->load->model('Model_product');
}
public function index(){
    $select['product']=$this->Model_product->getProduct();
$this->load->view('product',$select);
}

}