<?php

	class Permission extends MY_Controller
	{
		public function __construct ()
		{
			parent::__construct();
	
			$this->load->model('Model_group');
			$this->load->library('form_validation');
			
		}

		

		public function edit ($id)
		{
     //          	if(!in_array('updatePermission', $this->permission)) {
					// 		redirect('dashboard', 'refresh');  
					// }		
			$default_permission = array('' => '', );
			$permisson_data = $this->Model_group->get($id);
			$this->permission =!empty($permisson_data['permission'])? unserialize($permisson_data['permission']):$default_permission;
			$fields = $this->Model_group->fields();
			if ($id) {
				$this->form_validation->set_rules('group', 'Group ID', 'required');
				if ($this->form_validation->run() == TRUE) {
					// true case
					$permission = serialize($this->input->post('permission'));
					$data = array(
						'permission' => $permission
					);
					$message= $this->Model_group->update( $id,$data);
					
					redirect(base_url() . 'permission/edit/' . $id);
				} else {
					
					$this->template->assign('action_mode', 'edit');
					$this->template->assign('record_id', $id);
					$this->template->assign('permission_fields', $fields);
					$this->template->assign('permission_data', $this->permission);
					$this->template->assign('table_name', 'Permissions');
					$this->template->assign('template', 'form_permission');
					$this->template->display('frame_admin.tpl');
				}
			}
		}

		/*
		* If the validation is not valid, then it redirects to the edit group page
		* If the validation is successfully then it updates the data into the database
		* and it stores the operation message into the session flashdata and display on the manage group page
		*/

		public function index ($id=false)
		{

		  //  if(!in_array('viewPermission', $this->permission)) {
				// redirect('dashboard', 'refresh');  
		  //  	}
			
			$data_info = $this->Model_group->lister();
			$fields = $this->Model_group->fields(TRUE);
		    $this->template->assign('action_mode', 'edit');
			$this->template->assign('permission_fields', $fields);
			$this->template->assign('permission_data', $data_info);
			$this->template->assign('table_name', 'Permissions');
			$this->template->assign('template', 'list_group');
			$this->template->display('frame_admin.tpl');

		}

	}