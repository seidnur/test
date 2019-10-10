<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Group extends MY_controller
{
function __construct()
{
parent::__construct();
$this->load->library( 'template' ); 
$this->load->model( 'model_group' ); 
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
$this->model_group->pagination( TRUE );
$data_info = $this->model_group->lister( $page );
$fields = $this->model_group->fields( TRUE );

$this->template->assign( 'pager', $this->model_group->pager );
$this->template->assign( 'group_fields', $fields );
$this->template->assign( 'group_data', $data_info );
$this->template->assign( 'table_name', 'group' );
$this->template->assign( 'template', 'list_group' );
$this->template->display( 'frame_admin.tpl' );
}
/**
*  SHOWS A RECORD VIEW
*/
function show( $id )
{
$data = $this->model_group->get( $id );
$fields = $this->model_group->fields( TRUE );
$this->template->assign( 'id', $id );
$this->template->assign( 'group_fields', $fields );
$this->template->assign( 'group_data', $data );
$this->template->assign( 'table_name', 'Group' );
$this->template->assign( 'template', 'show_group' );
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
$fields = $this->model_group->fields();
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'group_fields', $fields );
$this->template->assign( 'metadata', $this->model_group->metadata() );
$this->template->assign( 'table_name', 'Group' );
$this->template->assign( 'template', 'form_group' );
$this->template->display( 'frame_admin.tpl' );
break;
/**
*  Insert data TO group table
*/
case 'POST':
$fields = $this->model_group->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'group_name', lang('group_name'), 'required|max_length[255]' );
$this->form_validation->set_rules( 'permission', lang('permission'), 'required' );
$data_post['group_name'] = $this->input->post( 'group_name' );
$data_post['permission'] = $this->input->post( 'permission' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$this->template->assign( 'errors', $errors );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'group_data', $data_post );
$this->template->assign( 'group_fields', $fields );
$this->template->assign( 'metadata', $this->model_group->metadata() );
$this->template->assign( 'table_name', 'Group' );
$this->template->assign( 'template', 'form_group' );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$insert_id = $this->model_group->insert( $data_post );
redirect( 'group' );
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
$this->model_group->raw_data = TRUE;
$data = $this->model_group->get( $id );
$fields = $this->model_group->fields();
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'group_data', $data );
$this->template->assign( 'group_fields', $fields );
$this->template->assign( 'metadata', $this->model_group->metadata() );
$this->template->assign( 'table_name', 'Group' );
$this->template->assign( 'template', 'form_group' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
break;
case 'POST':
$fields = $this->model_group->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'group_name', lang('group_name'), 'required|max_length[255]' );
$this->form_validation->set_rules( 'permission', lang('permission'), 'required' );
$data_post['group_name'] = $this->input->post( 'group_name' );
$data_post['permission'] = $this->input->post( 'permission' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'group_data', $data_post );
$this->template->assign( 'group_fields', $fields );
$this->template->assign( 'metadata', $this->model_group->metadata() );
$this->template->assign( 'table_name', 'Group' );
$this->template->assign( 'template', 'form_group' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$this->model_group->update( $id, $data_post );
redirect( 'group/show/' . $id );   
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
$this->model_group->delete( $id );
redirect( $_SERVER['HTTP_REFERER'] );
break;
case 'POST':
$this->model_group->delete( $this->input->post('delete_ids') );
redirect( $_SERVER['HTTP_REFERER'] );
break;
}
}
}
