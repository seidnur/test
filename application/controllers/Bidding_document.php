<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidding_document extends MY_controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_bidding_document' ); 
		$this->load->model( 'uploader' );
		$this->load->helper( 'form' );
		$this->load->helper( 'language' ); 
		$this->load->helper( 'url' );
		$this->lang->load( 'db_fields', 'english' ); // This is the language file
	}
	    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function index( $page = 0 )
    {
        $this->model_bidding_document->pagination( TRUE );
		$data_info = $this->model_bidding_document->lister( $page );
        $fields = $this->model_bidding_document->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_bidding_document->pager );
		$this->template->assign( 'bidding_document_fields', $fields );
		$this->template->assign( 'bidding_document_data', $data_info );
        $this->template->assign( 'table_name', 'Bidding_document' );
        $this->template->assign( 'template', 'list_bidding_document' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_bidding_document->get( $id );
        $fields = $this->model_bidding_document->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'bidding_document_fields', $fields );
		$this->template->assign( 'bidding_document_data', $data );
		$this->template->assign( 'table_name', 'Bidding_document' );
		$this->template->assign( 'template', 'show_bidding_document' );
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
                $fields = $this->model_bidding_document->fields();
                $tbl_campany_set = $this->model_bidding_document->related_tbl_campany();

                $this->template->assign( 'related_tbl_campany', $tbl_campany_set );

                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'bidding_document_fields', $fields );
                $this->template->assign( 'metadata', $this->model_bidding_document->metadata() );
        		$this->template->assign( 'table_name', 'Bidding_document' );
        		$this->template->assign( 'template', 'form_bidding_document' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO bidding_document table
             */
            case 'POST':
                $fields = $this->model_bidding_document->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'bidding_company_id', lang('bidding_company_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'Document_name', lang('Document_name'), 'required|max_length[150]' );
				if( !$_FILES['Document_image']['name'] && !$this->input->post( 'Document_image-original-name' ) ) $this->uploader->required_empty .= '<p>'.lang('Document_image').' is required!</p>';
				$this->form_validation->set_rules( 'Document_crated_date', lang('Document_crated_date'), 'required' );
				$this->form_validation->set_rules( 'Document_inserted_by', lang('Document_inserted_by'), 'required' );
				$this->form_validation->set_rules( 'Document_discription', lang('Document_discription'), 'required' );
				$this->form_validation->set_rules( 'biding_end_date', lang('biding_end_date'), 'required' );

				$data_post['bidding_company_id'] = $this->input->post( 'bidding_company_id' );
				$data_post['Document_name'] = $this->input->post( 'Document_name' );
				$data_post['Document_image'] = ( empty( $_FILES['Document_image']['name'] ) ) ? $this->input->post( 'Document_image-original-name' ) : $this->uploader->upload( 'Document_image' );
				$data_post['Document_crated_date'] = $this->input->post( 'Document_crated_date' );
				$data_post['Document_inserted_by'] = $this->user;
				$data_post['Document_discription'] = $this->input->post( 'Document_discription' );
				$data_post['biding_end_date'] = $this->input->post( 'biding_end_date' );

                if ( $this->form_validation->run() == FALSE || $this->uploader->success == FALSE || $this->uploader->required_empty !== FALSE)
                {
                    $errors = validation_errors();
                    $errors .= ( $this->uploader->success ) ? '' : $this->uploader->response;
					$errors .= $this->uploader->required_empty;
                    $tbl_campany_set = $this->model_bidding_document->related_tbl_campany();

                    $this->template->assign( 'related_tbl_campany', $tbl_campany_set );

                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'bidding_document_data', $data_post );
            		$this->template->assign( 'bidding_document_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_bidding_document->metadata() );
            		$this->template->assign( 'table_name', 'Bidding_document' );
            		$this->template->assign( 'template', 'form_bidding_document' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_bidding_document->insert( $data_post );
                    
					redirect( 'bidding_document' );
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
                $this->model_bidding_document->raw_data = TRUE;
        		$data = $this->model_bidding_document->get( $id );
                $fields = $this->model_bidding_document->fields();
                $tbl_campany_set = $this->model_bidding_document->related_tbl_campany();

                
                $this->template->assign( 'related_tbl_campany', $tbl_campany_set );

                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'bidding_document_data', $data );
        		$this->template->assign( 'bidding_document_fields', $fields );
                $this->template->assign( 'metadata', $this->model_bidding_document->metadata() );
        		$this->template->assign( 'table_name', 'Bidding_document' );
        		$this->template->assign( 'template', 'form_bidding_document' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_bidding_document->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'bidding_company_id', lang('bidding_company_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'Document_name', lang('Document_name'), 'required|max_length[150]' );
				if( !$_FILES['Document_image']['name'] && !$this->input->post( 'Document_image-original-name' ) ) $this->uploader->required_empty .= '<p>'.lang('Document_image').' is required!</p>';
				$this->form_validation->set_rules( 'Document_crated_date', lang('Document_crated_date'), 'required' );
				$this->form_validation->set_rules( 'Document_inserted_by', lang('Document_inserted_by'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'Document_discription', lang('Document_discription'), 'required' );
				$this->form_validation->set_rules( 'biding_end_date', lang('biding_end_date'), 'required' );

				$data_post['bidding_company_id'] = $this->input->post( 'bidding_company_id' );
				$data_post['Document_name'] = $this->input->post( 'Document_name' );
				$data_post['Document_image'] = ( empty( $_FILES['Document_image']['name'] ) ) ? $this->input->post( 'Document_image-original-name' ) : $this->uploader->upload( 'Document_image' );
				$data_post['Document_crated_date'] = $this->input->post( 'Document_crated_date' );
				$data_post['Document_inserted_by'] = $this->user;
				$data_post['Document_discription'] = $this->input->post( 'Document_discription' );
				$data_post['biding_end_date'] = $this->input->post( 'biding_end_date' );

                if ( $this->form_validation->run() == FALSE || $this->uploader->success == FALSE || $this->uploader->required_empty !== FALSE)
                {
                    $errors = validation_errors();
                    $errors .= ( $this->uploader->success ) ? '' : $this->uploader->response;
					$errors .= $this->uploader->required_empty;
                    $tbl_campany_set = $this->model_bidding_document->related_tbl_campany();

                    $this->template->assign( 'related_tbl_campany', $tbl_campany_set );

                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'bidding_document_data', $data_post );
            		$this->template->assign( 'bidding_document_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_bidding_document->metadata() );
            		$this->template->assign( 'table_name', 'Bidding_document' );
            		$this->template->assign( 'template', 'form_bidding_document' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_bidding_document->update( $id, $data_post );
				    
					redirect( 'bidding_document/show/' . $id );   
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
                $this->model_bidding_document->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_bidding_document->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
