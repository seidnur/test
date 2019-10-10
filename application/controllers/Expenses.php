<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Expenses extends MY_controller
{
function __construct()
{
parent::__construct();
$this->load->library( 'template' ); 
$this->load->model( 'model_expenses' ); 
}
/**
*  LISTS MODEL DATA INTO A TABLE
*/         
function index( $page = 0 )
{
$this->model_expenses->pagination( TRUE );
$data_info = $this->model_expenses->lister( $page );
$fields = $this->model_expenses->fields( TRUE );
$this->template->assign( 'pager', $this->model_expenses->pager );
$this->template->assign( 'expenses_fields', $fields );
$this->template->assign( 'expenses_data', $data_info );
$this->template->assign( 'table_name', 'expenses' );
$this->template->assign( 'template', 'list_expenses' );
$this->template->display( 'frame_admin.tpl' );
}
/**
*  SHOWS A RECORD VIEW
*/
function show( $id )
{
$data = $this->model_expenses->get( $id );
$fields = $this->model_expenses->fields( TRUE );
$this->template->assign( 'id', $id );
$this->template->assign( 'expenses_fields', $fields );
$this->template->assign( 'expenses_data', $data );
$this->template->assign( 'table_name', 'Expenses' );
$this->template->assign( 'template', 'show_expenses' );
$this->template->display( 'frame_admin.tpl' );
}
/**
*  SHOWS A FROM, AND HANDLES SAVING IT
*/         
function create( $id = false )
{
$this->load->library('form_validation');
switch ( $_SERVER ['REQUEST_METHOD'] )
{
case 'GET':
$fields = $this->model_expenses->fields();
$expense_type_set = $this->model_expenses->related_expense_type();
$this->template->assign( 'related_expense_type', $expense_type_set );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'expenses_fields', $fields );
$this->template->assign( 'metadata', $this->model_expenses->metadata() );
$this->template->assign( 'table_name', 'Expenses' );
$this->template->assign( 'template', 'form_expenses' );
$this->template->display( 'frame_admin.tpl' );
break;
/**
*  Insert data TO expenses table
*/
case 'POST':
$fields = $this->model_expenses->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'exp_reason_id', lang('exp_reason_id'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'year', lang('year'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'Month', lang('Month'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'amount', lang('amount'), 'required|numeric' );
$this->form_validation->set_rules( 'remark', lang('remark'), 'required' );
$data_post['exp_reason_id'] = $this->input->post( 'exp_reason_id' );
$data_post['year'] = $this->input->post( 'year' );
$data_post['Month'] = $this->input->post( 'Month' );
$data_post['amount'] = $this->input->post( 'amount' );
$data_post['paid'] = $this->input->post( 'paid' );
$data_post['created_by'] = $this->input->post( 'created_by' )==null?0:1;
$data_post['created_date'] = date('Y-m-d');
$data_post['remark'] = $this->input->post( 'remark' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$expense_type_set = $this->model_expenses->related_expense_type();
$this->template->assign( 'related_expense_type', $expense_type_set );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'expenses_data', $data_post );
$this->template->assign( 'expenses_fields', $fields );
$this->template->assign( 'metadata', $this->model_expenses->metadata() );
$this->template->assign( 'table_name', 'Expenses' );
$this->template->assign( 'template', 'form_expenses' );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$insert_id = $this->model_expenses->insert( $data_post );
redirect( 'expenses' );
}
break;
}
}
/**
*  DISPLAYS THE POPULATED FORM OF THE RECORD
*  This method uses the same template as the create method
*/
function edit( $id = false )
{
$this->load->library('form_validation');
switch ( $_SERVER ['REQUEST_METHOD'] )
{
case 'GET':
$this->model_expenses->raw_data = TRUE;
$data = $this->model_expenses->get( $id );
$fields = $this->model_expenses->fields();
$expense_type_set = $this->model_expenses->related_expense_type();
$this->template->assign( 'related_expense_type', $expense_type_set );
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'expenses_data', $data );
$this->template->assign( 'expenses_fields', $fields );
$this->template->assign( 'metadata', $this->model_expenses->metadata() );
$this->template->assign( 'table_name', 'Expenses' );
$this->template->assign( 'template', 'form_expenses' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
break;
case 'POST':
$fields = $this->model_expenses->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'exp_reason_id', lang('exp_reason_id'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'year', lang('year'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'Month', lang('Month'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'amount', lang('amount'), 'required|numeric' );
$this->form_validation->set_rules( 'paid', lang('paid'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'created_by', lang('created_by'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'created_date', lang('created_date'), 'required' );
$this->form_validation->set_rules( 'remark', lang('remark'), 'required' );
$data_post['exp_reason_id'] = $this->input->post( 'exp_reason_id' );
$data_post['year'] = $this->input->post( 'year' );
$data_post['Month'] = $this->input->post( 'Month' );
$data_post['amount'] = $this->input->post( 'amount' );
$data_post['paid'] = $this->input->post( 'paid' );
$data_post['created_by'] = $this->input->post( 'created_by' );
$data_post['created_date'] = $this->input->post( 'created_date' );
$data_post['remark'] = $this->input->post( 'remark' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$expense_type_set = $this->model_expenses->related_expense_type();
$this->template->assign( 'related_expense_type', $expense_type_set );
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'expenses_data', $data_post );
$this->template->assign( 'expenses_fields', $fields );
$this->template->assign( 'metadata', $this->model_expenses->metadata() );
$this->template->assign( 'table_name', 'Expenses' );
$this->template->assign( 'template', 'form_expenses' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$this->model_expenses->update( $id, $data_post );
redirect( 'expenses/show/' . $id );   
}
break;
}
}
/**
*  DELETE RECORD(S)
*  The 'delete' method of the model accepts int and array  
*/
function delete( $id = FALSE )
{
switch ( $_SERVER ['REQUEST_METHOD'] )
{
case 'GET':
$this->model_expenses->delete( $id );
redirect( $_SERVER['HTTP_REFERER'] );
break;
case 'POST':
$this->model_expenses->delete( $this->input->post('delete_ids') );
redirect( $_SERVER['HTTP_REFERER'] );
break;
}
}
}
