<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class bid_users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Model_bid_user');
    }

    private function logged_in()
    {
        if( ! $this->session->userdata('authenticated')){
            redirect('login_user');
        }
    }

    public function login()
    {
        $data['title'] = "Login";

        $this->form_validation->set_rules('username', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false){
            $this->load->view('header', $data);
            $this->load->view('login_user', $data);
            $this->load->view('footer', $data);
        }
        else {
            $email = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $user = $this->Model_bid_user->login($email, $password);

            if($user){
                $userdata = array(
                    'id' => $user->id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'authenticated' => TRUE
                );

                $this->session->set_userdata($userdata);

                redirect('bidder');
            }
            else {
                $this->session->set_flashdata('message', 'Invalid email or password');
                redirect('login_user');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_user');
    }
}