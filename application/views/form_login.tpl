<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{$config.app_name} | Admin System Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="{$config.base_url}assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="{$config.base_url}assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="{$config.base_url}assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

</head>
<body class="login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{$config.base_url}"><b>{$config.app_name}</b><br>Admin System</a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <form action="{$config.base_url}login/validate" method="post">
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
          <a href="{$config.base_url}addNew" class="btn btn-success btn-flat pull-left" value="Sign Up" >Sign Up</a>
          <input type="submit" class="btn btn-primary pull-right btn-flat" value="Sign In" />

        </div><!-- /.col -->
      </div>
    </form>
    <a href="{$config.base_url}forgotPassword">Forgot Password</a><br>
  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</body>
</html>