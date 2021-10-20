<!DOCTYPE html>
<html>
<?=$head?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SP</b>A</a>
  </div>
  <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Reset Password</p>
        <?php
            echo $message;
        ?>
        <?=form_open("login/forgotpassword")?>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="userid" placeholder="Username" value="<?=$userid?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Type your email" value="<?=$email?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <!-- /.col -->
                <hr>
                <div class="col-xs-12 text-center">
                  <a href="<?=site_url("login")?>"><span class="fa fa-angle-left"></span> Back</a>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?=$foot?>
</body>
</html>
