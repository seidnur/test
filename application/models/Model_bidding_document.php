<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_bidding_document extends CI_Model 
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
		 *     - TRUE:  just the field names of the bidding_document table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false )
	{
        
	    $select_statement = ( $this->raw_data ) ? 'Document_id,bidding_company_id,Document_name,Document_image,Document_crated_date,Document_inserted_by,Document_discription,biding_end_date' : 'Document_id,tbl_campany.company_name AS bidding_company_id,Document_name,Document_image,Document_crated_date,Document_inserted_by,Document_discription,biding_end_date';
		$this->db->select( $select_statement );
		$this->db->from('bidding_document');
        $this->db->join( 'tbl_campany', 'bidding_company_id = company_id', 'left' );


		// Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
        {
            $this->db->limit(1,0);
        }
		else // Select the desired record
        {
            $this->db->where( 'Document_id', $id );
        }

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
	'Document_id' => $row['Document_id'],
	'bidding_company_id' => $row['bidding_company_id'],
	'Document_name' => $row['Document_name'],
	'Document_image' => $row['Document_image'],
	'Document_crated_date' => $row['Document_crated_date'],
	'Document_inserted_by' => $row['Document_inserted_by'],
	'Document_discription' => $row['Document_discription'],
	'biding_end_date' => $row['biding_end_date'],
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'bidding_document', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'Document_id', $id );
		$this->db->update( 'bidding_document', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'Document_id', $id );            
        }
        else
        {
            $this->db->where( 'Document_id', $id );
        }
        $this->db->delete( 'bidding_document' );
        
	}



	function lister ( $page = FALSE )
	{
        
	    $this->db->start_cache();
		$this->db->select( 'Document_id,tbl_campany.company_name AS bidding_company_id,
		Document_name,Document_image,Document_crated_date,user_name as Document_inserted_by,
		Document_discription,biding_end_date');
		$this->db->from( 'bidding_document' );
		//$this->db->order_by( '', 'ASC' );
        $this->db->join( 'tbl_campany', 'bidding_company_id = company_id', 'left' );
        $this->db->join( 'users', 'user_emp_id = Document_inserted_by', 'left' );


        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'bidding_document/index/';
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
	'Document_id' => $row['Document_id'],
	'bidding_company_id' => $row['bidding_company_id'],
	'Document_name' => $row['Document_name'],
	'Document_image' => $row['Document_image'],
	'Document_crated_date' => $row['Document_crated_date'],
	'Document_inserted_by' => $row['Document_inserted_by'],
	'Document_discription' => $row['Document_discription'],
	'biding_end_date' => $row['biding_end_date'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'Document_id,tbl_campany.company_name AS bidding_company_id,Document_name,Document_image,Document_crated_date,Document_inserted_by,Document_discription,biding_end_date');
		$this->db->from( 'bidding_document' );
        $this->db->join( 'tbl_campany', 'bidding_company_id = company_id', 'left' );


		// Delete this line after setting up the search conditions 
        die('Please see models/model_bidding_document.php for setting up the search method.');
		
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
            $config['base_url']    = '/bidding_document/search/'.$keyword.'/';
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
	'Document_id' => $row['Document_id'],
	'bidding_company_id' => $row['bidding_company_id'],
	'Document_name' => $row['Document_name'],
	'Document_image' => $row['Document_image'],
	'Document_crated_date' => $row['Document_crated_date'],
	'Document_inserted_by' => $row['Document_inserted_by'],
	'Document_discription' => $row['Document_discription'],
	'biding_end_date' => $row['biding_end_date'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}

	function related_tbl_campany()
    {
        $this->db->select( 'company_id AS tbl_campany_id, company_name AS tbl_campany_name' );
        $rel_data = $this->db->get( 'tbl_campany' );
        return $rel_data->result_array();
    }







    /**
     *  Some utility methods
     */
    function fields( $withID = FALSE )
    {
        $fs = array(
	'Document_id' => lang('Document_id'),
	'bidding_company_id' => lang('bidding_company_id'),
	'Document_name' => lang('Document_name'),
	'Document_image' => lang('Document_image'),
	'Document_crated_date' => lang('Document_crated_date'),
	'Document_inserted_by' => lang('Document_inserted_by'),
	'Document_discription' => lang('Document_discription'),
	'biding_end_date' => lang('biding_end_date')
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

        $metadata = $this->explain_table->parse( 'bidding_document' );

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
