<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employee extends MY_controller
{
function __construct()
{
parent::__construct();
$this->load->library( 'template' ); 
$this->load->model( 'model_employee' ); 
}
/**
*  LISTS MODEL DATA INTO A TABLE
*/         
function index( $page = 0 )
{
$this->model_employee->pagination( TRUE );
$data_info = $this->model_employee->lister( $page );
$fields = $this->model_employee->fields( TRUE );
$this->template->assign( 'pager', $this->model_employee->pager );
$this->template->assign( 'employee_fields', $fields );
$this->template->assign( 'employee_data', $data_info );
$this->template->assign( 'table_name', 'employee' );
$this->template->assign( 'template', 'list_employee' );
$this->template->display( 'frame_admin.tpl' );
}
/**
*  SHOWS A RECORD VIEW
*/
function show( $id )
{
$data = $this->model_employee->get( $id );
$fields = $this->model_employee->fields( TRUE );
$this->template->assign( 'id', $id );
$this->template->assign( 'employee_fields', $fields );
$this->template->assign( 'employee_data', $data );
$this->template->assign( 'table_name', 'Employee' );
$this->template->assign( 'template', 'show_employee' );
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
$fields = $this->model_employee->fields();
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'employee_fields', $fields );
$this->template->assign( 'metadata', $this->model_employee->metadata() );
$this->template->assign( 'table_name', 'Employee' );
$this->template->assign( 'template', 'form_employee' );
$this->template->display( 'frame_admin.tpl' );
break;
/**
*  Insert data TO employee table
*/
case 'POST':
$fields = $this->model_employee->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'emp_first_name', lang('emp_first_name'), 'required|max_length[15]' );
$this->form_validation->set_rules( 'emp_middle_name', lang('emp_middle_name'), 'required|max_length[15]' );
$this->form_validation->set_rules( 'emp_last_name', lang('emp_last_name'), 'required|max_length[15]' );
$this->form_validation->set_rules( 'emp_gender', lang('emp_gender'), 'required|max_length[15]' );
$this->form_validation->set_rules( 'emp_birth_date', lang('emp_birth_date'), 'required' );
$this->form_validation->set_rules( 'emp_hire_date', lang('emp_hire_date'), 'required' );
$this->form_validation->set_rules( 'emp_remark', lang('emp_remark'), 'required' );
$this->form_validation->set_rules( 'emp_phone', lang('emp_phone'), 'max_length[20]' );
$this->form_validation->set_rules( 'emp_email', lang('emp_email'), 'required|max_length[50]' );
$this->form_validation->set_rules( 'emp_salary', lang('emp_salary'), 'required|max_length[6]'  );
$data_post['emp_first_name'] = $this->input->post( 'emp_first_name' );
$data_post['emp_middle_name'] = $this->input->post( 'emp_middle_name' );
$data_post['emp_last_name'] = $this->input->post( 'emp_last_name' );
$data_post['emp_gender'] = $this->input->post( 'emp_gender' );
$data_post['emp_birth_date'] = $this->input->post( 'emp_birth_date' );
$data_post['emp_hire_date'] = $this->input->post( 'emp_hire_date' );
$data_post['emp_created_by'] = $this->user;
$data_post['emp_date_created'] = $this->currentDate;
$data_post['emp_remark'] = $this->input->post( 'emp_remark' );
$data_post['emp_salary'] = $this->input->post( 'emp_salary' );
$data_post['emp_phone'] = $this->input->post( 'emp_phone' );
$data_post['emp_email'] = $this->input->post( 'emp_email' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$this->template->assign( 'errors', $errors );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'employee_data', $data_post );
$this->template->assign( 'employee_fields', $fields );
$this->template->assign( 'metadata', $this->model_employee->metadata() );
$this->template->assign( 'table_name', 'Employee' );
$this->template->assign( 'template', 'form_employee' );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$insert_id = $this->model_employee->insert( $data_post );
    $this->template->assign( 'action_mode', 'edit' );
    $this->template->assign( 'message', lang('empmessage') );
    $this->template->assign( 'employee_data', $data_post );
    $this->template->assign( 'employee_fields', $fields );
    $this->template->assign( 'metadata', $this->model_employee->metadata() );
    $this->template->assign( 'table_name', 'Employee' );
    $this->template->assign( 'template', 'form_employee' );
    $this->template->assign( 'record_id', $id );
    $this->template->display( 'frame_admin.tpl' );
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
$this->model_employee->raw_data = TRUE;
$data = $this->model_employee->get( $id );
$fields = $this->model_employee->fields();
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'employee_data', $data );
$this->template->assign( 'employee_fields', $fields );
$this->template->assign( 'metadata', $this->model_employee->metadata() );
$this->template->assign( 'table_name', 'Employee' );
$this->template->assign( 'template', 'form_employee' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
break;
case 'POST':
$fields = $this->model_employee->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'emp_first_name', lang('emp_first_name'), 'required|max_length[15]' );
$this->form_validation->set_rules( 'emp_middle_name', lang('emp_middle_name'), 'required|max_length[15]' );
$this->form_validation->set_rules( 'emp_last_name', lang('emp_last_name'), 'required|max_length[15]' );
$this->form_validation->set_rules( 'emp_gender', lang('emp_gender'), 'required|max_length[15]' );
$this->form_validation->set_rules( 'emp_birth_date', lang('emp_birth_date'), 'required' );
$this->form_validation->set_rules( 'emp_hire_date', lang('emp_hire_date'), 'required' );
$this->form_validation->set_rules( 'emp_remark', lang('emp_remark'), 'max_length[255]' );
$this->form_validation->set_rules( 'emp_phone', lang('emp_phone'), 'min_length[10]|integer' );
$this->form_validation->set_rules( 'emp_email', lang('emp_email'), 'valid_email|min_length[6]' );
$data_post['emp_first_name'] = $this->input->post( 'emp_first_name' );
$data_post['emp_middle_name'] = $this->input->post( 'emp_middle_name' );
$data_post['emp_last_name'] = $this->input->post( 'emp_last_name' );
$data_post['emp_gender'] = $this->input->post( 'emp_gender' );
$data_post['emp_birth_date'] = $this->input->post( 'emp_birth_date' );
$data_post['emp_hire_date'] = $this->input->post( 'emp_hire_date' );
$data_post['emp_created_by'] = $this->user;
$data_post['emp_date_created'] = $this->currentDate;
$data_post['emp_remark'] = $this->input->post( 'emp_remark' );
$data_post['emp_salary'] = $this->input->post( 'emp_salary' );
$data_post['emp_phone'] = $this->input->post( 'emp_phone' );
$data_post['emp_email'] = $this->input->post( 'emp_email' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'employee_data', $data_post );
$this->template->assign( 'employee_fields', $fields );
$this->template->assign( 'metadata', $this->model_employee->metadata() );
$this->template->assign( 'table_name', 'Employee' );
$this->template->assign( 'template', 'form_employee' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$this->model_employee->update( $id, $data_post );
    $this->template->assign( 'action_mode', 'edit' );
    $this->template->assign( 'message', lang('empupdatemessage') );
    $this->template->assign( 'employee_data', $data_post );
    $this->template->assign( 'employee_fields', $fields );
    $this->template->assign( 'table_name', 'Employee' );
    $this->template->assign( 'template', 'form_employee' );
    $this->template->assign( 'record_id', $id );
    $this->template->display( 'frame_admin.tpl' );
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
$this->model_employee->delete( $id );
    $this->template->assign( 'action_mode', 'edit' );
    $fields = $this->model_employee->fields();
    $this->template->assign( 'employee_fields', $fields );
    $this->template->assign( 'message', lang('empdeletemessage') );
    $this->template->assign( 'table_name', 'Employee' );
    $this->template->assign( 'template', 'form_employee' );
    $this->template->assign( 'record_id', $id );
    $this->template->display( 'frame_admin.tpl' );
break;
case 'POST':
$this->model_employee->delete( $this->input->post('delete_ids') );
redirect( $_SERVER['HTTP_REFERER'] );
break;
}
}
}
