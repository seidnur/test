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
<h3 class="text-info page-header text-center">View Information For Bidder</h3>
    <table class="table table-striped table-condensed table-hover" id="example">
    <th>Bidder ID</th>
     <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <tbody><tr><td><?php  echo $data->bidder_id;?></td>
            <td><?php  echo $data->bidders_first_name?></td>
            <td>  <?php  echo $data->bidders_middel_name;
                ?></td>
            <td>
                <?php  echo $data->bidders_last_name;
                ?></td>
            <td>
                <?php  echo $data->bidders_gender;
                ?></td>
            <td><?php  echo $data->bidders_address;
                ?></td>
            <td>  <?php  echo $data->bidders_pphone;
                ?></td>
            <td>  <?php  echo $data->bidders_emaile;
                ?></td>
            </tr>
        </tbody>


    </table>
</div>

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
</html>
