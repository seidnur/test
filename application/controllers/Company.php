<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends MY_controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' );
		$this->load->model( 'model_company' );

	}

    function index( $page = 0 )
    {
        $this->model_company->pagination( TRUE );
		$data_info = $this->model_company->lister( $page );
        $fields = $this->model_company->fields( TRUE );
        $this->template->assign( 'pager', $this->model_company->pager );
		$this->template->assign( 'company_fields', $fields );
		$this->template->assign( 'company_data', $data_info );
        $this->template->assign( 'table_name', 'Company' );
        $this->template->assign( 'template', 'list_company' );
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_company->get( $id );
        $fields = $this->model_company->fields( TRUE );



        $this->template->assign( 'id', $id );
		$this->template->assign( 'company_fields', $fields );
		$this->template->assign( 'company_data', $data );
		$this->template->assign( 'table_name', 'Company' );
		$this->template->assign( 'template', 'show_company' );
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
                $fields = $this->model_company->fields();


                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'company_fields', $fields );
                $this->template->assign( 'metadata', $this->model_company->metadata() );
        		$this->template->assign( 'table_name', 'Company' );
        		$this->template->assign( 'template', 'form_company' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO company table
             */
            case 'POST':
                $fields = $this->model_company->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'company_name', lang('company_name'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'service_charge_value', lang('service_charge_value'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'vat_charge_value', lang('vat_charge_value'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'address', lang('address'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'phone', lang('phone'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'country', lang('country'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'message', lang('message'), 'required' );
				$this->form_validation->set_rules( 'currency', lang('currency'), 'required|max_length[255]' );

				$data_post['company_name'] = $this->input->post( 'company_name' );
				$data_post['service_charge_value'] = $this->input->post( 'service_charge_value' );
				$data_post['vat_charge_value'] = $this->input->post( 'vat_charge_value' );
				$data_post['address'] = $this->input->post( 'address' );
				$data_post['phone'] = $this->input->post( 'phone' );
				$data_post['country'] = $this->input->post( 'country' );
				$data_post['message'] = $this->input->post( 'message' );
				$data_post['currency'] = $this->input->post( 'currency' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'company_data', $data_post );
            		$this->template->assign( 'company_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_company->metadata() );
            		$this->template->assign( 'table_name', 'Company' );
            		$this->template->assign( 'template', 'form_company' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_company->insert( $data_post );
                    
					redirect( 'company' );
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
                $this->model_company->raw_data = TRUE;
        		$data = $this->model_company->get( $id );
                $fields = $this->model_company->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'company_data', $data );
        		$this->template->assign( 'company_fields', $fields );
                $this->template->assign( 'metadata', $this->model_company->metadata() );
        		$this->template->assign( 'table_name', 'Company' );
        		$this->template->assign( 'template', 'form_company' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_company->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'company_name', lang('company_name'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'service_charge_value', lang('service_charge_value'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'vat_charge_value', lang('vat_charge_value'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'address', lang('address'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'phone', lang('phone'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'country', lang('country'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'message', lang('message'), 'required' );
				$this->form_validation->set_rules( 'currency', lang('currency'), 'required|max_length[255]' );

				$data_post['company_name'] = $this->input->post( 'company_name' );
				$data_post['service_charge_value'] = $this->input->post( 'service_charge_value' );
				$data_post['vat_charge_value'] = $this->input->post( 'vat_charge_value' );
				$data_post['address'] = $this->input->post( 'address' );
				$data_post['phone'] = $this->input->post( 'phone' );
				$data_post['country'] = $this->input->post( 'country' );
				$data_post['message'] = $this->input->post( 'message' );
				$data_post['currency'] = $this->input->post( 'currency' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'company_data', $data_post );
            		$this->template->assign( 'company_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_company->metadata() );
            		$this->template->assign( 'table_name', 'Company' );
            		$this->template->assign( 'template', 'form_company' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_company->update( $id, $data_post );
				    
					redirect( 'company/show/' . $id );   
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
                $this->model_company->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_company->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
