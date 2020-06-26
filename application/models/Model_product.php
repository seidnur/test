<?php


class Model_product extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
function getProduct(){
    $query=$this->db->get('product');
    return $query->result_array();
}
}