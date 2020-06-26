<?php


class Model_bidder extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function getbidData(){
        $this->db->where('biding_end_date >=',date('Y-m-d'));
        $query=$this->db->get('bidding_document');
        return $query->result_array();
}
function getView($id){
    $this->db->where('Document_id',$id);
      $query=$this->db->get('bidding_document') ;
      return $query->result_array();
}
public function register($data){
        $query=$this->db->insert('bidders',$data);

}
public function viewInfo($data){

        $this->db->where('bidder_id',$data);
        $query=$this->db->get('bidders');
        if($query->num_rows()>0)
        {
            return $query->row();
        }

}
}