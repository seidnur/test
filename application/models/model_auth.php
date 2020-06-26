<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_auth extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->load->library( 'session' );
    }
	/**
	 * This function used to check the login credentials of the user
	 * @param string $email : This is email of the user
	 * @param string $password : This is encrypted password of the user
	 */
    public function loginuser($email, $password)
    {
        if ($email && $password) {
            $sql = "SELECT * FROM bid_user WHERE user_name = ?";
            $query = $this->db->query($sql, array($email));

            if ($query->num_rows() == 1) {
                $result = $query->row_array();

                $hash_password = password_verify($password, $result['password']);
                if ($hash_password === true) {
                    return $result;
                } else {
                    return false;
                }


            } else {
                return false;
            }
        }
    }
	function loginMe($email, $password)
	{
		$this->db->select('users.*,concat(employee.emp_first_name," 
		",employee.emp_middle_name," ",employee.emp_last_name) as full_name,
		usergroup.group_id,group.group_name');
		$this->db->from('users');
		$this->db->where('user_name', $email);
		$this->db->join('employee','users.user_emp_id=employee.emp_user_id','left');
		$this->db->join('usergroup','users.id=usergroup.group_user_id','left');
		$this->db->join('group','usergroup.group_id=group.id','left');
		$query = $this->db->get();
		$user = $query->result();

		if(!empty($user)){
			if(password_verify($password, $user[0]->user_password)){
				return $user;
			} else {
				return array();
			}
		} else {
			return array();
		}
	}




    /**
     *  Function getPermissionsByGroup
     *  @return array
     */
    function getPermissionsByGroup( $group )
	{
		$this->db->select('*');
		$this->db->where('id', $group);
		$this->db->from('group');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return array(
				'id' => $row['id'],
				'group_id' => $row['group_name'],
				'permission' => $row['permission']
			);
		} else {
			return array();
		}

	}


    /** 
     *  Function login
     *  Makes the user logged in, by updating the session     
     */
    function login( $compData )
    {
        $this->session->set_userdata( 'logged_in', $compData );
    }


    /** 
     *  Function logout
     *  Makes the user logged out, by updating the session     
     */
   function logout()
    {
        $data = array(
					'valid' => 'no',
					'uid'   => FALSE,
                    'name'  => '');
    
    	$this->session->set_userdata( 'logged_in', $data );
    }    
}

/* End of file model_auth.php */
/* Location: ./application/models/model_auth.php */