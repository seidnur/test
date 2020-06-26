<?php



class Model_bid_user extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function login($email, $password)
    {
        $this->db->where('user_name', $email);
        $this->db->where('password', password_verify($password));
        $query = $this->db->get('bid_user');
        if($query->num_rows() == 1) {
            return $query->row();
        }

        return false;
    }

}