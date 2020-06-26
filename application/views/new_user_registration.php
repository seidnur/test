<?php ?>
<!doctype html>
<title>user login page
</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<script src="assets/bootstrap/js/jquery-1.10.2.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/Home.css">
<style>
    body {

        font-family: Agency FB;
    }
</style>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <ul class="nav navbar-nav">
            <li class="active"><a href=""><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                    href="<?php echo base_url();?>/product">
                    <b></b>product<span class=""></span></a>
            </li>


            <form class="navbar-form navbar-left" action="<?php echo base_url('Search/dataSearch');?>" method="POST">
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
            a          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                               href="<?php echo base_url('login_user')?>">
                    <b>Login</b><span class=""></span></a>
                <ul class="dropdown-menu">

                </ul>
            </li>
            <li><a href="<?php echo base_url('notification');?>"><span class="glyphicon glyphicon-user"></span> <b>notification</b></a></li>

        </ul>
    </div>
</nav>
</head>
<div class="container">
<!--    <div class="alert-danger col-lg-6">-->
<!--    --><?php //echo validation_errors(); ?>
<!--    </div>-->
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
    <?php echo form_open('new_user_registration'); ?>
    <h3 class="page-header text-info text-center">Bidder create account form</h3>
    <div class="col-lg-offset-2">
<div class="col-lg-8">
    <label>Username</label>
    <div class="alert-danger">
    <?php echo form_error('username'); ?>
    </div>
    <input type="text" name="username" value="" class="form-control" />
</div>
<div class="col-lg-8"><label>Password</label>
    <div class="alert-danger">
        <?php echo form_error('password'); ?>
    </div>
    <input type="text" name="password" value="" class="form-control" />
</div>
<div class="col-lg-8">   <label>Password Confirm</label>
    <div class="alert-danger">
        <?php echo form_error('passconf'); ?>
    </div>
    <input type="text" name="passconf" value="" class="form-control" />
</div>
<div class="col-lg-8">
<label>Email Address</label>
    <div class="alert-danger">
        <?php echo form_error('email'); ?>
    </div>
    <input type="text" name="email" value="" class="form-control"/>
</div>
    <div class="col-lg-8">
        <br><input type="submit" value="Submit" class="btn btn-sm btn-primary pull-right" /></div>

    </form>
</div>
</div>
</html>
