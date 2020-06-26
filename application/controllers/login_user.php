<?php

class login_user extends MY_controller
{
public function __construct()
{
    parent::__construct();
    $this->load->model('Model_auth');
}

    public function index(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );

        if ($this->form_validation->run() == FALSE)
        {   $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
            $email = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->Model_auth->loginuser($email, $password);
            if (count($result) > 0) { $this->session->set_flashdata('success', 'Successfully User Logged');
                redirect('bidder');}
        }
        else
        {
            $this->load->view('login');
            $email = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->Model_auth->loginuser($email, $password);
            if (count($result) >0) {
              $this->session->set_flashdata('success', 'Successfully User Logged');
                redirect('bidder');
            }


        }



}


}