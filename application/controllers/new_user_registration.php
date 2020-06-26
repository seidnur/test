<?php


class new_user_registration extends MY_controller
{
   public function __construct()
   {
       parent::__construct();
       $this->load->model('Model_users');
   }

    public function index(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('header');
            $this->load->view('new_user_registration');
            $this->load->view('footer');
    $data_post['user_name'] = $this->input->post( 'username' );
    $data_post['password'] = password_hash($this->input->post( 'password'), PASSWORD_BCRYPT);
    $data_post['email'] = $this->input->post( 'email' );
    $userdata=$this->Model_users->bid_user($data_post);
        }
        else
        {
//            $this->load->view('new_user_registration');
            $data_post['user_name'] = $this->input->post( 'username' );
            $data_post['password'] = password_hash($this->input->post( 'password' ), PASSWORD_BCRYPT);
            $data_post['email'] = $this->input->post( 'email' );
            $userdata=$this->Model_users->bid_user($data_post);
            if($userdata==true){  $this->session->set_flashdata('success', 'Successfully User Created');
                redirect('login_user');}

        }




}
}