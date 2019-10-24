<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_categories extends CI_Model
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
         *     - TRUE:  just the field names of the categories table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false)
    {

        $select_statement = ($this->raw_data) ? 'cat_id,cat_name,cat_desc,user_name as cat_created_by,
        cat_remark,cat_deleted,cat_created_date' : 'cat_id,cat_name,cat_desc,user_name as cat_created_by,
        cat_remark,cat_deleted,cat_created_date';
        $this->db->select($select_statement);
        $this->db->from('categories');
        $this->db->join( 'users', 'users.user_emp_id =categories.cat_created_by', 'left' );



        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            $this->db->where('cat_id', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array('cat_id' => $row['cat_id'], 'cat_name' => $row['cat_name'], 'cat_desc' => $row['cat_desc'],
                'cat_created_by' => $row['cat_created_by'], 'cat_remark' => $row['cat_remark'],
                'cat_deleted' => $row['cat_deleted'], 'cat_created_date' => $row['cat_created_date'],);
        } else {
            return array();
        }
    }


    function insert($data)
    {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }


    function update($id, $data)
    {
        $this->db->where('cat_id', $id);
        $this->db->update('categories', $data);
    }


    function delete($id)
    {
       

        if( is_array( $id ) )
        {
       $this->db->where_in('cat_id', $id);           
        }
        else
        {
            $this->db->where( 'cat_id', $id );
        }
       

        $this->db->delete( 'categories');


    }


    function lister($page = FALSE)
    {

        $this->db->start_cache();
        $this->db->select('cat_id,cat_name,cat_desc,cat_created_by,cat_remark,cat_deleted,cat_created_date');
        $this->db->from('categories');
        //$this->db->order_by( '', 'ASC' );


        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'categories/index/';
            $config['uri_segment'] = 3;
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;




















































            // Customizing the First Link
            $config['first_link'] = 'First';        // default: 'First'
            $config['first_tag_open'] = '<li>';            // default: '<div>'
            $config['first_tag_close'] = '</li>';            // default: '</div>'
            $config['first_url'] = '';                // default: ''

            // Customizing the "Current Page" Link
            $config['cur_tag_open'] = '<li class="active"><a href="#" onclick="return false;">';    // default: '<b>'
            $config['cur_tag_close'] = '</a></li>';        // default: '</b>'

            // Customizing the "Previous" Link
            $config['prev_link'] = '&lt;';            // default: '&lt;'
            $config['prev_tag_open'] = '<li>';            // default: '<div>'
            $config['prev_tag_close'] = '</li>';            // default: '</div>'
            // Customizing the "Next" Link
            $config['next_link'] = '&gt;';            // default: '&gt;'
            $config['next_tag_open'] = '<li>';            // default: '<div>'
            $config['next_tag_close'] = '</li>';            // default: '</div>'


            // Customizing the "Digit" Link
            $config['num_tag_open'] = '<li>';            // default: '<div>'
            $config['num_tag_close'] = '</li>';            // default: '</div>'
            // Customizing the Last Link
            $config['last_link'] = 'Last';        // default: 'Last'
            $config['last_tag_open'] = '<li>';            // default: '<div>'
            $config['last_tag_close'] = '</li>';            // default: '</div>'


            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        // Get the results
        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array('cat_id' => $row['cat_id'], 'cat_name' => $row['cat_name'], 'cat_desc' => $row['cat_desc'], 'cat_created_by' => $row['cat_created_by'], 'cat_remark' => $row['cat_remark'], 'cat_deleted' => $row['cat_deleted'], 'cat_created_date' => $row['cat_created_date'],);
        }
        $this->db->flush_cache();
        return $temp_result;
    }


    function search($keyword, $page = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('cat_id,cat_name,cat_desc,cat_created_by,cat_remark,cat_deleted,cat_created_date');
        $this->db->from('categories');


        // Delete this line after setting up the search conditions
        die('Please see models/model_categories.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search
         *  or create advanced search conditions here
         */
        $this->db->where('field_name_to_search LIKE "%' . $keyword . '%"');

        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = '/categories/search/' . $keyword . '/';
            $config['uri_segment'] = 4;
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array('cat_id' => $row['cat_id'], 'cat_name' => $row['cat_name'], 'cat_desc' => $row['cat_desc'], 'cat_created_by' => $row['cat_created_by'], 'cat_remark' => $row['cat_remark'], 'cat_deleted' => $row['cat_deleted'], 'cat_created_date' => $row['cat_created_date'],);
        }
        $this->db->flush_cache();
        return $temp_result;
    }


    /**
     *  Some utility methods
     */
    function fields($withID = FALSE)
    {
        $fs = array('cat_id' => lang('cat_id'), 'cat_name' => lang('cat_name'), 'cat_desc' => lang('cat_desc'), 'cat_created_by' => lang('cat_created_by'), 'cat_remark' => lang('cat_remark'), 'cat_deleted' => lang('cat_deleted'), 'cat_created_date' => lang('cat_created_date'));

        if ($withID == FALSE) {
            unset($fs[0]);
        }
        return $fs;
    }


    function pagination($bool)
    {
        $this->pagination_enabled = ($bool === TRUE) ? TRUE : FALSE;
    }


    /**
     *  Parses the table data and look for enum values, to match them with language variables
     */
    function metadata()
    {
        $this->load->library('explain_table');

        $metadata = $this->explain_table->parse('categories');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

    /**
     * counts all of categories
     */
    function categoriesCount()
    {
        $this->db->from('categories');
        return $this->db->count_all_results();
    }
}
