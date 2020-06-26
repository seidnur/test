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
<!--    <style>-->
<!--        body {-->
<!---->
<!--            font-family: Agency FB;-->
<!--        }-->
<!--    </style>-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">

            <ul class="nav navbar-nav">
                <li class="active"><a href=""><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
                <li class="active">
                    <b>product</b>&nbsp;<select class="btn btn">
                            <?php foreach ($product as $item){ ?>
                                <option value="<?php echo $item['product_id'];?>"><?php echo $item['product_name'];?></option>
                            <?php }?>
                        </select>
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
                a          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <b>Login</b><span class=""></span></a>
                    <ul class="dropdown-menu">

                    </ul>
                </li>
                <li><a href="<?php echo base_url('notification');?>"><span class="glyphicon glyphicon-user"></span> <b>notification</b></a></li>

            </ul>
        </div>
    </nav>
</head>

