<?php


class Search extends MY_controller
{
public function __construct()
{
    parent::__construct();
    $this->load->model('Model_search');
}
function index(){
    $keyword=$this->input->post('search');
    $data['search']=$this->Model_search->getSearch($keyword);
    $this->load->view('header');
    $this->load->view('Search',$data);
    $this->load->view('footer');
    if($data==true){
        $this->session->set_flashdata('success', 'Successfully data loaded');
        // redirect('bidding');

    }
    else {
        $this->session->set_flashdata('error', 'Data not found in the record');
        // redirect('bidding');

        $this->load->view('Search',$data);
    }

}

}