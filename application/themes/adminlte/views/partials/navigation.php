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
			<!-- <li class="header">MAIN NAVIGATION</li> -->
			<?php
			$active_uri = $this->uri->uri_string();
			?>
			<li class="<?php echo ($active_uri=='admin') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

			<?php
			$menu_links = array(
				'users/admin/user/index','users/admin/user/view','users/admin/user/create','users/admin/user/edit',
				'users/group/index'
			);
			$sub_menu_active = is_active_menu($menu_links, $active_uri);
			?>
			<li class="treeview <?php echo ($sub_menu_active) ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-users"></i> <span>Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<?php
					$menu_links = array('users/admin/user/index','users/admin/user/view','users/admin/user/create','users/admin/user/edit');
					?>
					<li class="<?php echo (is_active_menu($menu_links, $active_uri)) ? 'active' : ''; ?>">
						<a href="<?php echo base_url(); ?>users/admin/user/index"><i class="fa fa-circle-o"></i> Users</a>
					</li>
					<?php
					$menu_links = array('users/admin/group/index','users/admin/group/view','users/admin/group/create','users/admin/group/edit');
					?>
					<li class="<?php echo (is_active_menu($menu_links, $active_uri)) ? 'active' : ''; ?>">
						<a href="<?php echo base_url(); ?>users/admin/group/index"><i class="fa fa-circle-o"></i> Groups</a>
					</li>
				</ul>
			</li>

		</ul>
	</section>
	<!-- /.sidebar -->
</aside>