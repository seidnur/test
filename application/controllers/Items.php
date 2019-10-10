<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Items extends MY_controller
{
function __construct ()
{
parent::__construct();
$this->load->library('template');
$this->load->model('model_items');
$this->load->helper('form');
$this->load->helper('language');
$this->load->helper('url');
}
/**
*  LISTS MODEL DATA INTO A TABLE
*/
function index ($page = 0)
{
$this->model_items->pagination(TRUE);
$data_info = $this->model_items->lister($page);
$fields = $this->model_items->fields(TRUE);
$this->template->assign('pager', $this->model_items->pager);
$this->template->assign('items_fields', $fields);
$this->template->assign('items_data', $data_info);
$this->template->assign('table_name', 'Items');
$this->template->assign('template', 'list_items');
$this->template->display('frame_admin.tpl');
}
/**
*  SHOWS A RECORD VIEW
*/
function show ($id)
{
$data = $this->model_items->get($id);
$fields = $this->model_items->fields(TRUE);
$this->template->assign('id', $id);
$this->template->assign('items_fields', $fields);
$this->template->assign('items_data', $data);
$this->template->assign('table_name', 'item');
$this->template->assign('template', 'show_items');
$this->template->display('frame_admin.tpl');
}
/**
*  SHOWS A FROM, AND HANDLES SAVING IT
*/
function create ($id = false)
{
$this->load->library('form_validation');
switch ($_SERVER ['REQUEST_METHOD']) {
case 'GET':
$fields = $this->model_items->fields();
$brands_set = $this->model_items->related_brands();
$categories_set = $this->model_items->related_categories();
$this->template->assign('related_brands', $brands_set);
$this->template->assign('related_categories', $categories_set);
$this->template->assign('action_mode', 'create');
$this->template->assign('items_fields', $fields);
$this->template->assign('metadata', $this->model_items->metadata());
$this->template->assign('table_name', 'Items');
$this->template->assign('template', 'form_items');
$this->template->display('frame_admin.tpl');
break;
/**
*  Insert data TO items table
*/
case 'POST':
$fields = $this->model_items->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules('Itm_name', lang('Itm_name'), 'required|max_length[25]');
$this->form_validation->set_rules('brand_id', lang('brand_id'), 'required|max_length[11]|integer');
$this->form_validation->set_rules('itm_cat_id', lang('itm_cat_id'), 'required|max_length[11]|integer');
$this->form_validation->set_rules('itm_available_quantity', lang('itm_available_quantity'), 'integer');
$data_post['Itm_name'] = $this->input->post('Itm_name');
$data_post['itm_last_updated'] =date('Y-M-d');
$data_post['itm_last_updated_by'] = 1;
$data_post['itm_remark'] = $this->input->post('itm_remark');
$data_post['brand_id'] = $this->input->post('brand_id');
$data_post['itm_cat_id'] = $this->input->post('itm_cat_id');
$data_post['item_created_by'] =  $this->user;
$data_post['itm_date_created'] = $this->currentDate;
$data_post['itm_available_quantity'] = $this->input->post('itm_available_quantity');
if ($this->form_validation->run() == FALSE) {
$errors = validation_errors();
$brands_set = $this->model_items->related_brands();
$categories_set = $this->model_items->related_categories();
$this->template->assign('related_brands', $brands_set);
$this->template->assign('related_categories', $categories_set);
$this->template->assign('errors', $errors);
$this->template->assign('action_mode', 'create');
$this->template->assign('items_data', $data_post);
$this->template->assign('items_fields', $fields);
$this->template->assign('metadata', $this->model_items->metadata());
$this->template->assign('table_name', 'Items');
$this->template->assign('template', 'form_items');
$this->template->display('frame_admin.tpl');
} elseif ($this->form_validation->run() == TRUE) {
$insert_id = $this->model_items->insert($data_post);
redirect('items');
}
break;
}
}
/**
*  DISPLAYS THE POPULATED FORM OF THE RECORD
*  This method uses the same template as the create method
*/
function edit ($id = false)
{
$this->load->library('form_validation');
switch ($_SERVER ['REQUEST_METHOD']) {
case 'GET':
$this->model_items->raw_data = TRUE;
$data = $this->model_items->get($id);
$fields = $this->model_items->fields();
$brands_set = $this->model_items->related_brands();
$categories_set = $this->model_items->related_categories();
$this->template->assign('related_brands', $brands_set);
$this->template->assign('related_categories', $categories_set);
$this->template->assign('action_mode', 'edit');
$this->template->assign('items_data', $data);
$this->template->assign('items_fields', $fields);
$this->template->assign('metadata', $this->model_items->metadata());
$this->template->assign('table_name', 'Items');
$this->template->assign('template', 'form_items');
$this->template->assign('record_id', $id);
$this->template->display('frame_admin.tpl');
break;
case 'POST':
$fields = $this->model_items->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules('Itm_name', lang('Itm_name'), 'required|max_length[50]');
$this->form_validation->set_rules('brand_id', lang('brand_id'), 'required|max_length[11]|integer');
$this->form_validation->set_rules('itm_cat_id', lang('itm_cat_id'), 'required|max_length[11]|integer');
$data_post['Itm_name'] = $this->input->post('Itm_name');
$data_post['itm_last_updated'] =   $this->user;
$data_post['itm_last_updated_by'] = $this->user;
$data_post['itm_remark'] = $this->input->post('itm_remark');
$data_post['brand_id'] = $this->input->post('brand_id');
$data_post['itm_cat_id'] = $this->input->post('itm_cat_id');
$data_post['itm_available_quantity'] = $this->input->post('itm_available_quantity');
if ($this->form_validation->run() == FALSE) {
$errors = validation_errors();
$brands_set = $this->model_items->related_brands();
$categories_set = $this->model_items->related_categories();
$this->template->assign('related_brands', $brands_set);
$this->template->assign('related_categories', $categories_set);
$this->template->assign('action_mode', 'edit');
$this->template->assign('errors', $errors);
$this->template->assign('items_data', $data_post);
$this->template->assign('items_fields', $fields);
$this->template->assign('metadata', $this->model_items->metadata());
$this->template->assign('table_name', 'Items');
$this->template->assign('template', 'form_items');
$this->template->assign('record_id', $id);
$this->template->display('frame_admin.tpl');
} elseif ($this->form_validation->run() == TRUE) {
$this->model_items->update($id, $data_post);
redirect('items/show/' . $id);
}
break;
}
}
/**
*  DELETE RECORD(S)
*  The 'delete' method of the model accepts int and array
*/
function delete ($id = FALSE)
{
switch ($_SERVER ['REQUEST_METHOD']) {
case 'GET':
$this->model_items->delete($id);
redirect($_SERVER['HTTP_REFERER']);
break;
case 'POST':
$this->model_items->delete($this->input->post('delete_ids'));
redirect($_SERVER['HTTP_REFERER']);
break;
}
}
}
