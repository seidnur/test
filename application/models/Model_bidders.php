<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_bidders extends CI_Model 
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
		 *     - TRUE:  just the field names of the bidders table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false )
	{
        $meta = $this->metadata();
	    $select_statement = ( $this->raw_data ) ? 'bidder_id,bidders_first_name,bidders_last_name,bidders_middel_name,bidders_gender,bidders_address,bidders_pphone,bidders_emaile,bidders_submit_date,bidders_inserted_money,bidders_comment,received_bidder_document' : 'bidder_id,bidders_first_name,bidders_last_name,bidders_middel_name,bidders_gender,bidders_address,bidders_pphone,bidders_emaile,bidders_submit_date,bidders_inserted_money,bidders_comment,received_bidder_document';
		$this->db->select( $select_statement );
		$this->db->from('bidders');
        

		// Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
        {
            $this->db->limit(1,0);
        }
		else // Select the desired record
        {
            $this->db->where( 'bidder_id', $id );
        }

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
	'bidder_id' => $row['bidder_id'],
	'bidders_first_name' => $row['bidders_first_name'],
	'bidders_last_name' => $row['bidders_last_name'],
	'bidders_middel_name' => $row['bidders_middel_name'],
	'bidders_gender' =>  $row['bidders_gender'],
	'bidders_address' => $row['bidders_address'],
	'bidders_pphone' => $row['bidders_pphone'],
	'bidders_emaile' => $row['bidders_emaile'],
	'bidders_submit_date' => $row['bidders_submit_date'],
	'bidders_inserted_money' => $row['bidders_inserted_money'],
	'bidders_comment' => $row['bidders_comment'],
	'received_bidder_document' => $row['received_bidder_document'],
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'bidders', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'bidder_id', $id );
		$this->db->update( 'bidders', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'bidder_id', $id );            
        }
        else
        {
            $this->db->where( 'bidder_id', $id );
        }
        $this->db->delete( 'bidders' );
        
	}



	function lister ( $page = FALSE )
	{
        $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'bidder_id,bidders_first_name,bidders_last_name,bidders_middel_name,bidders_gender,bidders_address,bidders_pphone,bidders_emaile,bidders_submit_date,bidders_inserted_money,bidders_comment,received_bidder_document');
		$this->db->from( 'bidders' );
		//$this->db->order_by( '', 'ASC' );
        

        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'bidders/index/';
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
		$query = $this->db->get();
		
		$temp_result = array();

		foreach ( $query->result_array() as $row )
		{
			$temp_result[] = array( 
	'bidder_id' => $row['bidder_id'],
	'bidders_first_name' => $row['bidders_first_name'],
	'bidders_last_name' => $row['bidders_last_name'],
	'bidders_middel_name' => $row['bidders_middel_name'],
	'bidders_gender' => ( array_search( $row['bidders_gender'], $meta['bidders_gender']['enum_values'] ) !== FALSE ) ? $meta['bidders_gender']['enum_names'][ array_search( $row['bidders_gender'], $meta['bidders_gender']['enum_values'] ) ] : '',
	'bidders_address' => $row['bidders_address'],
	'bidders_pphone' => $row['bidders_pphone'],
	'bidders_emaile' => $row['bidders_emaile'],
	'bidders_submit_date' => $row['bidders_submit_date'],
	'bidders_inserted_money' => $row['bidders_inserted_money'],
	'bidders_comment' => $row['bidders_comment'],
	'received_bidder_document' => $row['received_bidder_document'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'bidder_id,bidders_first_name,bidders_last_name,bidders_middel_name,bidders_gender,bidders_address,bidders_pphone,bidders_emaile,bidders_submit_date,bidders_inserted_money,bidders_comment,received_bidder_document');
		$this->db->from( 'bidders' );
        

		// Delete this line after setting up the search conditions 
        die('Please see models/model_bidders.php for setting up the search method.');
		
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
            $config['base_url']    = '/bidders/search/'.$keyword.'/';
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
	'bidder_id' => $row['bidder_id'],
	'bidders_first_name' => $row['bidders_first_name'],
	'bidders_last_name' => $row['bidders_last_name'],
	'bidders_middel_name' => $row['bidders_middel_name'],
	'bidders_gender' => ( array_search( $row['bidders_gender'], $meta['bidders_gender']['enum_values'] ) !== FALSE ) ? $meta['bidders_gender']['enum_names'][ array_search( $row['bidders_gender'], $meta['bidders_gender']['enum_values'] ) ] : '',
	'bidders_address' => $row['bidders_address'],
	'bidders_pphone' => $row['bidders_pphone'],
	'bidders_emaile' => $row['bidders_emaile'],
	'bidders_submit_date' => $row['bidders_submit_date'],
	'bidders_inserted_money' => $row['bidders_inserted_money'],
	'bidders_comment' => $row['bidders_comment'],
	'received_bidder_document' => $row['received_bidder_document'],
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
	'bidder_id' => lang('bidder_id'),
	'bidders_first_name' => lang('bidders_first_name'),
	'bidders_last_name' => lang('bidders_last_name'),
	'bidders_middel_name' => lang('bidders_middel_name'),
	'bidders_gender' => lang('bidders_gender'),
	'bidders_address' => lang('bidders_address'),
	'bidders_pphone' => lang('bidders_pphone'),
	'bidders_emaile' => lang('bidders_emaile'),
	'bidders_submit_date' => lang('bidders_submit_date'),
	'bidders_inserted_money' => lang('bidders_inserted_money'),
	'bidders_comment' => lang('bidders_comment'),
	'received_bidder_document' => lang('received_bidder_document')
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

        $metadata = $this->explain_table->parse( 'bidders' );

        foreach( $metadata as $k => $md )
        {
            if( !empty( $md['enum_values'] ) )
            {
                $metadata[ $k ]['enum_names'] = array_map( 'lang', $md['enum_values'] );                
            } 
        }
        return $metadata; 
    }
    function BidderCount($deleted=false)
    {
        $this->db->start_cache();
        $this->db->select('count(DISTINCT bidder_id)');
        $this->db->from('Bidders');
        $this->db->flush_cache();
        return $this->db->count_all_results();
    }
}
