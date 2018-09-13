<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Blank Page</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/skins/_all-skins.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url(); ?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b>LTE</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Notifications: style can be found in dropdown.less -->
						<li class="dropdown notifications-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i>
								<span class="label label-warning">10</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 10 notifications</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<li>
											<a href="#">
												<i class="fa fa-users text-aqua"></i> 5 new members joined today
											</a>
										</li>
									</ul>
								</li>
								<li class="footer"><a href="#">View all</a></li>
							</ul>
						</li>
					</li>
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url(); ?>assets/adminlte/img/user2-160x160.jpg" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo ucwords($this->current_user->first_name.' '.$this->current_user->last_name); ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="<?php echo base_url(); ?>assets/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">

								<p>
									Alexander Pierce - Web Developer
									<small>Member since Nov. 2012</small>
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="#" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<!-- =============================================== -->

	<!-- Left side column. contains the sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?php echo base_url(); ?>assets/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>Alexander Pierce</p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Users</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><i class="fa fa-circle-o"></i> Users</a></li>
						<li><a href="#"><i class="fa fa-circle-o"></i> Groups</a></li>
					</ul>
				</li>
				
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- =============================================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo $template['title']; ?>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Examples</a></li>
				<li class="active">Blank page</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
						title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<?php echo $template['body']; ?>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.4.0
			</div>
			<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
			reserved.
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url(); ?>assets/adminlte/plugins/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/adminlte/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url(); ?>assets/adminlte/js/demo.js"></script>
	<script>
  	$(document).ready(function () {
  		$('.sidebar-menu').tree()
  	})
	</script>
</body>
</html>