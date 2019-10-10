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