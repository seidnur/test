<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidders extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_bidders' ); 
     	$this->load->model( 'uploader' );
		}



    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function index( $page = 0 )
    {
        $this->model_bidders->pagination( TRUE );
		$data_info = $this->model_bidders->lister( $page );
        $fields = $this->model_bidders->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_bidders->pager );
		$this->template->assign( 'bidders_fields', $fields );
		$this->template->assign( 'bidders_data', $data_info );
        $this->template->assign( 'table_name', 'Bidders' );
        $this->template->assign( 'template', 'list_bidders' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_bidders->get( $id );
        $fields = $this->model_bidders->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'bidders_fields', $fields );
		$this->template->assign( 'bidders_data', $data );
		$this->template->assign( 'table_name', 'Bidders' );
		$this->template->assign( 'template', 'show_bidders' );
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
                $fields = $this->model_bidders->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'bidders_fields', $fields );
                $this->template->assign( 'metadata', $this->model_bidders->metadata() );
        		$this->template->assign( 'table_name', 'Bidders' );
        		$this->template->assign( 'template', 'form_bidders' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO bidders table
             */
            case 'POST':
                $fields = $this->model_bidders->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'bidders_first_name', lang('bidders_first_name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_last_name', lang('bidders_last_name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_middel_name', lang('bidders_middel_name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_gender', lang('bidders_gender'), 'required' );
				$this->form_validation->set_rules( 'bidders_address', lang('bidders_address'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_pphone', lang('bidders_pphone'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_emaile', lang('bidders_emaile'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_submit_date', lang('bidders_submit_date'), 'required' );
				$this->form_validation->set_rules( 'bidders_inserted_money', lang('bidders_inserted_money'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'bidders_comment', lang('bidders_comment'), 'required' );
				if( !$_FILES['received_bidder_document']['name'] && !$this->input->post( 'received_bidder_document-original-name' ) ) $this->uploader->required_empty .= '<p>'.lang('received_bidder_document').' is required!</p>';

				$data_post['bidders_first_name'] = $this->input->post( 'bidders_first_name' );
				$data_post['bidders_last_name'] = $this->input->post( 'bidders_last_name' );
				$data_post['bidders_middel_name'] = $this->input->post( 'bidders_middel_name' );
				$data_post['bidders_gender'] = $this->input->post( 'bidders_gender' );
				$data_post['bidders_address'] = $this->input->post( 'bidders_address' );
				$data_post['bidders_pphone'] = $this->input->post( 'bidders_pphone' );
				$data_post['bidders_emaile'] = $this->input->post( 'bidders_emaile' );
				$data_post['bidders_submit_date'] = $this->input->post( 'bidders_submit_date' );
				$data_post['bidders_inserted_money'] = $this->input->post( 'bidders_inserted_money' );
				$data_post['bidders_comment'] = $this->input->post( 'bidders_comment' );
				$data_post['received_bidder_document'] = ( empty( $_FILES['received_bidder_document']['name'] ) ) ?
                    $this->input->post( 'received_bidder_document-original-name' ) :
                    $this->uploader->upload( 'received_bidder_document' );

                if ( $this->form_validation->run() == FALSE || $this->uploader->success == FALSE ||
                    $this->uploader->required_empty !== FALSE)
                {
                    $errors = validation_errors();
                    $errors .= ( $this->uploader->success ) ? '' : $this->uploader->response;
					$errors .= $this->uploader->required_empty;
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'bidders_data', $data_post );
            		$this->template->assign( 'bidders_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_bidders->metadata() );
            		$this->template->assign( 'table_name', 'Bidders' );
            		$this->template->assign( 'template', 'form_bidders' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_bidders->insert( $data_post );
                    
					redirect( 'bidders' );
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
                $this->model_bidders->raw_data = TRUE;
        		$data = $this->model_bidders->get( $id );
                $fields = $this->model_bidders->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'bidders_data', $data );
        		$this->template->assign( 'bidders_fields', $fields );
                $this->template->assign( 'metadata', $this->model_bidders->metadata() );
        		$this->template->assign( 'table_name', 'Bidders' );
        		$this->template->assign( 'template', 'form_bidders' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_bidders->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'bidders_first_name', lang('bidders_first_name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_last_name', lang('bidders_last_name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_middel_name', lang('bidders_middel_name'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_gender', lang('bidders_gender'), 'required' );
				$this->form_validation->set_rules( 'bidders_address', lang('bidders_address'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_pphone', lang('bidders_pphone'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_emaile', lang('bidders_emaile'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'bidders_submit_date', lang('bidders_submit_date'), 'required' );
				$this->form_validation->set_rules( 'bidders_inserted_money', lang('bidders_inserted_money'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'bidders_comment', lang('bidders_comment'), 'required' );
				if( !$_FILES['received_bidder_document']['name'] && !$this->input->post( 'received_bidder_document-original-name' ) ) $this->uploader->required_empty .= '<p>'.lang('received_bidder_document').' is required!</p>';

				$data_post['bidders_first_name'] = $this->input->post( 'bidders_first_name' );
				$data_post['bidders_last_name'] = $this->input->post( 'bidders_last_name' );
				$data_post['bidders_middel_name'] = $this->input->post( 'bidders_middel_name' );
				$data_post['bidders_gender'] = $this->input->post( 'bidders_gender' );
				$data_post['bidders_address'] = $this->input->post( 'bidders_address' );
				$data_post['bidders_pphone'] = $this->input->post( 'bidders_pphone' );
				$data_post['bidders_emaile'] = $this->input->post( 'bidders_emaile' );
				$data_post['bidders_submit_date'] = $this->input->post( 'bidders_submit_date' );
				$data_post['bidders_inserted_money'] = $this->input->post( 'bidders_inserted_money' );
				$data_post['bidders_comment'] = $this->input->post( 'bidders_comment' );
				$data_post['received_bidder_document'] = ( empty( $_FILES['received_bidder_document']['name'] ) ) ? $this->input->post( 'received_bidder_document-original-name' ) : $this->uploader->upload( 'received_bidder_document' );

                if ( $this->form_validation->run() == FALSE || $this->uploader->success == FALSE || $this->uploader->required_empty !== FALSE)
                {
                    $errors = validation_errors();
                    $errors .= ( $this->uploader->success ) ? '' : $this->uploader->response;
					$errors .= $this->uploader->required_empty;
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'bidders_data', $data_post );
            		$this->template->assign( 'bidders_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_bidders->metadata() );
            		$this->template->assign( 'table_name', 'Bidders' );
            		$this->template->assign( 'template', 'form_bidders' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_bidders->update( $id, $data_post );
				    
					redirect( 'bidders/show/' . $id );   
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
                $this->model_bidders->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_bidders->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
