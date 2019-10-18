<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usergroup extends MY_controller
{
function __construct()
{
parent::__construct();
$this->load->library( 'template' ); 
$this->load->model( 'model_usergroup' ); 
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
$this->model_usergroup->pagination( TRUE );
$data_info = $this->model_usergroup->lister( $page );

$fields = $this->model_usergroup->fields( TRUE );
$this->template->assign( 'pager', $this->model_usergroup->pager );
$this->template->assign( 'usergroup_fields', $fields );
$this->template->assign( 'usergroup_data', $data_info );
$this->template->assign( 'table_name', 'usergroup' );
$this->template->assign( 'template', 'list_usergroup');
$this->template->display( 'frame_admin.tpl' );
}
/**
*  SHOWS A RECORD VIEW
*/
function show( $id )
{
$data = $this->model_usergroup->get( $id );
$fields = $this->model_usergroup->fields( TRUE );
$this->template->assign( 'id', $id );
$this->template->assign( 'usergroup_fields', $fields );
$this->template->assign( 'usergroup_data', $data );
$this->template->assign( 'table_name', 'Usergroup' );
$this->template->assign( 'template', 'show_usergroup' );
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
$fields = $this->model_usergroup->fields();
$users_set = $this->model_usergroup->related_users();
$group_set = $this->model_usergroup->related_group();
$this->template->assign( 'related_users', $users_set );
$this->template->assign( 'related_group', $group_set );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'usergroup_fields', $fields );
$this->template->assign( 'metadata', $this->model_usergroup->metadata() );
$this->template->assign( 'table_name', 'Usergroup' );
$this->template->assign( 'template', 'form_usergroup' );
$this->template->display( 'frame_admin.tpl' );
break;
/**
*  Insert data TO usergroup table
*/
case 'POST':
$fields = $this->model_usergroup->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'group_user_id', lang('group_user_id'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'group_id', lang('group_id'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'group_remark', lang('group_remark'), 'max_length[100]' );
$data_post['group_user_id'] = $this->input->post( 'group_user_id' );
$data_post['group_id'] = $this->input->post( 'group_id' );
$data_post['group_created_by'] = $this->user;
$data_post['group_remark'] = $this->input->post( 'group_remark' );
$data_post['group_created_date'] = $this->currentDate;
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$users_set = $this->model_usergroup->related_users();
$group_set = $this->model_usergroup->related_group();
$this->template->assign( 'related_users', $users_set );
$this->template->assign( 'related_group', $group_set );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'usergroup_data', $data_post );
$this->template->assign( 'usergroup_fields', $fields );
$this->template->assign( 'metadata', $this->model_usergroup->metadata() );
$this->template->assign( 'table_name', 'Usergroup' );
$this->template->assign( 'template', 'form_usergroup' );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$insert_id = $this->model_usergroup->insert( $data_post );
redirect( 'usergroup' );
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
$this->model_usergroup->raw_data = TRUE;
$data = $this->model_usergroup->get( $id );
$fields = $this->model_usergroup->fields();
$users_set = $this->model_usergroup->related_users();
$group_set = $this->model_usergroup->related_group();
$this->template->assign( 'related_users', $users_set );
$this->template->assign( 'related_group', $group_set );
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'usergroup_data', $data );
$this->template->assign( 'usergroup_fields', $fields );
$this->template->assign( 'metadata', $this->model_usergroup->metadata() );
$this->template->assign( 'table_name', 'Usergroup' );
$this->template->assign( 'template', 'form_usergroup' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
break;
case 'POST':
$fields = $this->model_usergroup->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'group_user_id', lang('group_user_id'), 'required|max_length[11]|integer' );
$this->form_validation->set_rules( 'group_id', lang('group_id'), 'required|max_length[100]|integer' );
$this->form_validation->set_rules( 'group_remark', lang('group_remark'), 'max_length[11]' );
$data_post['group_user_id'] = $this->input->post( 'group_user_id' );
$data_post['group_id'] = $this->input->post( 'group_id' );
$data_post['group_remark'] = $this->input->post( 'group_remark' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$users_set = $this->model_usergroup->related_users();
$group_set = $this->model_usergroup->related_group();
$this->template->assign( 'related_users', $users_set );
$this->template->assign( 'related_group', $group_set );
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'usergroup_data', $data_post );
$this->template->assign( 'usergroup_fields', $fields );
$this->template->assign( 'metadata', $this->model_usergroup->metadata() );
$this->template->assign( 'table_name', 'Usergroup' );
$this->template->assign( 'template', 'form_usergroup' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$this->model_usergroup->update( $id, $data_post );
redirect( 'usergroup/show/' . $id );   
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
$this->model_usergroup->delete( $id );
redirect( $_SERVER['HTTP_REFERER'] );
break;
case 'POST':
$this->model_usergroup->delete( $this->input->post('delete_ids') );
redirect( $_SERVER['HTTP_REFERER'] );
break;
}
}
}
