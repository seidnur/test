<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/dist/css/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css"/>
<link href=""<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
<link href="{$config.base_url}assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="{$config.base_url}assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
<link href=""<?php echo base_url('assets/dist/css/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css"/>
<link href="{$config.base_url}assets/dist/css/skins/skin-black.css" rel="stylesheet" type="text/css"/>
<link href="{$config.base_url}assets/jquery-ui/css/jquery-ui.min.css" rel="stylesheet">
<link href="{$config.base_url}assets/jquery-ui/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="{$config.base_url}assets/dist/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="{$config.base_url}assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>

<link href=""<?php echo base_url('assets/exportdatatable/buttons.dataTables.min.css');?>" rel="stylesheet" type="text/css"/>
<link href=""<?php echo base_url('assets/exportdatatable/jquery.dataTables.min.css');?>" rel="stylesheet" type="text/css"/>
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
<h3 class="text-info page-header text-center">View Information For Bidder</h3>
<table class="table table-condensed table-striped" id="table">
    <th>Bidder ID</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Gender</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Email</th>
    <tr><td>seid</td><td>seid</td><td>seid</td><td>seid</td><td>seid</td><td>seid</td><td>seid</td><td>seid</td><td>seid</td></tr>
