<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Login extends MY_controller
	{
		function __construct ()
		{
			parent::__construct();
			$this->load->database();
			$this->load->library('template');
			$this->load->helper('url');
			$this->load->model('Model_auth');
		}
		/**
		 *  Validate login
		 */
		public function validate ()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email', 'required|max_length[128]|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

			if ($this->form_validation->run() == FALSE) {
				$this->template->assign('errors',validation_errors());
				$this->index();
			} else {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$result = $this->Model_auth->loginMe($email, $password);
				if (count($result) > 0) {
					foreach ($result as $res) {
						$sessionArray = array('userId' => $res->user_emp_id,
							'role_id' => $res->group_id,
							'role_text' => $res->group_name,
							'full_name' => $res->full_name,
							'user_name' => $res->user_name,
							'emp_id' => $res->user_emp_id,
							'userLoggedIn' => TRUE
						);
						$this->session->set_userdata($sessionArray);
						redirect('dashboard','refresh');
					}
				} else {

					$this->template->assign('error', TRUE);
					$this->template->assign('template', 'form_login');
					$this->template->display('frame_admin.tpl');
				}
			}
		}

		function index ($error = FALSE)
		{
			if ($error) {
				$this->template->assign('error', TRUE);
			}
			if ($this->isLoggedIn == 1) {
				redirect('dashboard');
			} else {
				$this->template->assign('template', 'form_login');
			}
			$this->template->display('frame_admin.tpl');
		}

		function logout ()
		{
			
				$sessionArray =array('userId' =>'' ,
							'role_id' => '',
							'role_text' =>'' ,
							'full_name' =>'' ,
							'user_name' =>'' ,
							'emp_id' =>'',
							'userLoggedIn' => FALSE
					         	);

						$this->session->set_userdata($sessionArray);
			redirect(base_url() . 'login');
		}
	}
