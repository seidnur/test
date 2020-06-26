<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_campany extends MY_controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_tbl_campany' ); 


		$this->lang->load( 'db_fields', 'english' ); // This is the language file
	}



    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function index( $page = 0 )
    {
        $this->model_tbl_campany->pagination( TRUE );
		$data_info = $this->model_tbl_campany->lister( $page );
        $fields = $this->model_tbl_campany->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_tbl_campany->pager );
		$this->template->assign( 'tbl_campany_fields', $fields );
		$this->template->assign( 'tbl_campany_data', $data_info );
        $this->template->assign( 'table_name', 'Tbl_campany' );
        $this->template->assign( 'template', 'list_tbl_campany' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_tbl_campany->get( $id );
        $fields = $this->model_tbl_campany->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'tbl_campany_fields', $fields );
		$this->template->assign( 'tbl_campany_data', $data );
		$this->template->assign( 'table_name', 'Tbl_campany' );
		$this->template->assign( 'template', 'show_tbl_campany' );
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
                $fields = $this->model_tbl_campany->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'tbl_campany_fields', $fields );
                $this->template->assign( 'metadata', $this->model_tbl_campany->metadata() );
        		$this->template->assign( 'table_name', 'Tbl_campany' );
        		$this->template->assign( 'template', 'form_tbl_campany' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO tbl_campany table
             */
            case 'POST':
                $fields = $this->model_tbl_campany->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'company_name', lang('company_name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'company_address', lang('company_address'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'company_owner', lang('company_owner'), 'required|max_length[50]' );

				$data_post['company_name'] = $this->input->post( 'company_name' );
				$data_post['company_address'] = $this->input->post( 'company_address' );
				$data_post['company_owner'] = $this->input->post( 'company_owner' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'tbl_campany_data', $data_post );
            		$this->template->assign( 'tbl_campany_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_campany->metadata() );
            		$this->template->assign( 'table_name', 'Tbl_campany' );
            		$this->template->assign( 'template', 'form_tbl_campany' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_tbl_campany->insert( $data_post );
                    
					redirect( 'tbl_campany' );
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
                $this->model_tbl_campany->raw_data = TRUE;
        		$data = $this->model_tbl_campany->get( $id );
                $fields = $this->model_tbl_campany->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'tbl_campany_data', $data );
        		$this->template->assign( 'tbl_campany_fields', $fields );
                $this->template->assign( 'metadata', $this->model_tbl_campany->metadata() );
        		$this->template->assign( 'table_name', 'Tbl_campany' );
        		$this->template->assign( 'template', 'form_tbl_campany' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_tbl_campany->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'company_name', lang('company_name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'company_address', lang('company_address'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'company_owner', lang('company_owner'), 'required|max_length[50]' );

				$data_post['company_name'] = $this->input->post( 'company_name' );
				$data_post['company_address'] = $this->input->post( 'company_address' );
				$data_post['company_owner'] = $this->input->post( 'company_owner' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'tbl_campany_data', $data_post );
            		$this->template->assign( 'tbl_campany_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_campany->metadata() );
            		$this->template->assign( 'table_name', 'Tbl_campany' );
            		$this->template->assign( 'template', 'form_tbl_campany' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_tbl_campany->update( $id, $data_post );
				    
					redirect( 'tbl_campany/show/' . $id );   
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
                $this->model_tbl_campany->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_tbl_campany->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
