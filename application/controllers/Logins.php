<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logins extends MY_controller
{
function __construct()
{
parent::__construct();
$this->load->library( 'template' ); 
$this->load->model( 'model_logins' ); 
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
$this->model_logins->pagination( TRUE );
$data_info = $this->model_logins->lister( $page );
$fields = $this->model_logins->fields( TRUE );
$this->template->assign( 'pager', $this->model_logins->pager );
$this->template->assign( 'logins_fields', $fields );
$this->template->assign( 'logins_data', $data_info );
$this->template->assign( 'table_name', 'logins' );
$this->template->assign( 'template', 'list_logins' );
$this->template->display( 'frame_admin.tpl' );
}
/**
*  SHOWS A RECORD VIEW
*/
function show( $id )
{
$data = $this->model_logins->get( $id );
$fields = $this->model_logins->fields( TRUE );
$this->template->assign( 'id', $id );
$this->template->assign( 'logins_fields', $fields );
$this->template->assign( 'logins_data', $data );
$this->template->assign( 'table_name', 'Logins' );
$this->template->assign( 'template', 'show_logins' );
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
$fields = $this->model_logins->fields();
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'logins_fields', $fields );
$this->template->assign( 'metadata', $this->model_logins->metadata() );
$this->template->assign( 'table_name', 'Logins' );
$this->template->assign( 'template', 'form_logins' );
$this->template->display( 'frame_admin.tpl' );
break;
/**
*  Insert data TO logins table
*/
case 'POST':
$fields = $this->model_logins->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'Ip_address', lang('Ip_address'), 'required|max_length[25]' );
$this->form_validation->set_rules( 'browser', lang('browser'), 'required|max_length[25]' );
$this->form_validation->set_rules( 'LoginDate', lang('LoginDate'), 'required' );
$data_post['Ip_address'] = $this->input->post( 'Ip_address' );
$data_post['browser'] = $this->input->post( 'browser' );
$data_post['LoginDate'] = $this->input->post( 'LoginDate' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$this->template->assign( 'errors', $errors );
$this->template->assign( 'action_mode', 'create' );
$this->template->assign( 'logins_data', $data_post );
$this->template->assign( 'logins_fields', $fields );
$this->template->assign( 'metadata', $this->model_logins->metadata() );
$this->template->assign( 'table_name', 'Logins' );
$this->template->assign( 'template', 'form_logins' );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$insert_id = $this->model_logins->insert( $data_post );
redirect( 'logins' );
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
$this->model_logins->raw_data = TRUE;
$data = $this->model_logins->get( $id );
$fields = $this->model_logins->fields();
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'logins_data', $data );
$this->template->assign( 'logins_fields', $fields );
$this->template->assign( 'metadata', $this->model_logins->metadata() );
$this->template->assign( 'table_name', 'Logins' );
$this->template->assign( 'template', 'form_logins' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
break;
case 'POST':
$fields = $this->model_logins->fields();
/* we set the rules */
/* don't forget to edit these */
$this->form_validation->set_rules( 'Ip_address', lang('Ip_address'), 'required|max_length[25]' );
$this->form_validation->set_rules( 'browser', lang('browser'), 'required|max_length[25]' );
$this->form_validation->set_rules( 'LoginDate', lang('LoginDate'), 'required' );
$data_post['Ip_address'] = $this->input->post( 'Ip_address' );
$data_post['browser'] = $this->input->post( 'browser' );
$data_post['LoginDate'] = $this->input->post( 'LoginDate' );
if ( $this->form_validation->run() == FALSE )
{
$errors = validation_errors();
$this->template->assign( 'action_mode', 'edit' );
$this->template->assign( 'errors', $errors );
$this->template->assign( 'logins_data', $data_post );
$this->template->assign( 'logins_fields', $fields );
$this->template->assign( 'metadata', $this->model_logins->metadata() );
$this->template->assign( 'table_name', 'Logins' );
$this->template->assign( 'template', 'form_logins' );
$this->template->assign( 'record_id', $id );
$this->template->display( 'frame_admin.tpl' );
}
elseif ( $this->form_validation->run() == TRUE )
{
$this->model_logins->update( $id, $data_post );
redirect( 'logins/show/' . $id );   
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
$this->model_logins->delete( $id );
redirect( $_SERVER['HTTP_REFERER'] );
break;
case 'POST':
$this->model_logins->delete( $this->input->post('delete_ids') );
redirect( $_SERVER['HTTP_REFERER'] );
break;
}
}
}
