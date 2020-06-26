<?php ?>
<!DOCTYPE html>
<html>
<head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>
    {$config.app_name_long}</title>
    <base href="{$config.base_url}"/>
    <link rel="icon" href="{$config.base_url}assets/icon/favicon.ico">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{$config.base_url}assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{$config.base_url}assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{$config.base_url}assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link href="{$config.base_url}assets/dist/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="{$config.base_url}assets/dist/css/skins/skin-black.css" rel="stylesheet" type="text/css"/>
    <link href="{$config.base_url}assets/jquery-ui/css/jquery-ui.min.css" rel="stylesheet">
    <link href="{$config.base_url}assets/jquery-ui/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="{$config.base_url}assets/dist/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{$config.base_url}assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>

    <link href="{$config.base_url}assets/exportdatatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{$config.base_url}assets/exportdatatable/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
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
    <script type="text/javascript" src="assets/exportdatatable/buttons.html5.min.js"></script>
    <script type="text/javascript" src="assets/exportdatatable/buttons.print.min.js"></script>
    <script type="text/javascript" src="assets/exportdatatable/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="assets/exportdatatable/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="assets/exportdatatable/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="assets/exportdatatable/jszip.min.js"></script>
    <script type="text/javascript" src="assets/exportdatatable/pdfmake.min.js"></script>
    <script type="text/javascript" src="assets/exportdatatable/vfs_fonts.js"</script>

    <script type="text/javascript" src="assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/dist/js/app.js"></script>
    <script type="text/javascript" src="iscaffold/js/main.js"></script>
    <script type="text/javascript" src="assets/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/jquery-ui/js/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/dist/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/dist/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/chartjs/Chart.js"></script>


     <script type="text/javascript">
            $(document).ready(function () {
                $('table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'print',
                        'pdfHtml5'
                    ]
                });
            });
        </script>
</head>
<div class="text-center">
    <img src="{$config.base_url}assets/dist/img/st marr.jpg" alt="User Avatar" style="margin: 2px 2px 2px 2px" height="100px" width="100%">
</div>
{if $logged_in == true}
    <body class="skin-black sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="{$config.base_url}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"> <b>{$config.app_name_long}</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b> <span class="fa fa-th-large"></span> {$config.app_name}</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                {if $logged_in == true}


                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">

                            <li class="dropdown user user-menu active">
                                <a href="dashboard/switchLanguage/english">{lang('EN')}
                                    {if $selected_language=='english'}
                                        <span class="text-success success fa fa-check-circle"></span>
                                    {/if}
                                </a>
                            </li>

{*                            <li class="dropdown user user-menu">*}
{*                                <a href="dashboard/switchLanguage/amharic">{lang('AM')}*}
{*                                    {if $selected_language=='amharic'}*}
{*                                        <span class="text-success success fa fa-check-circle"></span>*}
{*                                    {/if}*}
{*                                </a>*}
{*                            </li>*}

                            <li class="dropdown user user-menu">
                                <a href="Logout" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="fa fa-user fa-1x"></span>
                                    <span class="text-capitalize text-right">  {lang('welcome')} {if isset($user)} {$user} {/if}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{$config.base_url}Users/"><i
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
                {/if}
            </nav>
        </header>
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    {if isset($permission)}


                        {if
                        ('deleteBrand'|in_array:$permission)||
                        ('createBrand'|in_array:$permission)||
                        ('viewBrand'|in_array:$permission)||
                        ('updateBrand'|in_array:$permission)
                        }
                            <li{if isset($table_name)}{if $table_name == 'Tbl_campany'} class='active'{/if}{/if}><a
                                        href='Tbl_campany'><span class="fa fa-check-circle"></span> {lang('Tbl_campany')}</a></li>
                        {/if}



                          {if
                        ('deleteEmployee'|in_array:$permission)||
                        ('createEmployee'|in_array:$permission)||
                        ('viewEmployee'|in_array:$permission)||
                        ('updateEmployee'|in_array:$permission)
                        }
                            <li{if isset($table_name)}{if $table_name == 'Employee'} class='active'{/if}{/if}><a
                                        href='employee'><span class="fa fa-user-md"></span>{lang('employee')}</a></li>
                        {/if}


                        {if
                        ('deleteBidding_document'|in_array:$permission)||
                        ('createBidding_document'|in_array:$permission)||
                        ('viewBidding_document'|in_array:$permission)||
                        ('updateBidding_document'|in_array:$permission)
                        }
                            <li{if isset($table_name)}{if $table_name == 'Bidding_document'} class='active'{/if}{/if}><a
                                        href='Bidding_document'><span class="fa fa-users"></span>{lang('Bidding_document')}</a></li>
                        {/if}     {if
                        ('deleteGroup'|in_array:$permission)||
                        ('createGroup'|in_array:$permission)||
                        ('viewGroup'|in_array:$permission)||
                        ('updateGroup'|in_array:$permission)
                        }
                            <li{if isset($table_name)}{if $table_name == 'Group'} class='active'{/if}{/if}><a
                                        href='group'><span class="fa fa-users"></span>{lang('group')}</a></li>
                        {/if} {if
                        ('deleteBidders'|in_array:$permission)||
                        ('createBidders'|in_array:$permission)||
                        ('viewBidders'|in_array:$permission)||
                        ('updateBidders'|in_array:$permission)
                        }
                            <li{if isset($table_name)}{if $table_name == 'Bidders'} class='active'{/if}{/if}><a
                                        href='Bidders'><span class="fa fa-users"></span>{lang('Bidders')}</a></li>
                        {/if}

                        {if
                        ('deleteUserGroup'|in_array:$permission)||
                        ('createUserGroup'|in_array:$permission)||
                        ('viewUserGroup'|in_array:$permission)||
                        ('updateUserGroup'|in_array:$permission)
                        }
                            <li{if isset($table_name)}{if $table_name == 'Usergroup'} class='active'{/if}{/if}><a
                                        href='usergroup'><span class="fa fa-edit"></span> {lang('usergroup')}</a></li>
                        {/if}
                        {if
                        ('deleteUser'|in_array:$permission)||
                        ('createUser'|in_array:$permission)||
                        ('viewUser'|in_array:$permission)||
                        ('updateUser'|in_array:$permission)
                        }
                            <li{if isset($table_name)}{if $table_name == 'Users'} class='active'{/if}{/if}><a
                                        href='users'><span class="fa fa-user"></span>{lang('users')} </a></li>
                        {/if}

                            <!-- <li{if isset($table_name)}{if $table_name == 'Logins'} class='active'{/if}{/if}><a
href='logins'><span class="fa fa-list-alt"></span>Logins</a></li> -->

                    {/if}
                </ul>
                <input class="hidden" id="current_page" name="current_page"
                       value="{if isset($table_name)}{$table_name}{/if}"/>
            </section>
        </aside>
        <div class="content-wrapper" style="min-height: 836px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <i class="fa fa-tachometer" aria-hidden="true"></i>{if isset($table_name)} {lang("$table_name")}
                    {/if}
                    <div class="fa fa-message alert-dismissible" role="alert" aria-hidden="true">

                        {if isset($message)}
                            {$message}
                        {/if}
                    </div>
                    <div id="message-center" class="alert message-center" name="message-center" style="display: none">
                        <button type="button" class="close msgbtn" data-dismiss="alert">×</button>
                        <span class="msg">
                        </span>
                    </div>
                </h1>
            </section>
            <section class="content">
                <div class="">

                    {if $logged_in == TRUE}
                        {include file="$template.tpl"}
                    {/if}
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <strong>  {$config.app_name_long}</strong>
            </div>
            <p><strong> Copyright © 2020 All rights reserved.</strong></p>


            <a href="https://twitter.com/auctionsystem"><span class="fa fa-twitter"> <strong>twitter</strong> </span></a>
            <a href="https://facebook.com/auctionsystem"><span
                        class="fa fa-facebook"> <strong>facebook</strong> </span></a>
            <a href="https://t.me/auctionsystem"><span class="fa fa-telegram"> <strong>Telegram</strong> </span></a>
            <span class="fa fa-phone"></span>

        </footer>
        {literal}
            <script type="text/javascript">
                $('.datepicker').datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true
                });
                $('#submit_date').datepicker({dateFormat:'yy-mm-dd',
                    changeMonth:true,
                    changeYear:true

                }); $('#cdate').datepicker({dateFormat:'yy-mm-dd',
                    changeMonth:true,
                    changeYear:true

                });$('#edate').datepicker({dateFormat:'yy-mm-dd',
                    changeMonth:true,
                    changeYear:true

                });
               $(".bdate").datepicker("option", "maxDate", '-17y +0m +0w');

                $('.dataTable').dataTable();
            </script>

        {/literal}
    </div><!-- container -->
    </body>
{else}
    {include file="form_login.tpl"}
{/if}
</html>