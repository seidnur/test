<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class bidding extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Model_bidding');
        $this->load->model('Model_bidder');
        $this->load->model('uploader');
        $this->load->helper(array('url'));
    }
public function index(){
    $this->load->view('header');
           $this->load->view('bidding');
          $this->load->view('footer');
}
    public function register_bidder()
    {
//        $this->form_validation->set_rules('fname', 'First Name', 'required');
//        if($this->form_validation->run()==false){
//            $this->load->view('header');
//            $this->load->view('bidding');
//            $this->load->view('footer');
//           $bidder = array('bidders_first_name' => $this->input->post('fname'),
//            'bidders_last_name' => $this->input->post('lname'),
//            'bidders_middel_name' => $this->input->post('mname'),
//            'bidders_gender' => $this->input->post('gender'),
//            'bidders_address' => $this->input->post('address')
//        ,   'bidders_pphone' => $this->input->post('phone'),
//            'bidders_emaile' => $this->input->post('email'),
//            'bidders_submit_date' => $this->input->post('edate')
//        ,   'bidders_inserted_money' => $this->input->post('price'),
//            'bidders_comment' => $this->input->post('edate'),
//            'received_bidder_document' => (empty($_FILES['received_bidder_document']['name'])) ?
//                $this->input->post('received_bidder_document-original-name') :
//                $this->uploader->upload('received_bidder_document'));
//                $insert_id = $this->Model_bidder->register($bidder);
//                if($insert_id==true) {
//                    $this->load->view('bidding');
//                    $this->session->set_flashdata('success', 'Successfully Registered');
//                    redirect('bidding');
//
//
//                }
//        else{
//            $this->load->view('bidding');
//        }}
//    else{
//        $this->session->set_flashdata('success', 'Successfully Registered');
//        redirect('bidding');
//    }
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );


        if ($this->form_validation->run() == FALSE)
        {

            $bidder = array('bidders_first_name' => $this->input->post('fname'),
            'bidders_last_name' => $this->input->post('lname'),
            'bidders_middel_name' => $this->input->post('mname'),
            'bidders_gender' => $this->input->post('gender'),
            'bidders_address' => $this->input->post('address'),
           'bidders_pphone' => $this->input->post('phone'),
            'bidders_emaile' => $this->input->post('email'),
            'bidders_submit_date' => $this->input->post('edate'),
          'bidders_inserted_money' => $this->input->post('price'),
            'bidders_comment' => $this->input->post('edate'),
            'received_bidder_document' => (empty($_FILES['received_bidder_document']['name'])) ?
                $this->input->post('received_bidder_document-original-name') :
                $this->uploader->upload('received_bidder_document'));
                $insert_id = $this->Model_bidder->register($bidder);
                if($insert_id==true){
                    $this->session->set_flashdata('success', 'Successfully Registered');
                  redirect('bidding');
                }
                else{
                    $this->session->set_flashdata('success', 'Successfully Registered');
                    redirect('bidding');

                }


        }
        else
        {
            $this->load->view('bidding');
        }

    }
}