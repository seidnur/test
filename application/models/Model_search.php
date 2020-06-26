<?php


class Model_search extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    function getSearch($productname){
        $this->db->like('Document_name',$productname);
        $this->db->where('Document_name',$productname);
        $query=$this->db->get('bidding_document');
        return $query->result_array();


    }

}