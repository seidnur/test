<?php


class Model_login extends CI_Model
{
public function __construct()
{

}
public function login($username,$password){
    $this->db->where('user_name',$username);
    $this->db->where('password',$this->validate_password($password));
    $query=$this->db->get($this->db->dbprefix.'bid_user');
    if($query->num_rows()>0){
        return true;
    }
    else {
        return false;
    }

}
public function validate_password($password){
    if(password_verify($password,$this->stored_hash())){
        return true;
    }
    else return false;

}
public function stored_hash(){
    $this->db->where('user_name',$this->input->post('username'));
    $query=$this->db->get($this->db->dbprefix . 'bid_user');
    if($query->num_rows()>0){
        $row=$query->row();
        return $row->password;

    }
    else{
        return false;
    }
}
}