
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/dist/css/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css"/>
<div class="text-center">
    <img src="<?php echo base_url('assets/dist/img/st marr.jpg');?>" alt="User Avatar" style="margin: 2px 2px 2px 2px" height="100px" width="100%">
</div>
<?php foreach ($view as $result)?>

<div class="container">
    <h2 class="alert alert-success">all information about the bid product</h2>
    <div class="form-group"> <label class="text-capitalize">Product Name:</label>
        <?php echo $result['Document_name'];?></div>

    <div class="form-group"> <label class="text-capitalize">Post Date:</label>
        <?php echo $result['Document_crated_date'];?></div>
    <div class="form-group"> <label class="text-capitalize">Description:</label>
        <?php echo $result['Document_discription'];?></div>

    <img src="uploads/<?php echo $result['Document_image'];?>" width="300" height="300">
    <?php echo anchor('bidder','Back to',['class'=>'btn btn-md btn-primary']);?>
</div>

