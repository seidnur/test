<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 10:39:43
         compiled from "C:\xampp\htdocs\kass\application\views\form_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:295515d9eee4fe36773-99598154%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '187b2e21f0d39455c5457d11d318bd69b4329196' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_login.tpl',
      1 => 1561189596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295515d9eee4fe36773-99598154',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9eee4fe5324',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9eee4fe5324')) {function content_5d9eee4fe5324($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo $_smarty_tpl->tpl_vars['config']->value['app_name'];?>
 | Admin System Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

</head>
<body class="login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
"><b><?php echo $_smarty_tpl->tpl_vars['config']->value['app_name'];?>
</b><br>Admin System</a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
login/validate" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email" id="email" required />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>  -->
        </div><!-- /.col -->
        <div class="col-xs-12">
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
addNew" class="btn btn-success btn-flat pull-left" value="Sign Up" >Sign Up</a>
          <input type="submit" class="btn btn-primary pull-right btn-flat" value="Sign In" />

        </div><!-- /.col -->
      </div>
    </form>
    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
forgotPassword">Forgot Password</a><br>
  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</body>
</html><?php }} ?>