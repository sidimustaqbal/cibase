<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo base_url(); ?>assets/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo ucwords($this->current_user->first_name.' '.$this->current_user->last_name); ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<?php
			$active_uri = $this->uri->uri_string();
			?>
			<li class="<?php echo ($active_uri=='admin') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<li class="treeview <?php echo (in_array($active_uri,array('users/user/index','users/group/index'))) ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-users"></i> <span>Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?php echo ($active_uri=='users/user/index') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>users/user/index"><i class="fa fa-circle-o"></i> Users</a></li>
					<li class="<?php echo ($active_uri=='users/group/index') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>users/group/index"><i class="fa fa-circle-o"></i> Groups</a></li>
				</ul>
			</li>

		</ul>
	</section>
	<!-- /.sidebar -->
</aside>