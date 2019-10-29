<?php
/**
 * Created by PhpStorm.
 * User: Pc
 * Date: 6/22/2019
 * Time: 10:25 AM
 */

class MY_controller extends CI_Controller
{
    var $searchTitle = "";


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->library('user_agent');
        $this->load->library('session');
        $this->load->library('template');
        $this->load->model('Model_group');

        //echo $this->agent->platform();
        // Platform info (Windows, Linux, Mac, etc.)
        $logged_users = $this->session->all_userdata();
        $currentLanuage = $this->session->userdata('selected_lan');
        //$this->lang->load( 'db_fields', "english");
        if (!isset($currentLanuage) || empty($currentLanuage)) {
            $currentLanuage = 'english';
        }
        // display appropriate message
        $this->message='';
        if (isset($message) && empty($message)){
            $this->template->assign('message',$message);
        }

        $this->template->assign('selected_language', $currentLanuage); // This is the language file
        $this->lang->load('db_fields', $currentLanuage); // This is the language file
        $this->controllerName = $this->router->fetch_class();
        $this->methodName = $this->router->fetch_method();
        $this->currentDate = date("Y-m-d", strtotime("now"));
        $this->isLoggedIn = $this->session->userdata('userLoggedIn');
        $this->user = $this->session->userdata('emp_id');
        $this->user_full_name = $this->session->userdata('full_name');
        $this->user_name = $this->session->userdata('user_name');
        //Group of user like seller, admin
        $this->group = $this->session->userdata('role_id');
        if (($this->session->userdata('userLoggedIn') == FALSE) && ($this->group == "")) {

            $session_data = array('userLoggedIn' => FALSE);
            $this->session->set_userdata($session_data);
            $this->template->assign('logged_in', false);

        } else {
            $this->template->assign('group', $this->group);
            $this->template->assign('userid', $this->user);
            $this->template->assign('user', $this->user_name);
            $this->template->assign('logged_in', $this->isLoggedIn);
            $permissiondata = array();
            if (!empty($this->group)) {
                $permisson_data = $this->Model_group->get($this->group);
                $this->data['user_permission'] = unserialize($permisson_data['permission']);
                $this->permission = unserialize($permisson_data['permission']);
            }
            $this->template->assign('permission', !empty($this->permission) ? $this->permission : $permissiondata);
        }
    }

    //START GENERATE SEARCH FORM
    function displaySearchForm($searchParams = false)
    {
        //$searchParams=array(array("lg_name",'text'), array("lg_country",'text'), array("lg_desc",'text'));
        $searchparamCount = count($searchParams);
        $searchForm = '<div class="input-group" id="search-container" style="width:' . (270 + $searchparamCount * 170) . 'px;float:right">';
        $methodName = $this->router->fetch_method();
        $showRep = "checked";
        // var_dump($showRep);
        $searchForm .= '<span class="hidden input-group-btn"><label class="form-control"><input id="showRep" name="showRep" style="width:20px" type="checkbox" ' . $showRep . '>L</label></span>';
        if (isset($searchParams) && !empty($searchParams) && count($searchParams) > 0) {
            foreach ($searchParams as $key => $row) {
                if ($searchParams[$key]['type'] == 'text' || $searchParams[$key]['type'] == 'number') {
                    $searchForm .= $this->generateSearchComponent($searchParams[$key]['name'], $searchParams[$key]['type']);
                } else if ($searchParams[$key]['type'] == 'dropdown') {
                    $fieldName = $searchParams[$key]['name'];
                    $tableName = $searchParams[$key]['table_name'];
                    //get dropdown table name,
                    $primaryKey = $searchParams[$key]['key_name'];
                    $fieldLabel = $searchParams[$key]['field_label'];
                    //loop through row and construct dropdown
                    $modelName = 'Model_' . $tableName . '';
                    $this->load->model($modelName);
                    $dropdownList = $this->$modelName->lister();
                    //var_dump($dropdownList);
                    $inputValue = $this->input->post("" . $fieldName . "");
                    $searchForm .= '<span class="input-group-btn" style="width:160px"><select data-live-search="true" id="' . $fieldName . '" name="' . $fieldName . '" class="selectpicker form-control"><option value="">' . lang('' . $fieldName . '') . '  ' . lang('all') . ' </option>';
                    foreach ($dropdownList as $key1 => $value) {
                        if (($inputValue == $value['' . $primaryKey . ''])) {
                            $this->searchTitle .= '<span>' . lang('' . $fieldName . '') . ' : ' . $value['' . $fieldLabel . ''] . '</span><br>';
                            $searchForm .= '<option selected="true" value="' . $value['' . $primaryKey . ''] . '">' . $value['' . $fieldLabel . ''] . '</option>';
                        } else {
                            $searchForm .= '<option value="' . $value['' . $primaryKey . ''] . '">' . $value['' . $fieldLabel . ''] . '</option>';
                        }
                    }
                    $searchForm .= '</select></span>';
                } else if ($searchParams[$key]['type'] == 'enum') {
                    $fieldName = $searchParams[$key]['name'];
                    $tableName = $searchParams[$key]['table_name'];
                    $modelName = 'Model_' . $tableName . '';
                    $this->load->model($modelName);
                    $dropdownList = $this->$modelName->metadata();
                    $inputValue = $this->input->post("" . $fieldName . "");
                    $searchForm .= '<span class="input-group-btn" style="width:150px"><select data-live-search="true" id="' . $fieldName . '" name="' . $fieldName . '" class="selectpicker form-control"><option value="">' . lang('' . $fieldName . '') . '  ' . lang('all') . ' </option>';
                    foreach ($dropdownList['' . $fieldName . '']['enum_values'] as $key1 => $value) {
                        if (($inputValue == $value)) {
                            $this->searchTitle .= '<span>' . lang('' . $fieldName . '') . ' : ' . $value . '</span><br>';
                            $searchForm .= '<option selected="true" value="' . $value . '">' . $value . '</option>';
                        } else {
                            $searchForm .= '<option value="' . $value . '">' . $value . '</option>';
                        }
                    }
                    $searchForm .= '</select></span>';
                } else if ($searchParams[$key]['type'] == 'date') {
                    //date range search
                    //<select class="form-control"><option>Select Duration</option><option>Today</option><option>This Month</option></select>
                    $fieldName = $searchParams[$key]['name'];
                    $startDate = $this->input->post('' . $fieldName . 'startDate');
                    $endDate = $this->input->post('' . $fieldName . 'endDate');
                    $this->searchTitle .= '<span>' . lang('' . $fieldName . '') . ' : ' . $startDate . 'to ' . $endDate . ' </span><br>';
                    $searchForm .= '<span class="input-group-btn"><input style="width:140px" value="' . $startDate . '" type="text" id="' . $fieldName . 'startDate" 
    name="' . $fieldName . 'startDate" class="datepicker form-control"  placeholder="' . lang('from') . ':' . lang($fieldName) . '"></span><span class="input-group-btn"><input style="width:140px" value="' . $endDate . '" type="text" id="' . $fieldName . 'endDate" name="' . $fieldName . 'endDate" class="datepicker form-control" placeholder="' . lang('to') . ':' . lang($fieldName) . '"></span>';
                } else {
                    $fieldName = $searchParams[$key]['name'];
                    $inputValue = $this->input->post("" . $fieldName . "");
                    $searchForm .= '<span class="input-group-btn"><label class="form-control">
    <input id="' . $fieldName . '" name="' . $fieldName . '" style="width:20px" type="checkbox"';
                    if ($inputValue == "on") {
                        $searchForm .= ' checked="checked"';
                    }
                    $searchForm .= ' >' . lang('' . $fieldName . '') . '</label></span>';
                }
            }
        }
        $searchKey = $this->input->post('search');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $searchResultMsg = '';
        //general search
        if (1 == 1) {
            $searchForm .= '<input style="width:192px;" value="' . $searchKey . '" type="text" class="form-control" name="search" id="search" onkeyup="myFunction()" placeholder="' . lang("search") . '...">';
        }
        //display or hide search button
        $searchForm .= '<span class="input-group-btn">
<button class="btn btn-default" type="submit">
<i class="fa fa-search"></i>
</button>
</span>';
        $searchForm .= '<span class="input-group-btn">
<a href="edit" id="edit" class="btn btn-default btn-sm"><i class="fa fa-filter"></i></a>
</span>';
        $searchForm .= '<span class="input-group-btn">
<a class="btn btn-default pull-right" type="submit" id="exportToExcell" name="exportToExcell">
<i class="fa fa-download"></i></a></span></div>';
        if (isset($searchKey) && !empty($searchKey)) {
            $searchResultMsg .= '<b>' . $searchKey . '</b>';
        }
        if (isset($startDate) && isset($endDate) && !empty($endDate) && !empty($startDate)) {
            $searchResultMsg .= ' and dates between <b>' . $startDate . '</b> and <b>' . $endDate . '</b>';
        }
        if (isset($searchResultMsg) && !empty($searchResultMsg)) {
            $searchForm .= '<div class="" style="display:block;width:100%;margin-top:10px">
    <span id="searchResult" name="searchResult" style="display: block;padding: 6px;
    border-radius: 2px;">Search result with the keyword ' . $searchResultMsg . '</span></div>';
        }
        $this->searchTitle .= '</div>';
        return $searchForm . $this->searchTitle;
    }
//END GENERATE SEARCH FORM
    //START GENERATE SEARCH FORM

//Generate input components depending on input type and fieldname
    function generateSearchComponent($fieldName, $fieldType)
    {
        $inputValue = $this->input->post("" . $fieldName . "");
        $this->searchTitle .= '<span>' . lang('' . $fieldName . '') . ' : ' . $inputValue . '</span><br>';
        if ($fieldType == 'text') {
            return '<span class="input-group-btn" style="width:160px"><input value="' . $inputValue . '" type="text" id="' . $fieldName . '" name="' . $fieldName . '" class="form-control" placeholder="Galchi : ' . lang($fieldName) . '"></span>';
        } else if ($fieldType == 'number') {
            return '<span class="input-group-btn" style="width:160px"><input value="' . $inputValue . '" type="number" id="' . $fieldName . '" name="' . $fieldName . '" class="form-control" placeholder="Galchi : ' . lang($fieldName) . '"></span>';
        }
    }

    function getSearchSetting()
    {
        $controllerName = $this->router->fetch_class();
        $arrData = array();
        if (is_file(__DIR__ . '..\..\settings\search\\' . $controllerName . '.json')) {
            $jsonData = file_get_contents(__DIR__ . '..\..\settings\search\\' . $controllerName . '.json');
            if ($jsonData) {
                $arrData = json_decode($jsonData, true);
            }
        }
        return $arrData;
    }
    function set_message($message){
        return $this->template->assign('message',$message);
    }
}
class Admin_Controller extends MY_Controller
{
    var $permission = array();

    public function __construct()
    {
        parent::__construct();

        $group_data = array();
        if(empty($this->session->userdata('logged_in'))) {
            $session_data = array('logged_in' => FALSE);
            $this->session->set_userdata($session_data);
        }
        else {
            $user_id = $this->session->userdata('id');
            $this->load->model('model_groups');
            $group_data = $this->model_groups->getUserGroupByUserId($user_id);

            $this->data['user_permission'] = unserialize($group_data['permission']);
            $this->permission = unserialize($group_data['permission']);
        }
    }

    public function logged_in()
    {
        $session_data = $this->session->userdata();
        if($session_data['logged_in'] == TRUE) {
            redirect('dashboard', 'refresh');
        }
    }

    public function not_logged_in()
    {
        $session_data = $this->session->userdata();
        if($session_data['logged_in'] == FALSE) {
            redirect('auth/login', 'refresh');
        }
    }

    public function render_template($page = null, $data = array())
    {

        $this->load->view('templates/header',$data);
        $this->load->view('templates/header_menu',$data);
        $this->load->view('templates/side_menubar',$data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer',$data);
    }

    public function company_currency()
    {
        $this->load->model('model_company');
        $company_currency = $this->model_company->getCompanyData(1);
        $currencies = $this->currency();

        $currency = '';
        foreach ($currencies as $key => $value) {
            if($key == $company_currency['currency']) {
                $currency = $value;
            }
        }

        return $currency;

    }


    public function currency()
    {
        return $currency_symbols = array(
            'AED' => '&#1583;.&#1573;', // ?
            'AFN' => '&#65;&#102;',
            'ALL' => '&#76;&#101;&#107;',
            'ANG' => '&#402;',
            'AOA' => '&#75;&#122;', // ?
            'ARS' => '&#36;',
            'AUD' => '&#36;',
            'AWG' => '&#402;',
            'AZN' => '&#1084;&#1072;&#1085;',
            'BAM' => '&#75;&#77;',
            'BBD' => '&#36;',
            'BDT' => '&#2547;', // ?
            'BGN' => '&#1083;&#1074;',
            'BHD' => '.&#1583;.&#1576;', // ?
            'BIF' => '&#70;&#66;&#117;', // ?
            'BMD' => '&#36;',
            'BND' => '&#36;',
            'BOB' => '&#36;&#98;',
            'BRL' => '&#82;&#36;',
            'BSD' => '&#36;',
            'BTN' => '&#78;&#117;&#46;', // ?
            'BWP' => '&#80;',
            'BYR' => '&#112;&#46;',
            'BZD' => '&#66;&#90;&#36;',
            'CAD' => '&#36;',
            'CDF' => '&#70;&#67;',
            'CHF' => '&#67;&#72;&#70;',
            'CLP' => '&#36;',
            'CNY' => '&#165;',
            'COP' => '&#36;',
            'CRC' => '&#8353;',
            'CUP' => '&#8396;',
            'CVE' => '&#36;', // ?
            'CZK' => '&#75;&#269;',
            'DJF' => '&#70;&#100;&#106;', // ?
            'DKK' => '&#107;&#114;',
            'DOP' => '&#82;&#68;&#36;',
            'DZD' => '&#1583;&#1580;', // ?
            'EGP' => '&#163;',
            'ETB' => '&#66;&#114;',
            'EUR' => '&#8364;',
            'FJD' => '&#36;',
            'FKP' => '&#163;',
            'GBP' => '&#163;',
            'GEL' => '&#4314;', // ?
            'GHS' => '&#162;',
            'GIP' => '&#163;',
            'GMD' => '&#68;', // ?
            'GNF' => '&#70;&#71;', // ?
            'GTQ' => '&#81;',
            'GYD' => '&#36;',
            'HKD' => '&#36;',
            'HNL' => '&#76;',
            'HRK' => '&#107;&#110;',
            'HTG' => '&#71;', // ?
            'HUF' => '&#70;&#116;',
            'IDR' => '&#82;&#112;',
            'ILS' => '&#8362;',
            'INR' => '&#8377;',
            'IQD' => '&#1593;.&#1583;', // ?
            'IRR' => '&#65020;',
            'ISK' => '&#107;&#114;',
            'JEP' => '&#163;',
            'JMD' => '&#74;&#36;',
            'JOD' => '&#74;&#68;', // ?
            'JPY' => '&#165;',
            'KES' => '&#75;&#83;&#104;', // ?
            'KGS' => '&#1083;&#1074;',
            'KHR' => '&#6107;',
            'KMF' => '&#67;&#70;', // ?
            'KPW' => '&#8361;',
            'KRW' => '&#8361;',
            'KWD' => '&#1583;.&#1603;', // ?
            'KYD' => '&#36;',
            'KZT' => '&#1083;&#1074;',
            'LAK' => '&#8365;',
            'LBP' => '&#163;',
            'LKR' => '&#8360;',
            'LRD' => '&#36;',
            'LSL' => '&#76;', // ?
            'LTL' => '&#76;&#116;',
            'LVL' => '&#76;&#115;',
            'LYD' => '&#1604;.&#1583;', // ?
            'MAD' => '&#1583;.&#1605;.', //?
            'MDL' => '&#76;',
            'MGA' => '&#65;&#114;', // ?
            'MKD' => '&#1076;&#1077;&#1085;',
            'MMK' => '&#75;',
            'MNT' => '&#8366;',
            'MOP' => '&#77;&#79;&#80;&#36;', // ?
            'MRO' => '&#85;&#77;', // ?
            'MUR' => '&#8360;', // ?
            'MVR' => '.&#1923;', // ?
            'MWK' => '&#77;&#75;',
            'MXN' => '&#36;',
            'MYR' => '&#82;&#77;',
            'MZN' => '&#77;&#84;',
            'NAD' => '&#36;',
            'NGN' => '&#8358;',
            'NIO' => '&#67;&#36;',
            'NOK' => '&#107;&#114;',
            'NPR' => '&#8360;',
            'NZD' => '&#36;',
            'OMR' => '&#65020;',
            'PAB' => '&#66;&#47;&#46;',
            'PEN' => '&#83;&#47;&#46;',
            'PGK' => '&#75;', // ?
            'PHP' => '&#8369;',
            'PKR' => '&#8360;',
            'PLN' => '&#122;&#322;',
            'PYG' => '&#71;&#115;',
            'QAR' => '&#65020;',
            'RON' => '&#108;&#101;&#105;',
            'RSD' => '&#1044;&#1080;&#1085;&#46;',
            'RUB' => '&#1088;&#1091;&#1073;',
            'RWF' => '&#1585;.&#1587;',
            'SAR' => '&#65020;',
            'SBD' => '&#36;',
            'SCR' => '&#8360;',
            'SDG' => '&#163;', // ?
            'SEK' => '&#107;&#114;',
            'SGD' => '&#36;',
            'SHP' => '&#163;',
            'SLL' => '&#76;&#101;', // ?
            'SOS' => '&#83;',
            'SRD' => '&#36;',
            'STD' => '&#68;&#98;', // ?
            'SVC' => '&#36;',
            'SYP' => '&#163;',
            'SZL' => '&#76;', // ?
            'THB' => '&#3647;',
            'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
            'TMT' => '&#109;',
            'TND' => '&#1583;.&#1578;',
            'TOP' => '&#84;&#36;',
            'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
            'TTD' => '&#36;',
            'TWD' => '&#78;&#84;&#36;',
            'UAH' => '&#8372;',
            'UGX' => '&#85;&#83;&#104;',
            'USD' => '&#36;',
            'UYU' => '&#36;&#85;',
            'UZS' => '&#1083;&#1074;',
            'VEF' => '&#66;&#115;',
            'VND' => '&#8363;',
            'VUV' => '&#86;&#84;',
            'WST' => '&#87;&#83;&#36;',
            'XAF' => '&#70;&#67;&#70;&#65;',
            'XCD' => '&#36;',
            'XPF' => '&#70;',
            'YER' => '&#65020;',
            'ZAR' => '&#82;',
            'ZMK' => '&#90;&#75;', // ?
            'ZWL' => '&#90;&#36;',
        );
    }
}