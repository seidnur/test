<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property string message
 */
class Import extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('template');
        $this->load->model('model_import');
    }


    /**
     *  LISTS MODEL DATA INTO A TABLE
     */
    function index($page = 0)
    {
        $this->model_import->pagination(TRUE);
        $data_info = $this->model_import->lister($page);
        $fields = $this->model_import->fields(TRUE);
        $todayImports = $this->model_import->filterbyDate($this->currentDate);

        $this->template->assign('pager', $this->model_import->pager);
        $this->template->assign('import_fields', $fields);
        $this->template->assign('import_data', $data_info);
        $this->template->assign('this_day_imports', $todayImports);

        $this->template->assign('import_data', $data_info);
        $this->template->assign('table_name', 'import');
        $this->template->assign('template', 'list_import');

        $this->template->display('frame_admin.tpl');
    }


    /**
     *  SHOWS A RECORD VIEW
     */
    function show($id)
    {
        $data = $this->model_import->get($id);
        $fields = $this->model_import->fields(TRUE);


        $this->template->assign('id', $id);
        $this->template->assign('import_fields', $fields);
        $this->template->assign('import_data', $data);
        $this->template->assign('table_name', 'Import');
        $this->template->assign('template', 'show_import');
        $this->template->display('frame_admin.tpl');
    }


    /**
     *  SHOWS A FROM, AND HANDLES SAVING IT
     */
    function create($id = false)
    {
        $this->load->library('form_validation');

        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $fields = $this->model_import->fields();
                $items_set = $this->model_import->related_items();

                $this->template->assign('related_items', $items_set);


                $this->template->assign('action_mode', 'create');
                $this->template->assign('import_fields', $fields);
                $this->template->assign('metadata', $this->model_import->metadata());
                $this->template->assign('table_name', 'Import');
                $this->template->assign('template', 'form_import');
                $this->template->display('frame_admin.tpl');
                break;

            /**
             *  Insert data TO import table
             */
            case 'POST':
                $fields = $this->model_import->fields();

                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('imp_item_id', lang('imp_item_id'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('imp_item_amount', lang('imp_item_amount'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('imp_sale_itm_unit_price', lang('imp_sale_itm_unit_price'), 'required|numeric');
                $this->form_validation->set_rules('imp_date', lang('imp_date'), 'required');
                $this->form_validation->set_rules('imp_remark', lang('imp_remark'), 'max_length[250]');
                $this->form_validation->set_rules('imp_deleted', lang('imp_deleted'), 'max_length[4]');

                $data_post['imp_item_id'] = $this->input->post('imp_item_id');
                $data_post['imp_sold_amount'] = 0;
                $data_post['imp_item_amount'] = $this->input->post('imp_item_amount');
                $data_post['imp_available_amount'] = $this->input->post('imp_item_amount');
                $data_post['imp_sale_itm_unit_price'] = $this->input->post('imp_sale_itm_unit_price');
                $data_post['imp_min_sale_price'] = $this->input->post('imp_min_sale_price');
                $data_post['imp_sub_total'] = $this->input->post('imp_sale_itm_unit_price') * $this->input->post('imp_item_amount');
                $data_post['imp_date'] = $this->input->post('imp_date');
                $data_post['imp_inserted_by'] = $this->user;
                $data_post['imp_remark'] = $this->input->post('imp_remark');
                $data_post['imp_Last_updated_by'] = $this->user;
                $data_post['imp_Last_update'] = $this->currentDate;
                $data_post['imp_deleted'] = 0;

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();

                    $items_set = $this->model_import->related_items();

                    $this->template->assign('related_items', $items_set);

                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('import_data', $data_post);
                    $this->template->assign('import_fields', $fields);
                    $this->template->assign('metadata', $this->model_import->metadata());
                    $this->template->assign('table_name', 'Import');
                    $this->template->assign('template', 'form_import');
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    if ($data_post['imp_sale_itm_unit_price'] > $data_post['imp_min_sale_price']) {
                        $this->template->assign('errors', lang('import_price_exceedes_sale_price'));
                        $errors = validation_errors();

                        $items_set = $this->model_import->related_items();

                        $this->template->assign('related_items', $items_set);

                        $this->template->assign('action_mode', 'create');
                        $this->template->assign('import_data', $data_post);
                        $this->template->assign('import_fields', $fields);
                        $this->template->assign('metadata', $this->model_import->metadata());
                        $this->template->assign('table_name', 'Import');
                        $this->template->assign('template', 'form_import');

                        $this->message = "Item import not successfull";
                        $this->set_message($this->message);
                        $this->template->display('frame_admin.tpl');

                    } else {
                        $insert_id = $this->model_import->insert($data_post);
                        $this->message = "Item imported successfully";
                        $this->set_message($this->message);
                        redirect('import');


                    }
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
        $this->load->library('form_validation');

        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $this->model_import->raw_data = TRUE;
                $data = $this->model_import->get($id);
                $fields = $this->model_import->fields();
                $items_set = $this->model_import->related_items();
                $this->template->assign('related_items', $items_set);

                $this->template->assign('action_mode', 'edit');
                $this->template->assign('import_data', $data);
                $this->template->assign('import_fields', $fields);
                $this->template->assign('metadata', $this->model_import->metadata());
                $this->template->assign('table_name', 'Import');
                $this->template->assign('template', 'form_import');
                $this->template->assign('record_id', $id);
                $this->template->display('frame_admin.tpl');
                break;

            case 'POST':

                $fields = $this->model_import->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('imp_item_id', lang('imp_item_id'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('imp_item_amount', lang('imp_item_amount'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('imp_sale_itm_unit_price', lang('imp_sale_itm_unit_price'), 'required|numeric');
                $this->form_validation->set_rules('imp_min_sale_price', lang('imp_min_sale_price'), 'required|numeric');
                $this->form_validation->set_rules('imp_date', lang('imp_date'), 'required');
                $this->form_validation->set_rules('imp_remark', lang('imp_remark'), 'required');
                $this->form_validation->set_rules('imp_deleted', lang('imp_deleted'), 'max_length[4]');


                $data_post['imp_item_id'] = $this->input->post('imp_item_id');
                $data_post['imp_sold_amount'] = $this->input->post('imp_sold_amount');
                $data_post['imp_item_amount'] = $this->input->post('imp_item_amount');
                $data_post['imp_available_amount'] = $this->input->post('imp_available_amount');
                $data_post['imp_sale_itm_unit_price'] = $this->input->post('imp_sale_itm_unit_price');
                $data_post['imp_min_sale_price'] = $this->input->post('imp_min_sale_price');
                $data_post['imp_sub_total'] = $this->input->post('imp_sale_itm_unit_price') * $this->input->post('imp_item_amount');
                $data_post['imp_date'] = $this->input->post('imp_date');

                $data_post['imp_inserted_by'] =  $this->user;
          // $data_post['cat_created_date'] = $this->currentDate;

              
                $data_post['imp_remark'] = $this->input->post('imp_remark');
                $data_post['imp_Last_updated_by'] = $this->input->post('imp_Last_updated_by');
                $data_post['imp_Last_update'] = $this->input->post('imp_Last_update');
                $data_post['imp_deleted'] = $this->input->post('imp_deleted');

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();
                    $items_set = $this->model_import->related_items();
                    $this->template->assign('related_items', $items_set);
                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('errors', $errors);
                    $this->template->assign('import_data', $data_post);
                    $this->template->assign('import_fields', $fields);
                    $this->template->assign('metadata', $this->model_import->metadata());
                    $this->template->assign('table_name', 'Import');
                    $this->template->assign('template', 'form_import');
                    $this->template->assign('record_id', $id);
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    if ($data_post['imp_sale_itm_unit_price'] > $data_post['imp_min_sale_price']) {
                        $this->template->assign('errors', lang('import_price_exceedes_sale_price'));

                    } else {
                        $this->model_import->update($id, $data_post);
                    }
                    redirect('import/show/' . $id);
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
                $this->model_import->delete($id);
                redirect($_SERVER['HTTP_REFERER']);
                break;

            case 'POST':
                $this->model_import->delete($this->input->post('delete_ids'));
                redirect($_SERVER['HTTP_REFERER']);
                break;
        }
    }
}
