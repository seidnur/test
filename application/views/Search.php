<!DOCTYPE html>
<html lang="en">
<head>
    <title>online auction system</title>
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


                <form class="navbar-form navbar-left" action="<?php echo base_url('Search');?>" method="POST">
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
                        <b>Logout</b><span class=""></span></a>
                    <ul class="dropdown-menu">

                    </ul>
                </li>
                <li><a href="<?php echo base_url('notification');?>"><span class="glyphicon glyphicon-user"></span> <b>notification</b></a></li>

            </ul>
        </div>
    </nav>
</head>
<?php

foreach ($search as $post) : ?>
    <div class="container">
        <div class="col-lg-2">
            <label class="text-capitalize">Product Name</label>
            <b>&nbsp; &nbsp;<?php echo $post['Document_name']?></b>
        </div>
        <img src="uploads/<?php echo $post['Document_image'] ?>" width="300" height="300">
        <tr>
            <td>
            </td>
        </tr>


    </div>
<?php endforeach; ?>
