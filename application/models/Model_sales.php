<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_sales extends CI_Model
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
         *     - TRUE:  just the field names of the sales table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false)
    {
        $meta = $this->metadata();
        $select_statement = ($this->raw_data) ? 'sale_itm_id,items.itm_name,sale_item_amount,
			    Date_sold,soled_by,sale_remark,
			    sold_price,profit,sale_vat,sale_payment_option,sale_buyer_info,Sale_sub_total,sale_id,returned' : 'items.itm_name AS sale_itm_id,sale_item_amount,Date_sold,
			    soled_by,profit,sale_vat,sale_remark,sold_price,sale_payment_option,
			    sale_buyer_info,Sale_sub_total,sale_id,returned';
        $this->db->select($select_statement);
        $this->db->from('sales');

        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            $this->db->where('sale_id', $id);
        }
        $this->db->join('items', 'sales.sale_itm_id=items.itm_id', 'left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array('sale_itm_id' => $row['sale_itm_id'], 'sale_item_amount' => $row['sale_item_amount'], 'Date_sold' => $row['Date_sold'], 'soled_by' => $row['soled_by'], 'sale_remark' => $row['sale_remark'], 'sold_price' => $row['sold_price'], 'sale_vat' => $row['sale_vat'], 'profit' => $row['profit'], 'sale_payment_option' => $row['sale_payment_option'], 'sale_buyer_info' => $row['sale_buyer_info'], 'Sale_sub_total' => $row['Sale_sub_total'], 'sale_id' => $row['sale_id'], 'returned' => $row['returned'],);
        } else {
            return array();
        }
    }


    //function insert ( $data,$amount,$available )
    function insert($data, $impdata)
    {

        $this->db->insert('sales', $data);
        if ($impdata) {
            $this->db->where('imp_id', $data['sale_imp_id']);
            $this->db->update('import', $impdata);
        }
        return $this->db->insert_id();
    }


    function update($id, $data)
    {
        $this->db->where('sale_id', $id);
        $this->db->update('sales', $data);
        return ($this->db->affected_rows() > 0) ? $id : $this->db->error();

    }


    function delete($id)
    {
        $this->raw_data = TRUE;
        $sales_data = $this->get($id);

        $returned = $sales_data['returned'];
        if ($returned == 0) {
            // restore item available amount
            $sold_item = $sales_data['sale_itm_id'];
            $itm_available_quantity = $this->getAvailableAmount($sold_item);
            $quantity = $sales_data['sale_item_amount'];
            //$item_data= array('itm_available_quantity +' =>$quantity);
            $this->db->set('itm_available_quantity', $itm_available_quantity + $quantity);
            $this->db->where('itm_id', $sold_item);
            $this->db->update('items');
            // set sell to cancelled
            $sales_update = array('returned' => 1,);
            $this->db->where('sale_id', $id);
            $this->db->update('sales', $sales_update);
        } else {
            return array('returned' => TRUE, 'message' => "Sale is already cancelled", "err" => "duplicate cancellation");
        }

        // if( is_array( $id ) )
        // {
        //     $this->db->where_in('sale_id', $id );
        // }
        // else
        // {
        //     $this->db->where('sale_id', $id );
        // }
        return $sales_data;
    }


    function lister($page = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('items.itm_name AS sale_itm_id,sale_item_amount, profit,sale_vat,
					Date_sold,soled_by,sale_remark,
					sold_price,sale_payment_option,sale_buyer_info,Sale_sub_total,sale_id');
        $this->db->from('sales');
        $this->db->order_by('Date_sold', 'Desc');
        $this->db->where('returned', 0);

        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'sales/index/';
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

        $this->db->join('items', 'sales.sale_itm_id=items.itm_id', 'left');
        // Get the results
        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array('sale_itm_id' => $row['sale_itm_id'], 'sale_item_amount' => $row['sale_item_amount'], 'Date_sold' => $row['Date_sold'], 'soled_by' => $row['soled_by'], 'sale_remark' => $row['sale_remark'], 'sold_price' => $row['sold_price'], 'profit' => $row['profit'], 'sale_vat' => $row['sale_vat'],

                'sale_payment_option' => $row['sale_payment_option'], 'sale_buyer_info' => $row['sale_buyer_info'], 'Sale_sub_total' => $row['Sale_sub_total'], 'sale_id' => $row['sale_id'],);
        }
        $this->db->flush_cache();
        return $temp_result;
    }


    function search($keyword, $page = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('items.itm_name AS sale_itm_id,profit,sale_item_amount,Date_sold,soled_by,
				sale_remark,sold_price,sale_payment_option,sale_buyer_info,Sale_sub_total,sale_id');
        $this->db->from('sales');


        // Delete this line after setting up the search conditions
        // die('Please see models/model_sales.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search
         *  or create advanced search conditions here
         */
        $this->db->join('items', 'sale_itm_id=itm_id', 'left');
        $this->db->where('sale_itm_id LIKE "%' . $keyword . '%"');
        $this->db->or_where('sale_itm_id LIKE "%' . $keyword . '%"');

        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = '/sales/search/' . $keyword . '/';
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
            $temp_result[] = array('sale_itm_id' => $row['sale_itm_id'],
                'sale_item_amount' => $row['sale_item_amount'],
                'Date_sold' => $row['Date_sold'],
                'soled_by' => $row['soled_by'],
                'sale_remark' => $row['sale_remark'],
                'sold_price' => $row['sold_price'],
                'profit' => $row['profit'],
                'sale_payment_option' => $row['sale_payment_option'],
                'Sale_sub_total' => $row['Sale_sub_total'],
                'sale_id' => $row['sale_id']
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }
    /**
     *  Some utility methods
     */
    function fields($withID = FALSE)
    {
        $fs = array('sale_itm_id' => lang('sale_itm_id'),
            'sale_item_amount' => lang('sale_item_amount'),
            'Date_sold' => lang('Date_sold'),
            'soled_by' => lang('soled_by'),
            'sale_remark' => lang('sale_remark'),
            'sold_price' => lang('sold_price'),
            'sale_payment_option' => lang('sale_payment_option'),
            'cheque' => lang('cheque'),
            'cash' => lang('cash'),
            'bank_transfer' => lang('bank_transfer'),
            'sale_buyer_info' => lang('sale_buyer_info'),
            'sale_vat' => lang('sale_vat'),
            'profit' => lang('profit'),
            'Sale_sub_total' => lang('Sale_sub_total'),
            'sale_id' => lang('sale_id'));

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

        $metadata = $this->explain_table->parse('sales');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

    /**
     *  Parses the table data and look for enum values, to match them with language variables
     */
    function related_items()
    {
        $this->db->select('itm_id AS items_id, itm_name AS items_name,itm_available_quantity as quantity');
        // $this->db->where('itm_available_quantity >',0);
        $rel_data = $this->db->get('items');
        return $rel_data->result_array();
    }

    function getAvailableAmount($item)
    {
        $available = 0;
        $this->db->select('itm_available_quantity');
        $this->db->where('itm_id', $item);
        $this->db->from('items');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $available = $row->itm_available_quantity;
        }
        return $available;
    }

    function salesCount($date = false, $start_date = false, $end_date = false)
    {
        $this->db->start_cache();
        $this->db->select('count(DISTINCT sale_id)');

        if ($date){
            $this->db->where('Date_sold', $date);
        }
        if ($end_date && !$start_date){
            $this->db->select('count(DISTINCT sale_id)');
            $this->db->where('Date_sold <=', $end_date);
        }
        if($start_date && !$end_date){
            $this->db->where('Date_sold >', $start_date);
        }
        if ($start_date && $end_date){
               $this->db->where('Date_sold >=', $start_date);
               $this->db->where('Date_sold <=', $end_date);
        }
        $this->db->where('returned', 0);
        $this->db->from('sales');
        $this->db->flush_cache();
        return $this->db->count_all_results();
    }

    function import_lister($page = FALSE)
    {

        $this->db->start_cache();
        $this->db->select('imp_id,imp_item_id as sale_itm_id,items.itm_name AS imp_item_id,imp_sold_amount,imp_item_amount,
					       imp_available_amount,imp_sale_itm_unit_price,imp_min_sale_price,imp_sub_total,
					       imp_date,imp_inserted_by,imp_remark,imp_Last_updated_by,imp_Last_update');

        $this->db->from('import');
        $this->db->where('imp_deleted', 0);
        $this->db->where('imp_available_amount >', 0);
        $this->db->order_by('imp_date', 'Desc');
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

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        // Get the results
        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array('imp_id' => $row['imp_id'], 'imp_item_id' => $row['imp_item_id'], 'sale_itm_id' => $row['sale_itm_id'],

                'imp_sold_amount' => $row['imp_sold_amount'], 'imp_item_amount' => $row['imp_item_amount'], 'imp_available_amount' => $row['imp_available_amount'], 'imp_sale_itm_unit_price' => $row['imp_sale_itm_unit_price'], 'imp_min_sale_price' => $row['imp_min_sale_price'], 'imp_sub_total' => $row['imp_sub_total'], 'imp_date' => $row['imp_date'], 'imp_inserted_by' => $row['imp_inserted_by'], 'imp_remark' => $row['imp_remark'], 'imp_Last_updated_by' => $row['imp_Last_updated_by'], 'imp_Last_update' => $row['imp_Last_update'],);
        }
        $this->db->flush_cache();
        return $temp_result;
    }


}
