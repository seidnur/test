<!DOCTYPE html>

<head>
    <title>online auction system</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="assets/jquery-ui/js/jquery-ui.min.js"></script>

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/dist/css/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css"/>

    
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">

            <ul class="nav navbar-nav">
                <li class="active"><a href=""><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <b>&nbsp&nbspProducts</b><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    </ul>
                </li>
                <form class="navbar-form navbar-left" action="<?php echo base_url();?>/Search" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search" size="40">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </ul>


            <ul class="nav navbar-nav navbar-right">

                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <b></b><span class=""></span></a>
                    <ul class="dropdown-menu">

                    </ul>
                </li>
                <li><a href="notification.php"><span class="glyphicon glyphicon-user"></span> <b>notification</b></a></li>

            </ul>
        </div>
    </nav>
</head>
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
    <?php echo validation_errors(); ?>
<?php echo form_open_multipart('bidding/register_bidder'); ?>

    <div class="form-group co-lg-6 col-md-6">

              <label>First Name</label>
       <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
    </div>

    <div class="form-group co-lg-6 col-md-6">
        <label>Middle Name</label>
        <input type="text" class="form-control" name="mname" required placeholder="Enter Middle Name">
    </div>
    <div class="form-group co-lg-6 col-md-6">
        <label>Last Name</label>
        <input type="text" class="form-control" name="lname" required placeholder="Enter Last Name">
    </div>
    <div class="form-group co-lg-6 col-md-6">
        <label>Gender</label>
        <select class="form-control" name="gender" required>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
    </div>
    <div class="form-group co-lg-6 col-md-6">
        <label>Address</label>
        <input type="text" class="form-control" name="address" required placeholder="Enter Address">
    </div>
        <div class="form-group co-lg-6 col-md-6">
        <label>phone</label>
        <input type="text" class="form-control" name="phone" required placeholder="Enter Phone">
    </div>
    <div class="form-group co-lg-6 col-md-6">
        <label>Price</label>
        <input type="number" class="form-control" name="price" required placeholder="Enter price">
    </div>
    <div class="form-group co-lg-6 col-md-6">
        <label>email</label>
        <input type="text" class="form-control" name="email" required placeholder="Enter Email">
    </div>
    <div class="form-group co-lg-6 col-md-6">
        <label>Register Date</label>
        <input type="text" class="form-control" value="<?php echo date('m/d/Y')?>" readonly id="rdate" name="edate" required placeholder="Enter Date">
    </div>
    <div class="form-group co-lg-6 col-md-6">
        <label>bank reference no</label>
        <input type="text" class="form-control" name="bankref" required placeholder="Enter Bank Reference">
    </div> <div class="form-group co-lg-6 col-md-6">
        <label>cpo</label>
        <input type="file" class="form-control" name="received_bidder_document" required placeholder="Enter CPO">
    </div>
    <div class="form-group co-lg-6 col-md-6">
        <label>status</label>
        <input type="text" class="form-control" name="status" required placeholder="Enter Status">
    </div>
<br>
        <div class="col-lg-4 col-md-6">

    <input type="submit" value="submit" class="btn btn-primary btn-md">
        </div>
</form>
</div>
<script type="text/javascript">
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
    $('#rdate').datepicker({dateFormat:'yy-mm-dd',
        changeMonth:true,
        changeYear:true

    }); $('#rdate').datepicker({dateFormat:'yy-mm-dd',
        changeMonth:true,
        changeYear:true

    });$('#edate').datepicker({dateFormat:'yy-mm-dd',
        changeMonth:true,
        changeYear:true

    });
    $(".bdate").datepicker("option", "maxDate", '-17y +0m +0w');

    $('.dataTable').dataTable();
</script>