<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
	<div class="container">
		<a class="navbar-brand" href="<?php echo site_url(); ?>"><?php echo get_settings('site-title'); ?></a>

		<div class="menu-buttons">
		<?php if(isset($this->current_user)) { ?>
			<a class="btn btn-primary" href="<?php echo site_url('admin'); ?>">Admin Panel</a>
			<a class="btn btn-primary" href="<?php echo site_url('users/auth/logout'); ?>">Logout</a>
		<?php } else { ?>
			<a class="btn btn-primary" href="<?php echo site_url('users/auth/login'); ?>">Login</a>
		<?php } ?>
		</div>
	</div>
</nav>