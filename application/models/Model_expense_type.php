<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_expense_type extends CI_Model 
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
		 *     - TRUE:  just the field names of the expense_type table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false )
	{
        
	    $select_statement = ( $this->raw_data ) ? 'exp_type_id,exp_type_name,users.user_name as exp_type_created_by,exp_created_date,exp_type_remark,is_deleted' : 'exp_type_id,exp_type_name,users.user_name as exp_type_created_by,exp_created_date,exp_type_remark,is_deleted';
		$this->db->select( $select_statement );
		$this->db->from('expense_type');
        $this->db->join('users', 'users.user_emp_id= expense_type.exp_type_created_by', 'left');



        // Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
        {
            $this->db->limit(1,0);
        }
		else // Select the desired record
        {
            $this->db->where( 'exp_type_id', $id );
        }

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
	'exp_type_id' => $row['exp_type_id'],
	'exp_type_name' => $row['exp_type_name'],
	'exp_type_created_by' => $row['exp_type_created_by'],
	'exp_created_date' => $row['exp_created_date'],
	'exp_type_remark' => $row['exp_type_remark'],
	'is_deleted' => $row['is_deleted'],
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'expense_type', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'exp_type_id', $id );
		$this->db->update( 'expense_type', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'exp_type_id', $id );            
        }
        else
        {
            $this->db->where( 'exp_type_id', $id );
        }
        $this->db->delete( 'expense_type' );
        
	}



	function lister ( $page = FALSE )
	{
        
	    $this->db->start_cache();
		$this->db->select( 'exp_type_id,exp_type_name,exp_type_created_by,exp_created_date,exp_type_remark,is_deleted');
		$this->db->from( 'expense_type' );
		//$this->db->order_by( '', 'ASC' );
        

        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'expense_type/index/';
            $config['uri_segment'] = 3;
            $config['cur_tag_open'] = '<span class="current">';
            $config['cur_tag_close'] = '</span>';
            $config['per_page']    = $this->pagination_per_page;
            $config['num_links']   = $this->pagination_num_links;
             // Customizing the First Link
				$config['first_link']					= '&laquo;';		// default: 'First'
				$config['first_tag_open']				= '<li>';			// default: '<div>'
				$config['first_tag_close']				= '</li>';			// default: '</div>'
				$config['first_url']					= '';				// default: ''

		        // Customizing the "Current Page" Link
				$config['cur_tag_open']					= '<li class="active"><a href="#" onclick="return false;">';	// default: '<b>'
				$config['cur_tag_close']				= '</a></li>';		// default: '</b>'

	          // Customizing the "Previous" Link
				$config['prev_link']					= '&lt;';			// default: '&lt;'
				$config['prev_tag_open']				= '<li>';			// default: '<div>'
				$config['prev_tag_close']				= '</li>';			// default: '</div>'
				// Customizing the "Next" Link
				$config['next_link']					= '&gt;';			// default: '&gt;'
				$config['next_tag_open']				= '<li>';			// default: '<div>'
				$config['next_tag_close']				= '</li>';			// default: '</div>'
	   

				// Customizing the "Digit" Link
				$config['num_tag_open']					= '<li>';			// default: '<div>'
				$config['num_tag_close']				= '</li>';			// default: '</div>'
				// Customizing the Last Link
				$config['last_link']					= '&raquo;';		// default: 'Last'
				$config['last_tag_open']				= '<li>';			// default: '<div>'
				$config['last_tag_close']				= '</li>';			// default: '</div>'

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();
    
            $this->db->limit( $config['per_page'], $page );
        }

        // Get the results
		$query = $this->db->get();
		
		$temp_result = array();

		foreach ( $query->result_array() as $row )
		{
			$temp_result[] = array( 
	'exp_type_id' => $row['exp_type_id'],
	'exp_type_name' => $row['exp_type_name'],
	'exp_type_created_by' => $row['exp_type_created_by'],
	'exp_created_date' => $row['exp_created_date'],
	'exp_type_remark' => $row['exp_type_remark'],
	'is_deleted' => $row['is_deleted']==0?"NO":"Yes",
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'exp_type_id,exp_type_name,exp_type_created_by,exp_created_date,exp_type_remark,is_deleted');
		$this->db->from( 'expense_type' );
        

		// Delete this line after setting up the search conditions 
        die('Please see models/model_expense_type.php for setting up the search method.');
		
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
            $config['base_url']    = '/expense_type/search/'.$keyword.'/';
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
	'exp_type_id' => $row['exp_type_id'],
	'exp_type_name' => $row['exp_type_name'],
	'exp_type_created_by' => $row['exp_type_created_by'],
	'exp_created_date' => $row['exp_created_date'],
	'exp_type_remark' => $row['exp_type_remark'],
	'is_deleted' => $row['is_deleted'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}





    /**
     *  Some utility methods
     */
    function fields( $withID = FALSE )
    {
        $fs = array(
	'exp_type_id' => lang('exp_type_id'),
	'exp_type_name' => lang('exp_type_name'),
	'exp_type_created_by' => lang('exp_type_created_by'),
	'exp_created_date' => lang('exp_created_date'),
	'exp_type_remark' => lang('exp_type_remark'),
	'is_deleted' => lang('is_deleted')
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

        $metadata = $this->explain_table->parse( 'expense_type' );

        foreach( $metadata as $k => $md )
        {
            if( !empty( $md['enum_values'] ) )
            {
                $metadata[ $k ]['enum_names'] = array_map( 'lang', $md['enum_values'] );                
            } 
        }
        return $metadata; 
    }
}
