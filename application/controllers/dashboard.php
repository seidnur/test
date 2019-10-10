<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_controller
{

    /**
     * Dashboard constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_sales');
        $this->load->model('Model_items');

        $this->load->model('Model_categories');
        $this->load->model('Model_users');
    }

    /**
     * This is just a general placeholder controller
     *
     * It is a good idea, to create your users a page
     * to launch general functions or display some stats.
     */
    public function index()
    {
        $this->load->library('template');
        $this->load->helper('url');
        $this->template->assign('template', 'dashboard');

        $this->template->assign('usersCount', $this->Model_users->usersCount());
        $this->template->assign('saleCount', $this->model_sales->salesCount());
        $this->template->assign('categoriesCount', $this->Model_categories->categoriesCount());
        $this->template->assign('itemsCount',$this->Model_items->itemsCount());
        $this->template->display('frame_admin.tpl');
    }

    function switchLanguage($language)
    {
        if (!empty($language)) {
            $this->session->set_userdata('selected_lan', $language);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
/* End of file dasdhboard.php */
/* Location: ./application/controllers/dasdhboard.php */