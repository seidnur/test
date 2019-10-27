	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Brands extends MY_controller
	{
	function __construct()
	{
	parent::__construct();
	$this->load->library( 'template' ); 
	$this->load->model( 'model_brands' ); 
	}
	/**
	*  LISTS MODEL DATA INTO A TABLE
	*/         
	function index( $page = 0 )
	{
	$this->model_brands->pagination( TRUE );
	$data_info = $this->model_brands->lister( $page );
	$fields = $this->model_brands->fields( TRUE );
	$this->template->assign( 'pager', $this->model_brands->pager );
	$this->template->assign( 'brands_fields', $fields );
	$this->template->assign( 'brands_data', $data_info );
	$this->template->assign( 'table_name', 'brands' );
	$this->template->assign( 'template', 'list_brands' );
	$this->template->display( 'frame_admin.tpl' );
	}
	/**
	*  SHOWS A RECORD VIEW
	*/
	function show( $id )
	{
	$data = $this->model_brands->get( $id );
	$fields = $this->model_brands->fields( TRUE );
	$this->template->assign( 'id', $id );
	$this->template->assign( 'brands_fields', $fields );
	$this->template->assign( 'brands_data', $data );
	$this->template->assign( 'table_name', 'Brands' );
	$this->template->assign( 'template', 'show_brands' );
	$this->template->display( 'frame_admin.tpl' );
	}
	/**
	*  SHOWS A FROM, AND HANDLES SAVING IT
	*/         
	function create( $id = false )
	{
	$this->load->library('form_validation');
	$categories_set = $this->model_brands->related_categories();

	     $this->template->assign( 'related_categories', $categories_set );
	switch ( $_SERVER ['REQUEST_METHOD'] )
	{
	case 'GET':
	$fields = $this->model_brands->fields();
	$this->template->assign( 'action_mode', 'create' );
	$this->template->assign( 'brands_fields', $fields );
	$this->template->assign( 'metadata', $this->model_brands->metadata() );
	$this->template->assign( 'table_name', 'Brands' );
	$this->template->assign( 'template', 'form_brands' );
	$this->template->display( 'frame_admin.tpl' );
	break;
	/**
	*  Insert data TO brands table
	*/
	case 'POST':
	$fields = $this->model_brands->fields();
	/* we set the rules */
//	$this->form_validation->set_rules( 'brand_name', lang('brand_name'), 'required|max_length[20]' );
//	$this->form_validation->set_rules( 'brand_description', lang('brand_description'), 'required' );
	$this->form_validation->set_rules( 'brand_cat_id', lang('brand_cat_id'), 'required' );
	$data_post['brand_name'] = $this->input->post( 'brand_name' );
	$data_post['brand_description'] = $this->input->post( 'brand_description' );
	$data_post['brand_cat_id'] = $this->input->post( 'brand_cat_id' );
	$data_post['brand_created_by'] =  $this->user;
    $data_post['brand_created_date'] = $this->currentDate;

	if ( $this->form_validation->run() == FALSE )
	{
	$errors = validation_errors();
	$this->template->assign( 'errors', $errors );
	$this->template->assign( 'action_mode', 'create' );
	$this->template->assign( 'brands_data', $data_post );
	$this->template->assign( 'brands_fields', $fields );
	$this->template->assign( 'metadata', $this->model_brands->metadata() );
	$this->template->assign( 'table_name', 'Brands' );
	$this->template->assign( 'template', 'form_brands' );
	$this->template->display( 'frame_admin.tpl' );
	}
	elseif ( $this->form_validation->run() == TRUE )
	{
	$insert_id = $this->model_brands->insert( $data_post );
        $this->template->assign( 'brands_fields', $fields );
        $this->template->assign( 'action_mode', 'create' );
        $this->template->assign( 'brands_data', $data_post );
        $this->template->assign( 'message', lang('message') );
        $this->template->assign( 'metadata', $this->model_brands->metadata() );
        $this->template->assign( 'table_name', 'Brands' );
        $this->template->assign( 'template', 'form_brands' );
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
			$categories_set = $this->model_brands->related_categories();

	     $this->template->assign( 'related_categories', $categories_set );
	$this->load->library('form_validation');
	switch ( $_SERVER ['REQUEST_METHOD'] )
	{
	case 'GET':
	$this->model_brands->raw_data = TRUE;
	$data = $this->model_brands->get( $id );
	$fields = $this->model_brands->fields();
	$this->template->assign( 'action_mode', 'edit' );
	$this->template->assign( 'brands_data', $data );
	$this->template->assign( 'brands_fields', $fields );
	$this->template->assign( 'metadata', $this->model_brands->metadata() );
	$this->template->assign( 'table_name', 'Brands' );
	$this->template->assign( 'template', 'form_brands' );
	$this->template->assign( 'record_id', $id );
	$this->template->display( 'frame_admin.tpl' );
	break;
	case 'POST':
	$fields = $this->model_brands->fields();
	/* we set the rules */
	/* don't forget to edit these */
	$this->form_validation->set_rules( 'brand_name', lang('brand_name'), 'required|max_length[20]' );
	$this->form_validation->set_rules( 'brand_description', lang('brand_description'), 'required' );
	$this->form_validation->set_rules( 'brand_description', lang('brand_description'), 'required' );

	$data_post['brand_name'] = $this->input->post( 'brand_name' );
	$data_post['brand_description'] = $this->input->post( 'brand_description' );
	$data_post['brand_cat_id'] = $this->input->post( 'brand_cat_id' );
	if ( $this->form_validation->run() == FALSE )
	{
	$errors = validation_errors();
	$this->template->assign( 'action_mode', 'edit' );
	$this->template->assign( 'errors', $errors );
	$this->template->assign( 'brands_data', $data_post );
	$this->template->assign( 'brands_fields', $fields );
	$this->template->assign( 'metadata', $this->model_brands->metadata() );
	$this->template->assign( 'table_name', 'Brands' );
	$this->template->assign( 'template', 'form_brands' );
	$this->template->assign( 'record_id', $id );
	$this->template->display( 'frame_admin.tpl' );
	}
	elseif ( $this->form_validation->run() == TRUE )
	{
	$this->model_brands->update( $id, $data_post );
        $this->template->assign( 'action_mode', 'edit' );
        $this->template->assign( 'message', lang('editbrand') );
        $this->template->assign( 'brands_fields', $fields );
        $this->template->assign( 'table_name', 'Brands' );
        $this->template->assign( 'template', 'list_brands' );
        $this->template->assign( 'record_id', $id );
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
	switch ( $_SERVER ['REQUEST_METHOD'] )
	{
	case 'GET':
	$this->model_brands->delete( $id );
        $this->template->assign( 'action_mode', 'edit' );
        $this->template->assign( 'message', lang('deletebrand') );
        $this->template->assign( 'metadata', $this->model_brands->metadata() );
        $this->template->assign( 'table_name', 'Brands' );
        $this->template->assign( 'template', 'list_brands' );
        $this->template->assign( 'record_id', $id );
        $this->template->display( 'frame_admin.tpl' );

	break;
	case 'POST':
	$this->model_brands->delete( $this->input->post('delete_ids') );
	redirect( $_SERVER['HTTP_REFERER'] );
	break;
	}
	}
	}
