<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends MY_controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_setting' ); 
	}



    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function index( $page = 0 )
    {
        $this->model_setting->pagination( TRUE );
		$data_info = $this->model_setting->lister( $page );
        $fields = $this->model_setting->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_setting->pager );
		$this->template->assign( 'setting_fields', $fields );
		$this->template->assign( 'setting_data', $data_info );
        $this->template->assign( 'table_name', 'Setting' );
        $this->template->assign( 'template', 'list_setting' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_setting->get( $id );
        $fields = $this->model_setting->fields( TRUE );
        

        
        $this->template->assign( 'st_id', $id );
		$this->template->assign( 'setting_fields', $fields );
		$this->template->assign( 'setting_data', $data );
		$this->template->assign( 'table_name', 'Setting' );
		$this->template->assign( 'template', 'show_setting' );
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
                $fields = $this->model_setting->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'setting_fields', $fields );
                $this->template->assign( 'metadata', $this->model_setting->metadata() );
        		$this->template->assign( 'table_name', 'Setting' );
        		$this->template->assign( 'template', 'form_setting' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO setting table
             */
            case 'POST':
                $fields = $this->model_setting->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'service_charge_value', lang('service_charge_value'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'vat_charge_value', lang('vat_charge_value'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'currency', lang('currency'), 'required|max_length[50]' );

				$data_post['service_charge_value'] = $this->input->post( 'service_charge_value' );
				$data_post['vat_charge_value'] = $this->input->post( 'vat_charge_value' );
				$data_post['currency'] = $this->input->post( 'currency' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'setting_data', $data_post );
            		$this->template->assign( 'setting_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_setting->metadata() );
            		$this->template->assign( 'table_name', 'Setting' );
            		$this->template->assign( 'template', 'form_setting' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_setting->insert( $data_post );
                    
					redirect( 'setting' );
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
                $this->model_setting->raw_data = TRUE;
        		$data = $this->model_setting->get( $id );
                $fields = $this->model_setting->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'setting_data', $data );
        		$this->template->assign( 'setting_fields', $fields );
                $this->template->assign( 'metadata', $this->model_setting->metadata() );
        		$this->template->assign( 'table_name', 'Setting' );
        		$this->template->assign( 'template', 'form_setting' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_setting->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'service_charge_value', lang('service_charge_value'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'vat_charge_value', lang('vat_charge_value'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'currency', lang('currency'), 'required|max_length[50]' );

				$data_post['service_charge_value'] = $this->input->post( 'service_charge_value' );
				$data_post['vat_charge_value'] = $this->input->post( 'vat_charge_value' );
				$data_post['currency'] = $this->input->post( 'currency' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'setting_data', $data_post );
            		$this->template->assign( 'setting_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_setting->metadata() );
            		$this->template->assign( 'table_name', 'Setting' );
            		$this->template->assign( 'template', 'form_setting' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_setting->update( $id, $data_post );
				    
					redirect( 'setting/show/' . $id );   
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
                $this->model_setting->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_setting->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
