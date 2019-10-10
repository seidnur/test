<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MY_controller
{
function __construct()
{
parent::__construct();
$this->load->library( 'template' ); 
$this->load->model( 'model_users' ); 
$this->load->helper( 'form' );
$this->load->helper( 'language' ); 
$this->load->helper( 'url' );
$this->load->model( 'model_auth' );
}
/**
*  LISTS MODEL DATA INTO A TABLE
*/         
function index( $page = 0 )
{
$this->model_users->pagination( TRUE );
$data_info = $this->model_users->lister( $page );
$fields = $this->model_users->fields( TRUE );
$this->template->assign( 'pager', $this->model_users->pager );
$this->template->assign( 'users_fields', $fields );
$this->template->assign( 'users_data', $data_info );
$this->template->assign( 'table_name', 'users' );
$this->template->assign( 'template', 'list_users' );
$this->template->display( 'frame_admin.tpl' );
}
/**
*  SHOWS A RECORD VIEW
*/
function show( $id )
{
$data = $this->model_users->get( $id );
$fields = $this->model_users->fields( TRUE );
$this->template->assign( 'id', $id );
$this->template->assign( 'users_fields', $fields );
$this->template->assign( 'users_data', $data );
$this->template->assign( 'table_name', 'Users' );
$this->template->assign( 'template', 'show_users' );
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
$fields = $this->model_users->fields();
$employee_set = $this->model_users->related_employee();
$this->template->assign( 'related_employee', $employee_set );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'users_fields', $fields );
$this->template->assign( 'metadata', $this->model_users->metadata() );
$this->template->assign( 'table_name', 'Users' );
$this->template->assign( 'template', 'form_users' );
$this->template->display( 'frame_admin.tpl' );
break;
/**
*  Insert data TO users table
*/
case 'POST':
$fields = $this->model_users->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'user_name', lang('user_name'), 'required|max_length[25]' );
$this->form_validation->set_rules( 'user_password', lang('user_password'), 'required|max_length[120]' );
$this->form_validation->set_rules( 'user_emp_id', lang('user_emp_id'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'user_remark', lang('user_remark'), 'required' );
$this->form_validation->set_rules( 'user_accout_status', lang('user_accout_status'), 'max_length[11]' );
$this->form_validation->set_rules( 'user_email', lang('user_email'), 'max_length[50]' );
$data_post['user_name'] = $this->input->post( 'user_name' );
$options = ['cost' => 12];
$data_post['user_password'] = password_hash($this->input->post( 'user_password' ), PASSWORD_BCRYPT, $options);
$data_post['user_emp_id'] = $this->input->post( 'user_emp_id' );
$data_post['user_created_date'] = $this->currentDate;
$data_post['user_created_by'] = $this->user;
$data_post['user_remark'] = $this->input->post( 'user_remark' );
$data_post['user_accout_status'] = 1;
$data_post['user_email'] = $this->input->post( 'user_email' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$employee_set = $this->model_users->related_employee();
$this->template->assign( 'related_employee', $employee_set );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'users_data', $data_post );
$this->template->assign( 'users_fields', $fields );
$this->template->assign( 'metadata', $this->model_users->metadata() );
$this->template->assign( 'table_name', 'Users' );
$this->template->assign( 'template', 'form_users' );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$insert_id = $this->model_users->insert( $data_post );
redirect( 'users' );
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
$this->model_users->raw_data = TRUE;
$data = $this->model_users->get( $id );
$fields = $this->model_users->fields();
$employee_set = $this->model_users->related_employee();
$this->template->assign( 'related_employee', $employee_set );
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'users_data', $data );
$this->template->assign( 'users_fields', $fields );
$this->template->assign( 'metadata', $this->model_users->metadata() );
$this->template->assign( 'table_name', 'Users' );
$this->template->assign( 'template', 'form_users' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
break;
case 'POST':
$fields = $this->model_users->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'user_name', lang('user_name'), 'required|max_length[25]' );
$this->form_validation->set_rules( 'user_password', lang('user_password'), 'required|max_length[120]' );
$this->form_validation->set_rules( 'user_emp_id', lang('user_emp_id'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'user_remark', lang('user_remark'), 'required' );
$this->form_validation->set_rules( 'user_accout_status', lang('user_accout_status'), '11' );
$this->form_validation->set_rules( 'user_email', lang('user_email'), '11' );

$data_post['user_remark'] = $this->input->post( 'user_remark' );
$data_post['user_accout_status'] = $this->input->post( 'user_accout_status' );
$data_post['user_email'] = $this->input->post( 'user_email' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$employee_set = $this->model_users->related_employee();
$this->template->assign( 'related_employee', $employee_set );
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'users_data', $data_post );
$this->template->assign( 'users_fields', $fields );
$this->template->assign( 'metadata', $this->model_users->metadata() );
$this->template->assign( 'table_name', 'Users' );
$this->template->assign( 'template', 'form_users' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$this->model_users->update( $id, $data_post );
redirect( 'users/show/' . $id );   
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
$this->model_users->delete( $id );
redirect( $_SERVER['HTTP_REFERER'] );
break;
case 'POST':
$this->model_users->delete( $this->input->post('delete_ids') );
redirect( $_SERVER['HTTP_REFERER'] );
break;
}
}
}
