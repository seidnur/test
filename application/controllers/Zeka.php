<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Zeka extends MY_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library( 'template' ); 
        $this->load->model( 'model_zeka' ); 
        $this->load->helper( 'form' );
    }
/**
*  LISTS MODEL DATA INTO A TABLE
*/         
function index( $page = 0 )
{
    $this->model_zeka->pagination( TRUE );
    $data_info = $this->model_zeka->lister( $page );
    $fields = $this->model_zeka->fields( TRUE );
    $this->template->assign( 'pager', $this->model_zeka->pager );
    $this->template->assign( 'zeka_fields', $fields );
    $this->template->assign( 'zeka_data', $data_info );
    $this->template->assign( 'table_name', 'zeka' );
    $this->template->assign( 'template', 'list_zeka' );
    $this->template->display( 'frame_admin.tpl' );
}
/**
*  SHOWS A RECORD VIEW
*/
function show( $id )
{
    $data=$this->model_zeka->get( $id );
    $fields=$this->model_zeka->fields( TRUE );

    $this->template->assign( 'id', $id );
    $this->template->assign( 'zeka_fields', $fields );
    $this->template->assign( 'zeka_data', $data );
    $this->template->assign( 'table_name', 'Zeka' );
    $this->template->assign( 'template', 'show_zeka' );
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
                $fields = $this->model_zeka->fields();
                $this->template->assign( 'action_mode', 'create' );
                $this->template->assign( 'zeka_fields', $fields );
                $this->template->assign( 'metadata', $this->model_zeka->metadata() );
                $this->template->assign( 'table_name', 'Zeka' );
                $this->template->assign( 'template', 'form_zeka' );
                $this->template->display( 'frame_admin.tpl' );
                break;
    /**
    *  Insert data TO zeka table
    */
    case 'POST':
                $fields = $this->model_zeka->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules( 'amount', lang('amount'), 'required|numeric' );
                $this->form_validation->set_rules( 'Year', lang('Year'), 'required|max_length[11]|integer' );
                $this->form_validation->set_rules( 'is_paid', lang('is_paid'), 'required|max_length[4]|integer' );
                $this->form_validation->set_rules( 'percent', lang('percent'), 'required|numeric' );
                $this->form_validation->set_rules( 'date_paid', lang('date_paid'), 'required' );
                $this->form_validation->set_rules( 'date_calculated', lang('date_calculated'), 'required' );
                $this->form_validation->set_rules( 'remark', lang('remark'), 'required' );
                $this->form_validation->set_rules( 'calculated_by', lang('calculated_by'), 'required|max_length[50]' );
                $this->form_validation->set_rules( 'paid_by', lang('paid_by'), 'required|max_length[50]' );
                $data_post['amount'] = $this->input->post( 'amount' );
                $data_post['Year'] = $this->input->post( 'Year' );
                $data_post['is_paid'] = $this->input->post( 'is_paid' );
                $data_post['percent'] = $this->input->post( 'percent' );
                $data_post['date_paid'] = $this->input->post( 'date_paid' );
                $data_post['date_calculated'] = $this->input->post( 'date_calculated' );
                $data_post['remark'] = $this->input->post( 'remark' );
                $data_post['calculated_by'] = $this->input->post( 'calculated_by' );
                $data_post['paid_by'] = $this->input->post( 'paid_by' );
    if ( $this->form_validation->run() == FALSE )
    {
        $errors = validation_errors();
        $this->template->assign( 'errors', $errors );
        $this->template->assign( 'action_mode', 'create' );
        $this->template->assign( 'zeka_data', $data_post );
        $this->template->assign( 'zeka_fields', $fields );
        $this->template->assign( 'metadata', $this->model_zeka->metadata() );
        $this->template->assign( 'table_name', 'Zeka' );
        $this->template->assign( 'template', 'form_zeka' );
        $this->template->display( 'frame_admin.tpl' );
    }
    elseif ( $this->form_validation->run() == TRUE )
    {
        $insert_id = $this->model_zeka->insert( $data_post );
        redirect( 'zeka' );
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
        $this->model_zeka->raw_data = TRUE;
        $data = $this->model_zeka->get( $id );
        $fields = $this->model_zeka->fields();
        $this->template->assign( 'action_mode', 'edit' );
        $this->template->assign( 'zeka_data', $data );
        $this->template->assign( 'zeka_fields', $fields );
        $this->template->assign( 'metadata', $this->model_zeka->metadata() );
        $this->template->assign( 'table_name', 'Zeka' );
        $this->template->assign( 'template', 'form_zeka' );
        $this->template->assign( 'record_id', $id );
        $this->template->display( 'frame_admin.tpl' );
        break;
        case 'POST':
        $fields = $this->model_zeka->fields();
        /* we set the rules */
        /* don't forget to edit these */
        $this->form_validation->set_rules( 'amount', lang('amount'), 'required|numeric' );
        $this->form_validation->set_rules( 'Year', lang('Year'), 'required|max_length[11]|integer' );
        $this->form_validation->set_rules( 'is_paid', lang('is_paid'), 'required|max_length[4]|integer' );
        $this->form_validation->set_rules( 'percent', lang('percent'), 'required|numeric' );
        $this->form_validation->set_rules( 'date_paid', lang('date_paid'), 'required' );
        $this->form_validation->set_rules( 'date_calculated', lang('date_calculated'), 'required' );
        $this->form_validation->set_rules( 'remark', lang('remark'), 'required' );
        $this->form_validation->set_rules( 'calculated_by', lang('calculated_by'), 'required|max_length[50]' );
        $this->form_validation->set_rules( 'paid_by', lang('paid_by'), 'required|max_length[50]' );
        $data_post['amount'] = $this->input->post( 'amount' );
        $data_post['Year'] = $this->input->post( 'Year' );
        $data_post['is_paid'] = $this->input->post( 'is_paid' );
        $data_post['percent'] = $this->input->post( 'percent' );
        $data_post['date_paid'] = $this->input->post( 'date_paid' );
        $data_post['date_calculated'] = $this->input->post( 'date_calculated' );
        $data_post['remark'] = $this->input->post( 'remark' );
        $data_post['calculated_by'] = $this->input->post( 'calculated_by' );
        $data_post['paid_by'] = $this->input->post( 'paid_by' );
        if ( $this->form_validation->run() == FALSE )
        {
        $errors = validation_errors();
        $this->template->assign( 'action_mode', 'edit' );
        $this->template->assign( 'errors', $errors );
        $this->template->assign( 'zeka_data', $data_post );
        $this->template->assign( 'zeka_fields', $fields );
        $this->template->assign( 'metadata', $this->model_zeka->metadata() );
        $this->template->assign( 'table_name', 'Zeka' );
        $this->template->assign( 'template', 'form_zeka' );
        $this->template->assign( 'record_id', $id );
        $this->template->display( 'frame_admin.tpl' );
        }
        elseif ( $this->form_validation->run() == TRUE )
        {
            $this->model_zeka->update( $id, $data_post );
            redirect( 'zeka/show/' . $id );   
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
        $this->model_zeka->delete( $id );
        redirect( $_SERVER['HTTP_REFERER'] );
        break;
        case 'POST':
        $this->model_zeka->delete( $this->input->post('delete_ids') );
        redirect( $_SERVER['HTTP_REFERER'] );
        break;
    }
}
}
