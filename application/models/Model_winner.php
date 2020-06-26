<?php


class Model_winner extends  CI_Model
{
    public function getWinner(){
        $this->db->order_by('bidders_inserted_money', 'ASC');
        $this->db->where('status', 0);
        $query = $this->db->get('bidders',5);
        return $query->result_array();
    }
    public function getWithdraw($id){
        $data = array(
            'status' => 2
        );
        $this->db->where('bidder_id', $id);
        $this->db->update('bidders', $data);
    }
}