<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Credit extends MY_controller
{
function __construct()
{
parent::__construct();
$this->load->library( 'template' ); 
$this->load->model( 'model_credit' ); 
}
/**
*  LISTS MODEL DATA INTO A TABLE
*/         
function index( $page = 0 )
{
$this->model_credit->pagination( TRUE );
$data_info = $this->model_credit->lister( $page );
$fields = $this->model_credit->fields( TRUE );
$this->template->assign( 'pager', $this->model_credit->pager );
$this->template->assign( 'credit_fields', $fields );
$this->template->assign( 'credit_data', $data_info );
$this->template->assign( 'table_name', 'credit' );
$this->template->assign( 'template', 'list_credit' );
$this->template->display( 'frame_admin.tpl' );
}
/**
*  SHOWS A RECORD VIEW
*/
function show( $id )
{
$data = $this->model_credit->get( $id );
$fields = $this->model_credit->fields( TRUE );
$this->template->assign( 'id', $id );
$this->template->assign( 'credit_fields', $fields );
$this->template->assign( 'credit_data', $data );
$this->template->assign( 'table_name', 'Credit' );
$this->template->assign( 'template', 'show_credit' );
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
$fields = $this->model_credit->fields();
$items_set = $this->model_credit->related_items();
$this->template->assign( 'related_items', $items_set );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'credit_fields', $fields );
$this->template->assign( 'metadata', $this->model_credit->metadata() );
$this->template->assign( 'table_name', 'Credit' );
$this->template->assign( 'template', 'form_credit' );
$this->template->display( 'frame_admin.tpl' );
break;
/**
*  Insert data TO credit table
*/
case 'POST':
$fields = $this->model_credit->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'cr_full_name', lang('cr_full_name'), 'required|max_length[50]' );
$this->form_validation->set_rules( 'cr_product', lang('cr_product'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'cr_unit_price', lang('cr_unit_price'), 'required|numeric' );
$this->form_validation->set_rules( 'cr_quantity', lang('cr_quantity'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'cr_total_credit', lang('cr_total_credit'), 'required|numeric' );
$this->form_validation->set_rules( 'cr_phone_number', lang('cr_phone_number'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'cr_address', lang('cr_address'), 'required|max_length[50]' );
$this->form_validation->set_rules( 'cr_given_date', lang('cr_given_date'), 'required' );
$this->form_validation->set_rules( 'cr_customer_gender', lang('cr_customer_gender'), 'required' );
$this->form_validation->set_rules( 'cr_return_date', lang('cr_return_date'), 'required' );
$this->form_validation->set_rules( 'cr_actual_return_date', lang('cr_actual_return_date'), 'required' );
$this->form_validation->set_rules( 'cr_remark', lang('cr_remark'), 'max_length[425]' );
$data_post['cr_full_name'] = $this->input->post( 'cr_full_name' );
$data_post['cr_product'] = $this->input->post( 'cr_product' );
$data_post['cr_unit_price'] = $this->input->post( 'cr_unit_price' );
$data_post['cr_quantity'] = $this->input->post( 'cr_quantity' );
$data_post['cr_total_credit'] = $this->input->post( 'cr_unit_price' ) *$this->input->post( 'cr_unit_price' );
$data_post['cr_phone_number'] = $this->input->post( 'cr_phone_number' );
$data_post['cr_address'] = $this->input->post( 'cr_address' );
$data_post['cr_given_date'] = $this->input->post( 'cr_given_date' );
$data_post['cr_customer_gender'] = $this->input->post( 'cr_customer_gender' );
$data_post['cr_return_date'] = $this->input->post( 'cr_return_date' );
$data_post['cr_actual_return_date'] = $this->input->post( 'cr_actual_return_date' );
$data_post['cr_created_by'] = $this->user;
$data_post['cr_remark'] = $this->input->post( 'cr_remark' );
$data_post['cr_status'] = 0;
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$items_set = $this->model_credit->related_items();
$this->template->assign( 'related_items', $items_set );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'credit_data', $data_post );
$this->template->assign( 'credit_fields', $fields );
$this->template->assign( 'metadata', $this->model_credit->metadata() );
$this->template->assign( 'table_name', 'Credit' );
$this->template->assign( 'template', 'form_credit' );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$insert_id = $this->model_credit->insert( $data_post );
redirect( 'credit' );
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
$this->model_credit->raw_data = TRUE;
$data = $this->model_credit->get( $id );
$fields = $this->model_credit->fields();
$items_set = $this->model_credit->related_items();
$this->template->assign( 'related_items', $items_set );
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'credit_data', $data );
$this->template->assign( 'credit_fields', $fields );
$this->template->assign( 'metadata', $this->model_credit->metadata() );
$this->template->assign( 'table_name', 'Credit' );
$this->template->assign( 'template', 'form_credit' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
break;
case 'POST':
$fields = $this->model_credit->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'cr_full_name', lang('cr_full_name'), 'required|max_length[50]' );
$this->form_validation->set_rules( 'cr_product', lang('cr_product'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'cr_unit_price', lang('cr_unit_price'), 'required|numeric' );
$this->form_validation->set_rules( 'cr_quantity', lang('cr_quantity'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'cr_total_credit', lang('cr_total_credit'), 'required|numeric' );
$this->form_validation->set_rules( 'cr_phone_number', lang('cr_phone_number'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'cr_address', lang('cr_address'), 'required|max_length[50]' );
$this->form_validation->set_rules( 'cr_given_date', lang('cr_given_date'), 'required' );
$this->form_validation->set_rules( 'cr_customer_gender', lang('cr_customer_gender'), 'required' );
$this->form_validation->set_rules( 'cr_return_date', lang('cr_return_date'), 'required' );
$this->form_validation->set_rules( 'cr_actual_return_date', lang('cr_actual_return_date'), 'required' );
$this->form_validation->set_rules( 'cr_remark', lang('cr_remark'), 'max_length[425]' );
$data_post['cr_full_name'] = $this->input->post( 'cr_full_name' );
$data_post['cr_product'] = $this->input->post( 'cr_product' );
$data_post['cr_unit_price'] = $this->input->post( 'cr_unit_price' );
$data_post['cr_quantity'] = $this->input->post( 'cr_quantity' );
$data_post['cr_total_credit'] = $this->input->post( 'cr_total_credit' );
$data_post['cr_phone_number'] = $this->input->post( 'cr_phone_number' );
$data_post['cr_address'] = $this->input->post( 'cr_address' );
$data_post['cr_given_date'] = $this->input->post( 'cr_given_date' );
$data_post['cr_customer_gender'] = $this->input->post( 'cr_customer_gender' );
$data_post['cr_return_date'] = $this->input->post( 'cr_return_date' );
$data_post['cr_actual_return_date'] = $this->input->post( 'cr_actual_return_date' );
$data_post['cr_created_by'] = $this->user;
$data_post['cr_remark'] = $this->input->post( 'cr_remark' );
$data_post['cr_status'] = $this->input->post( 'cr_status' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$items_set = $this->model_credit->related_items();
$this->template->assign( 'related_items', $items_set );
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'credit_data', $data_post );
$this->template->assign( 'credit_fields', $fields );
$this->template->assign( 'metadata', $this->model_credit->metadata() );
$this->template->assign( 'table_name', 'Credit' );
$this->template->assign( 'template', 'form_credit' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$this->model_credit->update( $id, $data_post );
redirect( 'credit/show/' . $id );   
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
$this->model_credit->delete( $id );
redirect( $_SERVER['HTTP_REFERER'] );
break;
case 'POST':
$this->model_credit->delete( $this->input->post('delete_ids') );
redirect( $_SERVER['HTTP_REFERER'] );
break;
}
}
}
