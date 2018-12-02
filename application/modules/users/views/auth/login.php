<!-- /.login-logo -->
<div class="login-box-body">
<p class="login-box-msg">Sign in to start your session</p>
<?php if(isset($message)) { ?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <?php echo $message;?>
</div>
<?php } ?>
<?php
$redirect = ($this->input->get('redirect')) ? 'redirect='.$this->input->get('redirect') : '';
echo form_open("users/auth/login?".$redirect);
?>
  <div class="form-group has-feedback">
    <input type="email" class="form-control" placeholder="Email (demo: admin@admin.com)" name="identity">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback">
    <input type="password" class="form-control" placeholder="Password (demo: password)" name="password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  <div class="row">
    <div class="col-xs-8">
      <div class="checkbox icheck">
        <label>
          <input type="checkbox" value="1"> Remember Me
        </label>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div>
    <!-- /.col -->
  </div>
<?php echo form_close();?>

<a href="<?php echo base_url(); ?>users/auth/forgot_password">I forgot my password</a><br>
<a href="<?php echo base_url(); ?>users/auth/register" class="text-center">Register a new membership</a>

</div>
<!-- /.login-box-body -->