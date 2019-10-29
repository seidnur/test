<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_categories');
        $this->load->helper('form');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('model_auth');
    }

    /**
     *  LISTS MODEL DATA INTO A TABLE
     */
    function index($page = 0)
    {
        $this->model_categories->pagination(TRUE);
        $data_info = $this->model_categories->lister($page);
        $fields = $this->model_categories->fields(TRUE);
        $this->template->assign('pager', $this->model_categories->pager);
        $this->template->assign('categories_fields', $fields);
        $this->template->assign('categories_data', $data_info);
        $this->template->assign('table_name', 'categories');
        $this->template->assign('template', 'list_categories');
        $this->template->display('frame_admin.tpl');
    }

    /**
     *  SHOWS A RECORD VIEW
     */
    function show($id)
    {
        $data = $this->model_categories->get($id);
        $fields = $this->model_categories->fields(TRUE);
        $this->template->assign('id', $id);
        $this->template->assign('categories_fields', $fields);
        $this->template->assign('categories_data', $data);
        $this->template->assign('table_name', 'Categories');
        $this->template->assign('template', 'show_categories');
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
                $fields = $this->model_categories->fields();
                $this->template->assign('action_mode', 'create');
                $this->template->assign('categories_fields', $fields);
                $this->template->assign('metadata', $this->model_categories->metadata());
                $this->template->assign('table_name', 'Categories');
                $this->template->assign('template', 'form_categories');
                $this->template->display('frame_admin.tpl');
                break;
            /**
             *  Insert data TO categories table
             */
            case 'POST':
                $fields = $this->model_categories->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('cat_name', lang('cat_name'), 'required|max_length[20]');
                $this->form_validation->set_rules('cat_desc', lang('cat_desc'), 'required');
// $this->form_validation->set_rules( 'cat_created_by', lang('cat_created_by'), 'required|max_length[25]' );
                $this->form_validation->set_rules('cat_remark', lang('cat_remark'), 'required');
                $this->form_validation->set_rules('cat_deleted', lang('cat_deleted'), '11');
                $data_post['cat_name'] = $this->input->post('cat_name');
                $data_post['cat_desc'] = $this->input->post('cat_desc');
                $data_post['cat_created_by'] = $this->user;
                $data_post['cat_created_date'] = $this->currentDate;
                $data_post['cat_remark'] = $this->input->post('cat_remark');
                $data_post['cat_deleted'] = $this->input->post('cat_deleted');


                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();
                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('categories_data', $data_post);
                    $this->template->assign('categories_fields', $fields);
                    $this->template->assign('metadata', $this->model_categories->metadata());
                    $this->template->assign('table_name', 'Categories');
                    $this->template->assign('template', 'form_categories');
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $insert_id = $this->model_categories->insert($data_post);
                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('categories_data', $data_post);
                    $this->template->assign('categories_fields', $fields);
                    $this->template->assign('message', lang('message'));
                    $this->template->assign('metadata', $this->model_categories->metadata());
                    $this->template->assign('table_name', 'Categories');
                    $this->template->assign('template', 'form_categories');
                    $this->template->display('frame_admin.tpl');
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
                $this->model_categories->raw_data = TRUE;
                $data = $this->model_categories->get($id);
                $fields = $this->model_categories->fields();
                $this->template->assign('action_mode', 'edit');
                $this->template->assign('categories_data', $data);
                $this->template->assign('categories_fields', $fields);
                $this->template->assign('metadata', $this->model_categories->metadata());
                $this->template->assign('table_name', 'Categories');
                $this->template->assign('template', 'form_categories');
                $this->template->assign('record_id', $id);
                $this->template->display('frame_admin.tpl');
                break;
            case 'POST':
                $fields = $this->model_categories->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('cat_name', lang('cat_name'), 'required|max_length[20]');
                $this->form_validation->set_rules('cat_desc', lang('cat_desc'), 'required');
                $this->form_validation->set_rules('cat_remark', lang('cat_remark'), 'required');
                $this->form_validation->set_rules('cat_deleted', lang('cat_deleted'), '11');
                $data_post['cat_name'] = $this->input->post('cat_name');
                $data_post['cat_desc'] = $this->input->post('cat_desc');
                $data_post['cat_remark'] = $this->input->post('cat_remark');
                $data_post['cat_deleted'] = $this->input->post('cat_deleted');
                $data_post['cat_created_by'] = $this->user;
                $data_post['cat_created_date'] = $this->currentDate;
                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();
                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('errors', $errors);
                    $this->template->assign('categories_data', $data_post);
                    $this->template->assign('categories_fields', $fields);
                    $this->template->assign('metadata', $this->model_categories->metadata());
                    $this->template->assign('table_name', 'Categories');
                    $this->template->assign('template', 'form_categories');
                    $this->template->assign('record_id', $id);
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $this->model_categories->update($id, $data_post);
                    $this->template->assign('message', lang('editcategories'));
                    $data = $this->model_categories->get($id);
                    $fields = $this->model_categories->fields(TRUE);
                    $this->template->assign('id', $id);
                    $this->template->assign('categories_fields', $fields);
                    $this->template->assign('categories_data', $data);
                    $this->template->assign('table_name', 'Categories');
                    $this->template->assign('template', 'show_categories');
                    $this->template->display('frame_admin.tpl');
                }
                break;
        }
    }

    /**
     *  DELETE RECORD(S)
     *  The 'delete' method of the model accepts int and array
     */
    function delete($id = FALSE,$page=0)
    {
        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':

                $this->template->assign('message', lang('deletecategories'));
                $this->model_categories->pagination(TRUE);
                $data_info = $this->model_categories->lister($page);
                $fields = $this->model_categories->fields(TRUE);
                $this->template->assign('pager', $this->model_categories->pager);
                $this->template->assign('categories_fields', $fields);
                $this->template->assign('categories_data', $data_info);
                $this->template->assign('table_name', 'categories');
                $this->template->assign('template', 'list_categories');
                $this->template->display('frame_admin.tpl');
                break;
        }
    }
}
