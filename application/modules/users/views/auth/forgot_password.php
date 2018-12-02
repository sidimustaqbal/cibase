<!-- /.login-logo -->
<div class="login-box-body">
	<p class="login-box-msg text-left"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

	<?php if(isset($message)) { ?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo $message;?>
	</div>
	<?php } ?>
	<?php
	$redirect = ($this->input->get('redirect')) ? 'redirect='.$this->input->get('redirect') : '';
	echo form_open("users/auth/forgot_password?".$redirect);
	?>
		<div class="form-group has-feedback">
			<input type="email" class="form-control" placeholder="Email" name="identity">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="row">
			<!-- /.col -->
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('forgot_password_submit_btn'); ?></button>
			</div>
			<!-- /.col -->
		</div>
	<?php echo form_close();?>

	<a href="<?php echo base_url(); ?>users/auth/login">Already has an Account</a><br>

</div>
<!-- /.login-box-body -->