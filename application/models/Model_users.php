<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model 
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();

		// Paginaiton defaults
		$this->pagination_enabled = FALSE;
		$this->pagination_per_page = 10;
		$this->pagination_num_links = 5;
		$this->pager = '';

		/**
		 *    bool $this->raw_data		
		 *    Used to decide what data should the SQL queries retrieve if tables are joined
		 *     - TRUE:  just the field names of the users table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
		$this->raw_data = FALSE;  
	}

	function get ( $id, $get_one = false )
	{

		$select_statement = ( $this->raw_data ) ? 'id,user_name,user_password,user_emp_id,user_created_date,user_created_by,user_remark,user_accout_status,user_email' : 'id,user_name,user_password,employee.emp_first_name AS user_emp_id,user_created_date,user_created_by,user_remark,user_accout_status,user_email';
		$this->db->select( $select_statement );
		$this->db->from('users');
		$this->db->join( 'employee', 'user_emp_id = emp_user_id', 'left' );


		// Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
		{
			$this->db->limit(1,0);
		}
		else // Select the desired record
		{
			$this->db->where( 'id', $id );
		}

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
				'id' => $row['id'],
				'user_name' => $row['user_name'],
				'user_password' => $row['user_password'],
				'user_emp_id' => $row['user_emp_id'],
				'user_created_date' => $row['user_created_date'],
				'user_created_by' => $row['user_created_by'],
				'user_remark' => $row['user_remark'],
				'user_accout_status' => $row['user_accout_status']==1?"Yes":"No",
				'user_email' => $row['user_email'],
				);
		}
		else
		{
			return array();
		}
	}



	function insert ( $data )
	{
		$this->db->insert( 'users', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'id', $id );
		$this->db->update( 'users', $data );
	}


	
	function delete ( $id )
	{
		if( is_array( $id ) )
		{
			$this->db->where_in( 'id', $id );            
		}
		else
		{
			$this->db->where( 'id', $id );
		}
		$this->db->set( 'user_accout_status', 0 );

		$this->db->update( 'users' );



	}



	function lister ( $page = FALSE )
	{

		$this->db->start_cache();
		$this->db->select( 'id,user_name,user_password,concat(emp_first_name," ",emp_middle_name," ",emp_last_name) AS user_emp_id,user_created_date,user_created_by,user_remark,user_accout_status,user_email');
		$this->db->from( 'users' );
		//$this->db->order_by( '', 'ASC' );
		$this->db->join( 'employee', 'user_emp_id = emp_user_id', 'left' );

		/**
		 *   PAGINATION
		 */
		if( $this->pagination_enabled == TRUE )
		{
			$config = array();
			$config['total_rows']  = $this->db->count_all_results();
			$config['base_url']    = 'users/index/';
			$config['uri_segment'] = 3;
			$config['cur_tag_open'] = '<span class="current">';
			$config['cur_tag_close'] = '</span>';
			$config['per_page']    = $this->pagination_per_page;
			$config['num_links']   = $this->pagination_num_links;

			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$this->pager = $this->pagination->create_links();

			$this->db->limit( $config['per_page'], $page );
		}

		// Get the results
		$this->db->where('user_accout_status',1);
		$query = $this->db->get();

		$temp_result = array();

		foreach ( $query->result_array() as $row )
		{
			$temp_result[] = array( 
				'id' => $row['id'],
				'user_name' => $row['user_name'],
				'user_password' => $row['user_password'],
				'user_emp_id' => $row['user_emp_id'],
				'user_created_date' => $row['user_created_date'],
				'user_created_by' => $row['user_created_by'],
				'user_remark' => $row['user_remark'],
				'user_accout_status' => $row['user_accout_status']==1?"".lang('active_user')."":"".lang('inactive_user')."",
				'user_email' => $row['user_email'],
				);
		}
		$this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
		$meta = $this->metadata();
		$this->db->start_cache();
		$this->db->select( 'id,user_name,user_password,employee.emp_first_name AS user_emp_id,user_created_date,user_created_by,user_remark,user_accout_status,user_email');
		$this->db->from( 'users' );
		$this->db->join( 'employee', 'user_emp_id = emp_user_id', 'left' );


		// Delete this line after setting up the search conditions 
		die('Please see models/model_users.php for setting up the search method.');

		/**
		 *  Rename field_name_to_search to the field you wish to search 
		 *  or create advanced search conditions here
		 */
		$this->db->where( 'field_name_to_search LIKE "%'.$keyword.'%"' );

		/**
		 *   PAGINATION
		 */
		if( $this->pagination_enabled == TRUE )
		{
			$config = array();
			$config['total_rows']  = $this->db->count_all_results();
			$config['base_url']    = '/users/search/'.$keyword.'/';
			$config['uri_segment'] = 4;
			$config['per_page']    = $this->pagination_per_page;
			$config['num_links']   = $this->pagination_num_links;

			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$this->pager = $this->pagination->create_links();

			$this->db->limit( $config['per_page'], $page );
		}

		$query = $this->db->get();

		$temp_result = array();

		foreach ( $query->result_array() as $row )
		{
			$temp_result[] = array( 
				'id' => $row['id'],
				'user_name' => $row['user_name'],
				'user_password' => $row['user_password'],
				'user_emp_id' => $row['user_emp_id'],
				'user_created_date' => $row['user_created_date'],
				'user_created_by' => $row['user_created_by'],
				'user_remark' => $row['user_remark'],
				'user_accout_status' => $row['user_accout_status'],
				'user_email' => $row['user_email'],
				);
		}
		$this->db->flush_cache(); 
		return $temp_result;
	}

	function related_employee()
	{
		$this->db->select( 'emp_user_id AS employee_id, concat(emp_first_name," ",emp_middle_name," ",emp_last_name) AS employee_name' );
		$rel_data = $this->db->get( 'employee' );
		return $rel_data->result_array();
	}







	/**
	 *  Some utility methods
	 */
	function fields( $withID = FALSE )
	{
		$fs = array(
			'id' => lang('id'),
			'user_name' => lang('user_name'),
			'user_password' => lang('user_password'),
			'user_emp_id' => lang('user_emp_id'),
			'user_created_date' => lang('user_created_date'),
			'user_created_by' => lang('user_created_by'),
			'user_remark' => lang('user_remark'),
			'user_accout_status' => lang('user_accout_status'),
			'user_email' => lang('user_email')
			);

		if( $withID == FALSE )
		{
			unset( $fs[0] );
		}
		return $fs;
	}  
	


	function pagination( $bool )
	{
		$this->pagination_enabled = ( $bool === TRUE ) ? TRUE : FALSE;
	}



	/**
	 *  Parses the table data and look for enum values, to match them with language variables
	 */             
	function metadata()
	{
		$this->load->library('explain_table');

		$metadata = $this->explain_table->parse( 'users' );

		foreach( $metadata as $k => $md )
		{
			if( !empty( $md['enum_values'] ) )
			{
				$metadata[ $k ]['enum_names'] = array_map( 'lang', $md['enum_values'] );                
			} 
		}
		return $metadata; 
	}
/*
returns # of active users
*/
function usersCount(){
	$this->db->select('count(DISTINCT id)');
	$this->db->where('user_accout_status',1);
	$this->db->from('users');
	return $this->db->count_all_results();
}

}
