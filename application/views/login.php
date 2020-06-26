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


                <ul class="dropdown-menu">

                </ul>
            </li>
            <li><a href="<?php echo base_url('notification');?>"><span class="glyphicon glyphicon-user"></span> <b>notification</b></a></li>

        </ul>
    </div>
</nav>
</head>
<div class="col-lg-12">
<h3 class="page-header text-center text-info">Bidder Login Page</h3>
    <div class="alert-danger"> <?php echo validation_errors(); ?></div>

    <div class="col-lg-6">

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

        <?php echo form_open('user_login/validate_user'); ?>
    <div class="col-lg-offset-2">
    <div class="col-lg-8">
        <label>user name</label>
        <input type="text" name="username" class="form-control">
    </div><div class="col-lg-8">
        <label>password</label>
        <input type="password" name="password" class="form-control">
    </div>
<div class="col-lg-8">
    <br>
        <input type="submit" value="submit" class="btn btn-primary pull-right">
    <?php echo anchor('new_user_registration','Are you new user',['class'=>'btn btn-sm btn-primary']);?>
</div>
    </div>
    </form>

</div>
</html>

