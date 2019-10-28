<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_brands extends CI_Model 
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
		 *     - TRUE:  just the field names of the brands table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false )
	{
        
	    $select_statement = ( $this->raw_data ) ? 'brand_id,brand_name,brand_cat_id,brand_description,
	    brand_created_by' : 'brand_id,brand_name,categories.cat_name as brand_cat_id,brand_description,
	    brand_created_by';
		$this->db->select( $select_statement );
		$this->db->from('brands');
        

		// Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
        {
            $this->db->limit(1,0);
        }
		else // Select the desired record
        {
            $this->db->where( 'brand_id', $id );
        }
            $this->db->join('categories' ,'cat_id=brand_cat_id', 'left' );

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array(
			    'brand_id' => $row['brand_id'],
	'brand_created_by' => $row['brand_created_by'],
	'brand_name' => $row['brand_name'],
     'brand_cat_id' => $row['brand_cat_id'],
    
	'brand_description' => $row['brand_description'],
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'brands', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'brand_id', $id );
		$this->db->update( 'brands', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'brand_id', $id );            
        }
        else
        {
            $this->db->where( 'brand_id', $id );
        }

        $this->db->set( 'brand_deleted',1 );
        $this->db->update( 'brands' );
        
	}



	function lister ( $page = FALSE )
	{
        
	    $this->db->start_cache();
		$this->db->select( 'brand_id,brand_created_by,brand_name,brand_description');
		$this->db->from( 'brands' );
		//$this->db->order_by( '', 'ASC' );
        

        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'brands/index/';
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

        $query = $this->db->where('brand_deleted',0);

        // Get the resultsbrand_deleted
		$query = $this->db->get();
		
		$temp_result = array();

		foreach ( $query->result_array() as $row )
		{
	$temp_result[] = array(
	'brand_id' => $row['brand_id'],
	'brand_name' => $row['brand_name'],
	'brand_description' => $row['brand_description'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'brand_id,brand_name,brand_description');
		$this->db->from( 'brands' );
        

		// Delete this line after setting up the search conditions 
        die('Please see models/model_brands.php for setting up the search method.');
		
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
            $config['base_url']    = '/brands/search/'.$keyword.'/';
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
	'brand_id' => $row['brand_id'],
	'brand_created_by' => $row['brand_created_by'],
	'brand_name' => $row['brand_name'],
	'brand_description' => $row['brand_description'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}




    function related_categories()
    {
        $this->db->select( 'cat_id AS categories_id, cat_name AS categories_name' );
        $rel_data = $this->db->get( 'categories' );
        return $rel_data->result_array();
    }

    /**
     *  Some utility methods
     */
    function fields( $withID = FALSE )
    {
        $fs = array(
	'brand_id' => lang('brand_id'),
	'brand_created_by' => lang('brand_created_by'),
	'brand_name' => lang('brand_name'),
	'brand_description' => lang('brand_description'),
    'brand_cat_id' => lang('brand_cat_id')
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

        $metadata = $this->explain_table->parse( 'brands' );

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
