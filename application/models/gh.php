<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_import extends CI_Model
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
         *     - TRUE:  just the field names of the import table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false)
    {
        $select_statement = ($this->raw_data) ? 'imp_id as itm_name,imp_item_id,imp_sold_amount,imp_item_amount,
        imp_available_amount,imp_sale_itm_unit_price,imp_min_sale_price,imp_sub_total,user_name,
        imp_date,imp_inserted_by,imp_remark,imp_Last_updated_by,
        imp_Last_update,imp_deleted' : 'imp_id as itm_name,items.itm_name AS imp_item_id,
        imp_sold_amount,imp_item_amount,imp_available_amount,imp_sale_itm_unit_price,
        imp_min_sale_price,imp_sub_total,imp_date,imp_inserted_by,imp_remark,
        imp_Last_updated_by,imp_Last_update,imp_deleted,user_name';
        $this->db->select($select_statement);
        $this->db->from('import');
        $this->db->join('items', 'imp_item_id = itm_id', 'left');
        $this->db->join('users', 'user_emp_id = imp_Last_updated_by', 'left');
        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            $this->db->where('imp_id', $id);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array('imp_id' => $row['itm_name'], 'imp_item_id' => $row['imp_item_id'],
                'imp_sold_amount' => $row['imp_sold_amount'], 'user_name' => $row['user_name'],
                'imp_item_amount' => $row['imp_item_amount'],
                'imp_available_amount' => $row['imp_available_amount'],
                'imp_sale_itm_unit_price' => $row['imp_sale_itm_unit_price'],
                'imp_min_sale_price' => $row['imp_min_sale_price'],
                'imp_sub_total' => $row['imp_sub_total'],
                'imp_date' => $row['imp_date'],
                'imp_inserted_by' => $row['imp_inserted_by'],
                'imp_remark' => $row['imp_remark'],
                'imp_Last_updated_by' => $row['imp_Last_updated_by'],
                'imp_Last_update' => $row['imp_Last_update'],
                'imp_deleted' => $row['imp_deleted'],);
        } else {
            return array();
        }
    }

    function import_by_item($id, $get_one = false)
    {
        $select_statement = 'imp_id,items.itm_name AS imp_item_id,imp_sold_amount,imp_item_amount,imp_available_amount,imp_sale_itm_unit_price,imp_min_sale_price,
            imp_sub_total,imp_date,imp_inserted_by,imp_remark,imp_Last_updated_by,imp_Last_update,imp_deleted';
        $this->db->select($select_statement);
        $this->db->from('import');
        $this->db->join('items', 'imp_item_id = itm_id', 'left');
        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            $this->db->where('imp_item_id', $id);
            $this->db->where('imp_available_amount>', 0);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();

        } else {
            return array();
        }
    }

    function insert($data)
    {
        $this->db->insert('import', $data);
        return $this->db->insert_id();
    }

    function update($id, $data)
    {
        $this->db->where('imp_id', $id);
        $this->db->update('import', $data);
    }

    function delete($id)
    {
        if (is_array($id)) {
            $this->db->where_in('imp_id', $id);
        } else {
            $this->db->where('imp_id', $id);
        }
        $this->db->delete('import');
    }

    function status()
    {
        //item status
        $this->db->select('imp_available_amount');
        $status = $this->db->get('import');
        return $status->result_array();
    }
    function getStatus($item){
        $this->db->select('imp_item_id,itm_id as itm_name,imp_sold_amount,
        imp_item_amount,imp_available_amount,
        sale_itm_id,sale_item_amount,profit,sold_price,Sale_sub_total');
        $this->db->where('itm_id',$item);
        $this->db->from('items');
        $this->db->join('import', 'imp_item_id = itm_id', 'left');
        $this->db->join('sales', 'sale_itm_id = itm_id', 'left');
        $status=$this->db->get();
        return $status->result_array();
    }
    function lister($page = FALSE, $impdate = false)
    {
        $this->db->start_cache();
        $this->db->select('imp_id as itm_name,imp_item_id as itm_name,imp_item_id,imp_sold_amount,imp_item_amount,
			imp_available_amount,imp_sale_itm_unit_price,imp_min_sale_price,imp_sub_total,
			imp_date,imp_inserted_by,imp_remark,imp_Last_updated_by,imp_Last_update,imp_deleted');
        $this->db->from('import');
        $this->db->order_by('imp_date', 'Desc');
        $this->db->where('imp_available_amount >', 0);
        if ($impdate) {
            $this->db->where('imp_date', $impdate);
        }
        $this->db->join('items', 'imp_item_id = itm_id', 'left');

        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'import/index/';
            $config['uri_segment'] = 3;
            $config['cur_tag_open'] = '<span class="current">';
            $config['cur_tag_close'] = '</span>';
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;

            // Customizing the First Link
            $config['first_link'] = 'First;';        // default: 'First'
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
            $config['last_link'] = 'Last;';        // default: 'Last'
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
            $temp_result[] = array('imp_id' => $row['itm_name'],
                'imp_item_id' => $row['imp_item_id'],
                'imp_sold_amount' => $row['imp_sold_amount'],
                'imp_item_amount' => $row['imp_item_amount'],
                'imp_available_amount' => $row['imp_available_amount'],
                'imp_sale_itm_unit_price' => $row['imp_sale_itm_unit_price'],
                'imp_min_sale_price' => $row['imp_min_sale_price'],
                'imp_sub_total' => $row['imp_sub_total'],
                'imp_date' => $row['imp_date'],
                'imp_inserted_by' => $row['imp_inserted_by'],
                'imp_remark' => $row['imp_remark'],
                'imp_Last_updated_by' => $row['imp_Last_updated_by'],
                'imp_Last_update' => $row['imp_Last_update'],
                'imp_deleted' => $row['imp_deleted'],);
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    function search($keyword, $page = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('imp_id,items.itm_name AS imp_item_id,imp_sold_amount,imp_item_amount,imp_available_amount,imp_sale_itm_unit_price,imp_min_sale_price,imp_sub_total,imp_date,imp_inserted_by,imp_remark,imp_Last_updated_by,imp_Last_update,imp_deleted');
        $this->db->from('import');
        $this->db->join('items', 'imp_item_id = itm_id', 'left');
        // Delete this line after setting up the search conditions
        die('Please see models/model_import.php for setting up the search method.');
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
            $config['base_url'] = '/import/search/' . $keyword . '/';
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
            $temp_result[] = array('imp_id' => $row['imp_id'], 'imp_item_id' => $row['imp_item_id'], 'imp_sold_amount' => $row['imp_sold_amount'], 'imp_item_amount' => $row['imp_item_amount'], 'imp_available_amount' => $row['imp_available_amount'], 'imp_sale_itm_unit_price' => $row['imp_sale_itm_unit_price'], 'imp_min_sale_price' => $row['imp_min_sale_price'], 'imp_sub_total' => $row['imp_sub_total'], 'imp_date' => $row['imp_date'], 'imp_inserted_by' => $row['imp_inserted_by'], 'imp_remark' => $row['imp_remark'], 'imp_Last_updated_by' => $row['imp_Last_updated_by'], 'imp_Last_update' => $row['imp_Last_update'], 'imp_deleted' => $row['imp_deleted'],);
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    function related_items()
    {
        $this->db->select('itm_id AS items_id, itm_name AS items_name');
        $rel_data = $this->db->get('items');
        return $rel_data->result_array();
    }

    /**
     *  Some utility methods
     */
    function fields($withID = FALSE)
    {
        $fs = array('imp_id' => lang('imp_id'), 'imp_item_id' => lang('imp_item_id'),
            'imp_sold_amount' => lang('imp_sold_amount'), 'imp_item_amount' => lang('imp_item_amount'),
            'imp_available_amount' => lang('imp_available_amount'),
            'imp_sale_itm_unit_price' => lang('imp_sale_itm_unit_price'),
            'imp_min_sale_price' => lang('imp_min_sale_price'), 'imp_sub_total' => lang('imp_sub_total'),
            'imp_date' => lang('imp_date'), 'imp_inserted_by' => lang('imp_inserted_by'),
            'imp_remark' => lang('imp_remark'), 'imp_Last_updated_by' => lang('imp_Last_updated_by'),
            'imp_Last_update' => lang('imp_Last_update'), 'imp_deleted' => lang('imp_deleted'),
            'sell_quantity' => lang('sell_quantity'), 'sell_price' => lang('sell_price'), 'user_name' => lang('user_name'),
            'save_sell' => lang('save_sell'));
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
        $metadata = $this->explain_table->parse('import');
        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

    /**
     * @param $today
     * @param bool $start
     * @param bool $end
     * returns no. of imports for today of starting from startdate or up to end date or between start date and enddate
     */
    function filterbyDate($date = false, $start_date = false, $end_date = false)
    {
        $this->db->select('count(DISTINCT imp_id)');
        if ($date) {
            $this->db->where('imp_date', $date);
        }
        if ($start_date) {
            $this->db->where('imp_date >', $start_date);
        } elseif ($start_date && $end_date) {
            $this->db->where('imp_date >', $start_date);
            $this->db->where('imp_date <', $end_date);
        }
        $this->db->where('imp_deleted', 0);
        $this->db->from('import');
        return $this->db->count_all_results();
    }
}
