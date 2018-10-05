<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $template['title']; ?></h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<!-- form start -->
		<form method="post" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">Email</label>

					<div class="col-sm-5">
						<input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-sm-2 control-label">Password</label>

					<div class="col-sm-5">
						<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
					</div>

				</div>
				<div class="form-group">
					<label for="inputFullName" class="col-sm-2 control-label">FullName</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" id="inputFullName" placeholder="FullName" name="fullname">
					</div>
				</div>
				<div class="form-group">
					<label for="actionButtons" class="col-sm-2 control-label"></label>

					<div class="col-sm-5">
						<button type="submit" class="btn btn-flat btn-sm btn-primary">Save</button>
						<a href="<?php echo base_url(); ?>users/admin/user/index" class="btn btn-flat btn-sm btn-default">Cancel</a>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</form>
	</div>
</div>
<!-- /.box -->