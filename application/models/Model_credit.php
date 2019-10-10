<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_credit extends CI_Model 
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
		 *     - TRUE:  just the field names of the credit table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false )
	{
        $meta = $this->metadata();
	    $select_statement = ( $this->raw_data ) ? 'cr_id,cr_full_name,cr_product,cr_unit_price,cr_quantity,cr_total_credit,cr_phone_number,cr_address,cr_given_date,cr_customer_gender,cr_return_date,cr_actual_return_date,cr_created_by,cr_remark,cr_status' : 'cr_id,cr_full_name,items.Itm_name AS cr_product,cr_unit_price,cr_quantity,cr_total_credit,cr_phone_number,cr_address,cr_given_date,cr_customer_gender,cr_return_date,cr_actual_return_date,cr_created_by,cr_remark,cr_status';
		$this->db->select( $select_statement );
		$this->db->from('credit');
        $this->db->join( 'items', 'cr_product = itm_id', 'left' );


		// Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
        {
            $this->db->limit(1,0);
        }
		else // Select the desired record
        {
            $this->db->where( 'cr_id', $id );
        }

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
	'cr_id' => $row['cr_id'],
	'cr_full_name' => $row['cr_full_name'],
	'cr_product' => $row['cr_product'],
	'cr_unit_price' => $row['cr_unit_price'],
	'cr_quantity' => $row['cr_quantity'],
	'cr_total_credit' => $row['cr_total_credit'],
	'cr_phone_number' => $row['cr_phone_number'],
	'cr_address' => $row['cr_address'],
	'cr_given_date' => $row['cr_given_date'],
	'cr_customer_gender' => ( array_search( $row['cr_customer_gender'], $meta['cr_customer_gender']['enum_values'] ) !== FALSE ) ? $meta['cr_customer_gender']['enum_names'][ array_search( $row['cr_customer_gender'], $meta['cr_customer_gender']['enum_values'] ) ] : '',
	'cr_return_date' => $row['cr_return_date'],
	'cr_actual_return_date' => $row['cr_actual_return_date'],
	'cr_created_by' => $row['cr_created_by'],
	'cr_remark' => $row['cr_remark'],
	'cr_status' => $row['cr_status']==0?"No":"yes",
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'credit', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'cr_id', $id );
		$this->db->update( 'credit', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'cr_id', $id );            
        }
        else
        {
            $this->db->where( 'cr_id', $id );
        }
        //update credit to deleted
        $this->db->set( 'cr_deleted', 1 );
        $this->db->update( 'credit' );
        
	}



	function lister ( $page = FALSE )
	{
        $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'cr_id,cr_full_name,items.Itm_name AS cr_product,cr_unit_price,cr_quantity,cr_total_credit,cr_phone_number,cr_address,cr_given_date,cr_customer_gender,cr_return_date,cr_actual_return_date,cr_created_by,cr_remark,cr_status');
		$this->db->from( 'credit' );
		$this->db->order_by( 'cr_id', 'desc' );
		$this->db->where( 'cr_deleted', 0 );
        $this->db->join( 'items', 'cr_product = itm_id', 'left' );


        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'credit/index/';
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
	'cr_id' => $row['cr_id'],
	'cr_full_name' => $row['cr_full_name'],
	'cr_product' => $row['cr_product'],
	'cr_unit_price' => $row['cr_unit_price'],
	'cr_quantity' => $row['cr_quantity'],
	'cr_total_credit' => $row['cr_total_credit'],
	'cr_phone_number' => $row['cr_phone_number'],
	'cr_address' => $row['cr_address'],
	'cr_given_date' => $row['cr_given_date'],
	'cr_customer_gender' => ( array_search( $row['cr_customer_gender'], $meta['cr_customer_gender']['enum_values'] ) !== FALSE ) ? $meta['cr_customer_gender']['enum_names'][ array_search( $row['cr_customer_gender'], $meta['cr_customer_gender']['enum_values'] ) ] : '',
	'cr_return_date' => $row['cr_return_date'],
	'cr_actual_return_date' => $row['cr_actual_return_date'],
	'cr_created_by' => $row['cr_created_by'],
	'cr_remark' => $row['cr_remark'],
	'cr_status' => $row['cr_status']==0?"No":"yes",
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'cr_id,cr_full_name,items.Itm_name AS cr_product,cr_unit_price,cr_quantity,cr_total_credit,cr_phone_number,cr_address,cr_given_date,cr_customer_gender,cr_return_date,cr_actual_return_date,cr_created_by,cr_remark,cr_status');
		$this->db->from( 'credit' );
        $this->db->join( 'items', 'cr_product = itm_id', 'left' );


		// Delete this line after setting up the search conditions 
        die('Please see models/model_credit.php for setting up the search method.');
		
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
            $config['base_url']    = '/credit/search/'.$keyword.'/';
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
	'cr_id' => $row['cr_id'],
	'cr_full_name' => $row['cr_full_name'],
	'cr_product' => $row['cr_product'],
	'cr_unit_price' => $row['cr_unit_price'],
	'cr_quantity' => $row['cr_quantity'],
	'cr_total_credit' => $row['cr_total_credit'],
	'cr_phone_number' => $row['cr_phone_number'],
	'cr_address' => $row['cr_address'],
	'cr_given_date' => $row['cr_given_date'],
	'cr_customer_gender' => ( array_search( $row['cr_customer_gender'], $meta['cr_customer_gender']['enum_values'] ) !== FALSE ) ? $meta['cr_customer_gender']['enum_names'][ array_search( $row['cr_customer_gender'], $meta['cr_customer_gender']['enum_values'] ) ] : '',
	'cr_return_date' => $row['cr_return_date'],
	'cr_actual_return_date' => $row['cr_actual_return_date'],
	'cr_created_by' => $row['cr_created_by'],
	'cr_remark' => $row['cr_remark'],
	'cr_status' => $row['cr_status'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}

	function related_items()
    {
        $this->db->select( 'itm_id AS items_id, Itm_name AS items_name' );
        $rel_data = $this->db->get( 'items' );
        return $rel_data->result_array();
    }







    /**
     *  Some utility methods
     */
    function fields( $withID = FALSE )
    {
        $fs = array(
	'cr_id' => lang('cr_id'),
	'cr_full_name' => lang('cr_full_name'),
	'cr_product' => lang('cr_product'),
	'cr_unit_price' => lang('cr_unit_price'),
	'cr_quantity' => lang('cr_quantity'),
	'cr_total_credit' => lang('cr_total_credit'),
	'cr_phone_number' => lang('cr_phone_number'),
	'cr_address' => lang('cr_address'),
	'cr_given_date' => lang('cr_given_date'),
	'cr_customer_gender' => lang('cr_customer_gender'),
	'cr_return_date' => lang('cr_return_date'),
	'cr_actual_return_date' => lang('cr_actual_return_date'),
	'cr_created_by' => lang('cr_created_by'),
	'cr_remark' => lang('cr_remark'),
	'cr_status' => lang('cr_status')
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

        $metadata = $this->explain_table->parse( 'credit' );

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
