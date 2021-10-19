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
        <p class="login-box-msg">Change Password</p>
        <?php
            echo $message;
        ?>
        <?=form_open("login/changepassword")?>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password1" placeholder="New Password" value="<?=$pass1?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password2" placeholder="Retype Password" value="<?=$pass2?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Change Password</button>
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
