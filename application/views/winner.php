<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/dist/css/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/exportdatatable/jquery.dataTables.min.css');?>" rel="stylesheet">
<link href="assets/exportdatatable/buttons.dataTables.min.css" rel="stylesheet">
<script src="assets/exportdatatable/jquery-3.3.1.js" type="text/javascript"></script>
<script src="assets/exportdatatable/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/exportdatatable/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="assets/exportdatatable/jszip.min.js" type="tescript>xt/javascript"></script>
<script src="assets/exportdatatable/pdfmake.min.js" type="text/javascript"></script>
<script src="assets/exportdatatable/vfs_fonts.js" type="text/javascript"></script>
<script src="assets/exportdatatable/buttons.html5.min.js" type="text/javascript"></script>
<script src="assets/exportdatatable/buttons.print.min.js" type="text/javascript"></script>
<script src="assets/jquery/jquery.validate.js" type="text/javascript"></script>
<script src="assets/jquery-ui/js/jquery-ui.js" type="text/javascript"></script>
<link href="assets/jquery-ui/css/jquery-ui.css" rel="stylesheet" type="text/css"/>

<div class="container">
    <div class="col-md-12 col-xs-12">

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
    </div>

    <table class="table table-striped table-condensed table-hover" id="example">
        <thead>


        <?php echo anchor('bidding/','Add bidder',['class'=>'btn btn-md btn-primary']);?>
        <h3 class="page-header text-info text-center " style="margin-top: -12px">
            top bid winner
        </h3>
        <th>#</th>
        <th>full name</th>
        <th>gender</th>
        <th>salary</th>
        <th>phone</th>
        <th>email</th>
        <th>address</th>
        <th>withdraw</th> <th>view</th>
        </thead>
        <tbody>
        <?php if(count($winner));
        $index=null;?>

        <?php foreach ($winner as $win){
           ?>

        <tr>


            <td>#</td>
            <td><?php echo $win['bidders_first_name']."   ".$win['bidders_middel_name']. "  ".$win['bidders_last_name']; ?></td>
            <td><?php echo $win['bidders_gender'];?></td>
            <td><?php echo $win['bidders_inserted_money'];?></td>
            <td><?php echo $win['bidders_pphone'];?></td>
            <td><?php echo $win['bidders_emaile'];?></td>
            <td><?php echo $win['bidders_address'];?></td>
            <td><?php echo anchor('winner/withdraw/'.$win['bidder_id'],'withdrawal',['class'=>'btn btn-sm btn-danger'])?></td>
            <td><?php echo anchor('winner/viewInfo/'.$win['bidder_id'],'view',['class'=>'btn btn-sm btn-danger'])?></td>
            </tr>
           <?php }?>

        

<!---->
<!--        <tr><td>no record found</td></tr>-->
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
</div>

