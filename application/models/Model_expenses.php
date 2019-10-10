<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_expenses extends CI_Model 
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
		 *     - TRUE:  just the field names of the expenses table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false )
	{
        
	    $select_statement = ( $this->raw_data ) ? 'exp_id,exp_reason_id,year,Month,amount,paid,created_by,created_date,remark' : 'exp_id,expense_type.exp_type_name AS exp_reason_id,year,Month,amount,paid,created_by,created_date,remark';
		$this->db->select( $select_statement );
		$this->db->from('expenses');
        $this->db->join( 'expense_type', 'exp_reason_id = exp_type_id', 'left' );


		// Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
        {
            $this->db->limit(1,0);
        }
		else // Select the desired record
        {
            $this->db->where( 'exp_id', $id );
        }

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
	'exp_id' => $row['exp_id'],
	'exp_reason_id' => $row['exp_reason_id'],
	'year' => $row['year'],
	'Month' => $row['Month'],
	'amount' => $row['amount'],
	'paid' => $row['paid'],
	'created_by' => $row['created_by'],
	'created_date' => $row['created_date'],
	'remark' => $row['remark'],
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'expenses', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'exp_id', $id );
		$this->db->update( 'expenses', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'exp_id', $id );            
        }
        else
        {
            $this->db->where( 'exp_id', $id );
        }
        $this->db->delete( 'expenses' );
        
	}



	function lister ( $page = FALSE )
	{
        
	    $this->db->start_cache();
		$this->db->select( 'exp_id,expense_type.exp_type_name AS exp_reason_id,year,Month,amount,paid,created_by,created_date,remark');
		$this->db->from( 'expenses' );
		//$this->db->order_by( '', 'ASC' );
        $this->db->join( 'expense_type', 'exp_reason_id = exp_type_id', 'left' );


        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'expenses/index/';
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
	'exp_id' => $row['exp_id'],
	'exp_reason_id' => $row['exp_reason_id'],
	'year' => $row['year'],
	'Month' => $row['Month'],
	'amount' => $row['amount'],
	'paid' => $row['paid']==0?"No":"Yes",
	'created_by' => $row['created_by'],
	'created_date' => $row['created_date'],
	'remark' => $row['remark'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'exp_id,expense_type.exp_type_name AS exp_reason_id,year,Month,amount,paid,created_by,created_date,remark');
		$this->db->from( 'expenses' );
        $this->db->join( 'expense_type', 'exp_reason_id = exp_type_id', 'left' );


		// Delete this line after setting up the search conditions 
        die('Please see models/model_expenses.php for setting up the search method.');
		
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
            $config['base_url']    = '/expenses/search/'.$keyword.'/';
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
	'exp_id' => $row['exp_id'],
	'exp_reason_id' => $row['exp_reason_id'],
	'year' => $row['year'],
	'Month' => $row['Month'],
	'amount' => $row['amount'],
	'paid' => $row['paid'],
	'created_by' => $row['created_by'],
	'created_date' => $row['created_date'],
	'remark' => $row['remark'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}

	function related_expense_type()
    {
        $this->db->select( 'exp_type_id AS expense_type_id, exp_type_name AS expense_type_name' );
        $rel_data = $this->db->get( 'expense_type' );
        return $rel_data->result_array();
    }







    /**
     *  Some utility methods
     */
    function fields( $withID = FALSE )
    {
        $fs = array(
	'exp_id' => lang('exp_id'),
	'exp_reason_id' => lang('exp_reason_id'),
	'year' => lang('year'),
	'Month' => lang('Month'),
	'amount' => lang('amount'),
	'paid' => lang('paid'),
	'created_by' => lang('created_by'),
	'created_date' => lang('created_date'),
	'remark' => lang('remark')
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

        $metadata = $this->explain_table->parse( 'expenses' );

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
