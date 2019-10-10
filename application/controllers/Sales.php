<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends MY_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_sales');
        $this->load->model('Model_items');
        $this->load->model('model_import');
        $this->load->helper('form');
        $this->load->helper('language');
        $this->load->helper('url');
    }

    /**
     *  LISTS MODEL DATA INTO A TABLE
     */
    function index($page = 0)
    {
        $this->model_sales->pagination(TRUE);
        $data_info = $this->model_sales->lister($page);
        $fields = $this->model_sales->fields(TRUE);
        $todaySales = $this->model_sales->salesCount($this->currentDate);
        $thisWeek = date('Y-m-d', strtotime("-7 days"));
        $thisWeekSales = $this->model_sales->salesCount(false, $thisWeek, $this->currentDate);
        $thisMonth = date('Y-m-d', strtotime("-30 days"));
        $thisMonthSales = $this->model_sales->salesCount(false, $thisMonth, $this->currentDate);

        $thisYear = date('Y-m-d', strtotime("-365 days"));
        $thisYearSales = $this->model_sales->salesCount(false, $thisYear, $this->currentDate);

        $this->template->assign('this_week_sales', $thisWeekSales);
        $this->template->assign('this_day_sales', $todaySales);
        $this->template->assign('this_month_sales', $thisMonthSales);
        $this->template->assign('this_year_sales', $thisYearSales);


        $this->template->assign('this_week', date('w'));
        $this->template->assign('this_day', date('d'));
        $this->template->assign('this_month', date('m'));
        $this->template->assign('this_year', date('Y'));

        $searchParams = array(array("lg_name", 'number'));
        $searchParams = $this->getSearchSetting();
        $this->template->assign('search_form', $this->displaySearchForm($searchParams));
        $this->template->assign('pager', $this->model_sales->pager);
        $this->template->assign('sales_fields', $fields);
        $this->template->assign('sales_data', $data_info);
        $this->template->assign('table_name', 'Sales');
        $this->template->assign('template', 'list_sales');
        $this->template->display('frame_admin.tpl');
    }

    function listGrid()
    {
        $data_info = $this->Model_items->lister();
        $resultObject = array(
            "odata.metadata" => "",
            "value" => $data_info
        );
        echo json_encode($resultObject);
    }

    function sale($page = 0)
    {
        $this->model_sales->pagination(TRUE);
        $data_info = $this->Model_items->lister($page);
        $fields = $this->Model_items->fields(TRUE);
        $this->template->assign('pager', $this->model_sales->pager);
        $this->template->assign('sales_fields', $fields);
        $this->template->assign('sales_data', $data_info);
        $this->template->assign('table_name', 'sales');
        $this->template->assign('template', 'editable_list_sales');
        $this->template->display('frame_admin.tpl');
    }

    /**
     *  SHOWS A RECORD VIEW
     */
    function show($id)
    {
        $data = $this->model_sales->get($id);
        $fields = $this->model_sales->fields(TRUE);
        $this->template->assign('id', $id);
        $this->template->assign('sales_fields', $fields);
        $this->template->assign('sales_data', $data);
        $this->template->assign('table_name', 'Sales');
        $this->template->assign('template', 'show_sales');
        $this->template->display('frame_admin.tpl');
    }

    /**
     *  SHOWS A FROM, AND HANDLES SAVING IT
     */
    function create($id = false)
    {
        $items_set = $this->model_sales->related_items();
        $imports_set = $this->model_sales->import_lister();

        $import_fields = $this->model_import->fields(TRUE);
        $this->template->assign('pager', $this->model_import->pager);


        $this->template->assign('import_data', $imports_set);
        $this->template->assign('import_fields', $import_fields);


        $this->template->assign('related_items', $items_set);

        $this->load->library('form_validation');
        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $fields = $this->model_sales->fields();
                $this->template->assign('action_mode', 'create');
                $this->template->assign('sales_fields', $fields);
                $this->template->assign('metadata', $this->model_sales->metadata());
                $this->template->assign('table_name', 'Sales');
//                $this->template->assign('template', 'form_sales');
                $this->template->assign('template', 'form_sale_item');
                $this->template->display('frame_admin.tpl');
                break;
            /**
             *  Insert data TO sales table
             */
            case 'POST':
                $fields = $this->model_sales->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('sale_itm_id', lang('sale_itm_id'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('imp_itm_unit_price', lang('imp_itm_unit_price'), 'max_length[50]numeric');

                $this->form_validation->set_rules('sell_price', lang('sell_price'), 'required|max_length[50]numeric');
                $this->form_validation->set_rules('sell_quantity', lang('sell_quantity'), 'required|max_length[50]integer');
                $this->form_validation->set_rules('sale_imp_id', lang('sale_imp_id'), 'required|max_length[50]integer');


                $data_post['sale_itm_id'] = $this->input->post('sale_itm_id');
                $data_post['sale_item_amount'] = $this->input->post('sell_quantity');
                $data_post['sale_imp_id'] = $this->input->post('sale_imp_id');
                $data_post['Date_sold'] = date('Y-m-d h:m:s');
                $data_post['soled_by'] = $this->user;
                echo  $this->input->post('imp_itm_unit_price');
                $data_post['sold_price'] = $this->input->post('sell_price');
                $data_post['profit'] = $this->input->post('sell_quantity')*($this->input->post('sell_price') - $this->input->post('imp_itm_unit_price'));
                $data_post['Sale_sub_total'] = intval($data_post['sale_item_amount']) * floatval($data_post['sold_price']);

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();
                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('sales_data', $data_post);
                    $this->template->assign('sales_fields', $fields);
                    $this->template->assign('metadata', $this->model_sales->metadata());
                    $this->template->assign('table_name', 'Sales');
                    $this->template->assign('template', 'form_sale_item');
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    // update table imports
                    //previously sold amount of item
                    $impdata['imp_sold_amount'] = intval($this->input->post('imp_itm_sold_amount')) + intval($data_post['sale_item_amount']);
                    //currently available amount of item
                    $impdata['imp_available_amount'] = intval($this->input->post('imp_itm_total_imported')) - intval($impdata['imp_sold_amount']);

                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('sales_data', $data_post);
                    $this->template->assign('sales_fields', $fields);
                    $this->template->assign('metadata', $this->model_sales->metadata());
                    $this->template->assign('table_name', 'Sales');
                    $this->template->assign('template', 'form_sale_item');
                    echo json_encode($data_post);

                    $insert_id = $this->model_sales->insert($data_post, $impdata);
                    $message = "<p clas='alert alert-success'>" . lang('item_sold') . "</p>";
                    $this->template->assign('success', $message);
                    $this->template->display('frame_admin.tpl');
                    header('location:' . $_SERVER['HTTP_REFERER']);
                    redirect('sales', "refresh");
                }
                break;
        }
    }

    /**
     *  DISPLAYS THE POPULATED FORM OF THE RECORD
     *  This method uses the same template as the create method
     */
    function edit($id = false)
    {
        $items_set = $this->model_sales->related_items();
        $this->template->assign('related_items', $items_set);
        $this->load->library('form_validation');
        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $this->model_sales->raw_data = TRUE;
                $data = $this->model_sales->get($id);
                $fields = $this->model_sales->fields();
                $this->template->assign('action_mode', 'edit');
                $this->template->assign('sales_data', $data);
                $this->template->assign('sales_fields', $fields);
                $this->template->assign('metadata', $this->model_sales->metadata());
                $this->template->assign('table_name', 'Sales');
                $this->template->assign('template', 'form_sales');
                $this->template->assign('record_id', $id);
                $this->template->display('frame_admin.tpl');
                break;
            case 'POST':
                $fields = $this->model_sales->fields();
                $available = $this->Model_items->getAvailableAmount($this->input->post('sale_itm_id'));
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('sale_itm_id', lang('sale_itm_id'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('sale_item_amount', lang('sale_item_amount'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('Date_sold', lang('Date_sold'), 'required');
                $this->form_validation->set_rules('sale_remark', lang('sale_remark'), 'required');
                $this->form_validation->set_rules('sold_price', lang('sold_price'), 'required|numeric');
                $this->form_validation->set_rules('sale_payment_option', lang('sale_payment_option'), 'required');
                $this->form_validation->set_rules('sale_buyer_info', lang('sale_buyer_info'), 'max_length[50]');
                $data_post['sale_itm_id'] = $this->input->post('sale_itm_id');
                $data_post['sale_item_amount'] = $this->input->post('sale_item_amount');
                $data_post['Date_sold'] = $this->input->post('Date_sold');
                $data_post['soled_by'] = $this->input->post('soled_by');
                $data_post['sale_remark'] = $this->input->post('sale_remark');
                $data_post['sold_price'] = $this->input->post('sold_price');
                $data_post['sale_payment_option'] = $this->input->post('sale_payment_option');
                $data_post['sale_buyer_info'] = $this->input->post('sale_buyer_info');
                $data_post['Sale_sub_total'] = $this->input->post('sale_item_amount') * $this->input->post('sold_price');
                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();
                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('errors', $errors);
                    $this->template->assign('sales_data', $data_post);
                    $this->template->assign('sales_fields', $fields);
                    $this->template->assign('metadata', $this->model_sales->metadata());
                    $this->template->assign('table_name', 'Sales');
                    $this->template->assign('template', 'form_sales');
                    $this->template->assign('record_id', $id);
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $this->model_sales->update($id, $data_post);
                    redirect('sales/show/' . $id);
                }
                break;
        }
    }

    /**
     *  DELETE RECORD(S)
     *  The 'delete' method of the model accepts int and array
     */
    function delete($id = FALSE)
    {
        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $confirmation = $this->model_sales->delete($id);
                echo json_encode($confirmation);
                  // redirect( $_SERVER['HTTP_REFERER'] );
                break;
            case 'POST':
                  //echo json_encode( $this->model_sales->delete( $this->input->post('delete_ids')));
                  // redirect( $_SERVER['HTTP_REFERER'] );
                break;
        }
    }

//START SETTINGS
    public function getSearchSetting()
    {
        $arrData = array();
        if (is_file(__DIR__ . '..\..\settings\search\Sales.json')) {
            $jsonData = file_get_contents(__DIR__ . '..\..\settings\search\sales.json');
            if ($jsonData) {
                $arrData = json_decode($jsonData, true);
            }
        }
        return $arrData;
    }
//START SEARCH

    /**
     *  SEARCH MODEL DATA INTO A TABLE
     */
    function search($searchWord = false, $page = 0)
    {
        $fields = $this->model_sales->fields(TRUE);
        $this->template->assign('sales_fields', $fields);
//search parameters CHANGEPARAM
        $searchParams = $this->getSearchSetting();

//$searchParams=array(array("",''));
        $keyword = $this->input->post("search") != '' ? $this->input->post("search") : $searchWord;

        $this->model_sales->pagination(TRUE);
//hide show all button on list page
        $this->template->assign('showall', 1);
//display search form
        $this->template->assign('search_form', $this->displaySearchForm($searchParams));
        $this->template->assign('pager', $this->model_sales->pager);
//START DISPLAY LIST ONLY
        $showRep = $this->input->post("showRep");
        if ($showRep) {
            $data_info = $this->model_sales->search($keyword, $page, $searchParams);

            // echo json_encode($data_info);
            $this->template->assign('sales_data', $data_info);
            $fields = $this->model_sales->fields(TRUE);
            $this->template->assign('sales_data_fields', $fields);
        }
//START DISPLAY LIST ONLY
        $this->template->assign('table_name', 'Sales');
        $this->template->assign('template', 'list_sales');
        $this->template->assign('page_title', "sales");
        $this->template->display('frame_admin.tpl');
    }

    function getItemDetails($id)
    {
        $data = $this->Model_items->get($id);
        echo json_encode($data);
    }

    function list_availables(){
        $selected_item=  $this->input->post('sale_itm_id');
        $items_set = $this->model_sales->related_items();
        $imports_set = $this->model_sales->import_lister();
        $imports_list = $this->model_sales->import_lister_by_item($selected_item);

        $import_fields = $this->model_import->fields(TRUE);
        $this->template->assign('import_data', $imports_set);
        $this->template->assign('import_fields', $import_fields);
        $this->template->assign('related_items', $items_set);
        $this->template->assign('selected_item', $selected_item);
        $fields = $this->model_sales->fields();
        $this->template->assign('action_mode', 'create');
        $this->template->assign('sales_fields', $fields);
        $this->template->assign('metadata', $this->model_sales->metadata());
        $this->template->assign('table_name', 'Sales');
        $this->template->assign('imports_list', $imports_list);
        $this->template->assign('template', 'form_sale_item');
        $this->template->display('frame_admin.tpl');
    }

}
