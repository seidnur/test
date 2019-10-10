<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 17:44:02
=======
<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 17:50:17
>>>>>>> seid
         compiled from "C:\xampp\htdocs\kass\application\views\frame_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:231695d9f37e1733bd1-34826933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7d1c64739c05cd286c9ac623bf1f1a87c8c6aa7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\frame_admin.tpl',
<<<<<<< HEAD
      1 => 1570722233,
=======
      1 => 1570722610,
>>>>>>> seid
      2 => 'file',
    ),
  ),
  'nocache_hash' => '231695d9f37e1733bd1-34826933',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f37e18e067',
  'variables' => 
  array (
    'config' => 0,
    'logged_in' => 0,
    'selected_language' => 0,
    'user' => 0,
    'permission' => 0,
    'table_name' => 0,
    'message' => 0,
    'meessage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f37e18e067')) {function content_5d9f37e18e067($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $_smarty_tpl->tpl_vars['config']->value['app_name'];?>
</title>
    <base href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
"/>
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/icon/favicon.ico">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/dist/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/dist/css/skins/skin-black.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/jquery-ui/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/jquery-ui/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/dist/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

    <style type="text/css">
        td[class="td-width"] {
            width: 15%;
        }
        .table > tbody > tr > td {
            padding: 0;
            padding-top: 3px;
            padding-bottom: 3px;
        }
        @media print {
            @page {
                size: landscape;   /* auto, portrait, landscape or length... */
                margin: 5mm;
                margin-bottom: 2mm;
                width: 297mm;
                height: 210mm;
            }

            @page {
                margin: 5mm;
                margin-bottom: 2mm;
                width: 297mm;
                height: 210mm;
            }
            td > input {
                border: 1px solid #fff;
            }

            #search, a, input[type="checkbox"], .group-changer {
                display: none;
            }
            .panel-default {
                border-color: #fff;
            }
            .page-title {
                background-color: #ddd ! Saleant;
                padding: 10px;
                -webkit-print-color-adjust: exact ! Saleant;
            }
        }

        table {
            width: 100%;
        }
        tr:hover {
            background-color: #f3ecec;
        }
        .error {
            color: red;
            background-color: #acf;
        }
    </style>
    <script type="text/javascript" src="assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/dist/js/app.js"></script>
    <script type="text/javascript" src="iscaffold/js/main.js"></script>
    <script type="text/javascript" src="assets/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/jquery-ui/js/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/dist/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/dist/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/chartjs/Chart.js"></script>
</head>
<?php if ($_smarty_tpl->tpl_vars['logged_in']->value==true){?>
    <body class="skin-black sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"> <b><?php echo $_smarty_tpl->tpl_vars['config']->value['app_name'];?>
</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b> <span class="fa fa-th-large"></span> <?php echo $_smarty_tpl->tpl_vars['config']->value['app_name'];?>
</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <?php if ($_smarty_tpl->tpl_vars['logged_in']->value==true){?>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <li class="dropdown user user-menu active">
                                <a href="dashboard/switchLanguage/english"><?php echo lang('EN');?>

                                    <?php if ($_smarty_tpl->tpl_vars['selected_language']->value=='english'){?>
                                        <span class="text-success success fa fa-check-circle"></span>
                                    <?php }?>
                                </a>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="dashboard/switchLanguage/amharic"><?php echo lang('AM');?>

                                    <?php if ($_smarty_tpl->tpl_vars['selected_language']->value=='amharic'){?>
                                        <span class="text-success success fa fa-check-circle"></span>
                                    <?php }?>
                                </a>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="fa fa-user fa-1x"></span>
                                    <span class="text-capitalize text-right">  <?php echo lang('welcome');?>
 <?php if (isset($_smarty_tpl->tpl_vars['user']->value)){?> <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 <?php }?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
changePassword"><i
                                                        class="fa fa-key"></i> Change Password</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="logout"><i class="fa fa-sign-out"></i> Sign
                                                out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php }?>
            </nav>
        </header>
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <?php if (isset($_smarty_tpl->tpl_vars['permission']->value)){?>
                        <?php if ((in_array('deleteImport',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createImport',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewImport',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateImport',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Import'){?> class='active'<?php }?><?php }?>><a
                                        href='import'><span class="nav-icon fa fa-table"></span> <?php echo lang('Import');?>
 </a>
                            </li>
                        <?php }?>

                        <?php if ((in_array('deleteSale',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createSale',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewSale',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateSale',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Sales'){?> class='active'<?php }?><?php }?>><a
                                        href='sales'><span class="fa fa-pie-chart"></span><?php echo (lang('sales'));?>
</a></li>
                        <?php }?>

                        <?php if ((in_array('deleteItem',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createItem',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewItem',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateItem',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Items'){?> class='active'<?php }?><?php }?>><a
                                        href='items'><span class="fa fa-list"></span><?php echo lang('inventory');?>
</a></li>
                        <?php }?>
                        <?php if ((in_array('deleteCategory',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createCategory',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewCategory',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateCategory',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Categories'){?> class='active'<?php }?><?php }?>><a
                                        href='categories'><span class="fa fa-filter"></span> <?php echo lang('categories');?>
</a>
                            </li>
                        <?php }?>

                        <?php if ((in_array('deleteBrand',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createBrand',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewBrand',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateBrand',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Brands'){?> class='active'<?php }?><?php }?>><a
                                        href='brands'><span class="fa fa-check-circle"></span> <?php echo lang('brands');?>
</a></li>
                        <?php }?>

                        <?php if ((in_array('deleteExpense',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createExpense',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewExpense',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateExpense',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Expenses'){?> class='active'<?php }?><?php }?>><a
                                        href='expenses'><span class="fa fa-paperclip"></span><?php echo lang('expenses');?>
</a></li>
                        <?php }?>

                        <?php if ((in_array('deleteCredit',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createCredit',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewCredit',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateCredit',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Credit'){?> class='active'<?php }?><?php }?>><a
                                        href='credit'> <span class="fa fa-credit-card"></span><?php echo lang('credit');?>
</a></li>
                        <?php }?>

                        <?php if ((in_array('deleteEmployee',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createEmployee',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewEmployee',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateEmployee',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Employee'){?> class='active'<?php }?><?php }?>><a
                                        href='employee'><span class="fa fa-user-md"></span><?php echo lang('employee');?>
</a></li>
                        <?php }?>

                        <?php if ((in_array('deleteExpenseType',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createExpenseType',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewExpenseType',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateExpenseType',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Expense_type'){?> class='active'<?php }?><?php }?>><a
                                        href='expense_type'><span class="fa fa-tachometer"></span><?php echo lang('expense_type');?>

                                </a></li>
                        <?php }?>

                        <?php if ((in_array('deleteGroup',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createGroup',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewGroup',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateGroup',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Group'){?> class='active'<?php }?><?php }?>><a
                                        href='group'><span class="fa fa-users"></span><?php echo lang('group');?>
</a></li>
                        <?php }?>

                        <?php if ((in_array('deleteUserGroup',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createUserGroup',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewUserGroup',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateUserGroup',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Usergroup'){?> class='active'<?php }?><?php }?>><a
                                        href='usergroup'><span class="fa fa-edit"></span> <?php echo lang('usergroup');?>
</a></li>
                        <?php }?>
                        <?php if ((in_array('deleteUser',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createUser',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewUser',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateUser',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Users'){?> class='active'<?php }?><?php }?>><a
                                        href='users'><span class="fa fa-user"></span><?php echo lang('users');?>
 </a></li>
                        <?php }?>

                        <?php if ((in_array('deleteZeka',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('createZeka',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('viewZeka',$_smarty_tpl->tpl_vars['permission']->value))||(in_array('updateZeka',$_smarty_tpl->tpl_vars['permission']->value))){?>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Zeka'){?> class='active'<?php }?><?php }?>><a
                                        href='zeka'><span class="fa fa-calculator"></span> <?php echo lang('zeka');?>
</a></li>
                        <?php }?>
                        <!-- <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Logins'){?> class='active'<?php }?><?php }?>><a
href='logins'><span class="fa fa-list-alt"></span>Logins</a></li> -->

                    <?php }?>
                </ul>
                <input class="hidden" id="current_page" name="current_page"
                       value="<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
<?php }?>"/>
            </section>
        </aside>
        <div class="content-wrapper" style="min-height: 836px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <i class="fa fa-tachometer" aria-hidden="true"></i><?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?> <?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>

                    <?php }?>
                    <div id="message-center" class="alert message-center" name="message-center" style="display: none">
                        <button type="button" class="close msgbtn" data-dismiss="alert">×</button>
                        <span class="msg">
                        </span>
                    </div>
                </h1>
            </section>
            <section class="content">
                <div class="">
                    <?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
                        <?php echo $_smarty_tpl->tpl_vars['meessage']->value;?>

                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['logged_in']->value==true){?>
                        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['template']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php }?>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <strong>  <?php echo $_smarty_tpl->tpl_vars['config']->value['app_name_long'];?>
</strong>
            </div>
            <p><strong> Copyright © 2018 All rights reserved.</strong></p>


            <a href="https://twitter.com/birhannega"><span class="fa fa-twitter"> <strong>twitter</strong> </span></a>
            <a href="https://facebook.com/birhannegacheru"><span
                        class="fa fa-facebook"> <strong>facebook</strong> </span></a>
            <a href="https://t.me/birhannega"><span class="fa fa-telegram"> <strong>Telegram</strong> </span></a>
            <span class="fa fa-phone"></span> +2519-25-47-90-78

        </footer>
        
            <script type="text/javascript">
                $('.datepicker').datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true
                });
                $(".bdate").datepicker("option", "maxDate", '-17y +0m +0w');

                $('.dataTable').dataTable();
            </script>
            <script type="text/javascript">
                function check_available_amount(item_id) {
// alert(item_id);\
                    $.ajax({
                        url: "sales/getItemDetails/" + item_id,
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            $('#available').text('Available amount for the selected item is: ' + response['itm_available_quantity']);
                            $('#sale_item_amount').attr('max', response['itm_available_quantity']);
                            $('#sale_item_amount').attr('placeholder',
                                "maximum amount to sell is " + response['itm_available_quantity']);
                            $('#sold_price').attr('min', response['itm_minimum_price']);
                            $('#sold_price').attr('max', response['itm_minimum_price']);
                        }
                    });
                }
            </script>
        
    </div><!-- container -->
    </body>
<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ("form_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
</html><?php }} ?>