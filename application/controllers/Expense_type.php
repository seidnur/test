<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense_type extends MY_controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_expense_type' ); 
	}



    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function index( $page = 0 )
    {
        $this->model_expense_type->pagination( TRUE );
		$data_info = $this->model_expense_type->lister( $page );
        $fields = $this->model_expense_type->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_expense_type->pager );
		$this->template->assign( 'expense_type_fields', $fields );
		$this->template->assign( 'expense_type_data', $data_info );
        $this->template->assign( 'table_name', 'expense_type' );
        $this->template->assign( 'template', 'list_expense_type' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_expense_type->get( $id );
        $fields = $this->model_expense_type->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'expense_type_fields', $fields );
		$this->template->assign( 'expense_type_data', $data );
		$this->template->assign( 'table_name', 'Expense_type' );
		$this->template->assign( 'template', 'show_expense_type' );
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
                $fields = $this->model_expense_type->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'expense_type_fields', $fields );
                $this->template->assign( 'metadata', $this->model_expense_type->metadata() );
        		$this->template->assign( 'table_name', 'Expense_type' );
        		$this->template->assign( 'template', 'form_expense_type' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO expense_type table
             */
            case 'POST':
                $fields = $this->model_expense_type->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'exp_type_name', lang('exp_type_name'), 'required|max_length[100]' );
				$this->form_validation->set_rules( 'exp_type_remark', lang('exp_type_remark'), 'required' );
				$data_post['exp_type_name'] = $this->input->post( 'exp_type_name' );
                $data_post['exp_type_created_by'] = $this->user;
				$data_post['exp_created_date'] =date('Y-m-d');
				$data_post['exp_type_remark'] = $this->input->post( 'exp_type_remark' );
				$data_post['is_deleted'] = $this->input->post( 'is_deleted' )==null?0:1;

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'expense_type_data', $data_post );
            		$this->template->assign( 'expense_type_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_expense_type->metadata() );
            		$this->template->assign( 'table_name', 'Expense_type' );
            		$this->template->assign( 'template', 'form_expense_type' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_expense_type->insert( $data_post );
                    $this->template->assign( 'message', lang('expmessage') );
                    $this->template->assign( 'action_mode', 'create' );
                    $this->template->assign( 'expense_type_data', $data_post );
                    $this->template->assign( 'expense_type_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_expense_type->metadata() );
                    $this->template->assign( 'table_name', 'Expense_type' );
                    $this->template->assign( 'template', 'form_expense_type' );
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
                $this->model_expense_type->raw_data = TRUE;
        		$data = $this->model_expense_type->get( $id );
                $fields = $this->model_expense_type->fields();
                

          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'expense_type_data', $data );
        		$this->template->assign( 'expense_type_fields', $fields );
                $this->template->assign( 'metadata', $this->model_expense_type->metadata() );
        		$this->template->assign( 'table_name', 'Expense_type' );
        		$this->template->assign( 'template', 'form_expense_type' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_expense_type->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'exp_type_name', lang('exp_type_name'), 'required|max_length[100]' );
				$this->form_validation->set_rules( 'exp_type_remark', lang('exp_type_remark'), 'required' );
				//->form_validation->set_rules( 'is_deleted', lang('is_deleted'), 'required|max_length[11]|integer' );
				$data_post['exp_type_name'] = $this->input->post( 'exp_type_name' );
				$data_post['exp_type_updater_id'] = $this->user;
            	$data_post['exp_type_remark'] = $this->input->post( 'exp_type_remark' );
				$data_post['is_deleted'] = $this->input->post( 'is_deleted' );
                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'expense_type_data', $data_post );
            		$this->template->assign( 'expense_type_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_expense_type->metadata() );
            		$this->template->assign( 'table_name', 'Expense_type' );
            		$this->template->assign( 'template', 'form_expense_type' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_expense_type->update( $id, $data_post );

                    $this->template->assign( 'message', lang('expupdatemessage') );
                    $this->template->assign( 'action_mode', 'create' );
                    $this->template->assign( 'expense_type_data', $data_post );
                    $this->template->assign( 'expense_type_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_expense_type->metadata() );
                    $this->template->assign( 'table_name', 'Expense_type' );
                    $this->template->assign( 'template', 'form_expense_type' );
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
        $fields = $this->model_expense_type->fields();
        switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $this->model_expense_type->delete( $id );
                $this->template->assign( 'message', lang('expdeletemessage') );
                $this->template->assign( 'action_mode', 'create' );
                $this->template->assign( 'expense_type_fields', $fields );
                $this->template->assign( 'metadata', $this->model_expense_type->metadata() );
                $this->template->assign( 'table_name', 'Expense_type' );
                $this->template->assign( 'template', 'form_expense_type' );
                $this->template->display( 'frame_admin.tpl' );
            break;

            case 'POST':
                $this->model_expense_type->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
