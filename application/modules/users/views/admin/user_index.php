<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $template['title']; ?></h3>
				<a class="btn btn-flat btn-sm btn-primary pull-right" href="<?php echo base_url(); ?>users/admin/user/create">Create</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label for="inputEmail" class="col-sm-2 control-label">Email</label>

							<div class="col-sm-5">
								<input type="email" class="form-control" id="inputEmail" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputFullName" class="col-sm-2 control-label">FullName</label>

							<div class="col-sm-5">
								<input type="text" class="form-control" id="inputFullName" placeholder="FullName">
							</div>
						</div>
						<div class="form-group">
							<label for="actionButtons" class="col-sm-2 control-label"></label>

							<div class="col-sm-5">
								<button type="submit" class="btn btn-flat btn-sm btn-primary">Filter</button>
								<button type="submit" class="btn btn-flat btn-sm btn-default">Cancel</button>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</form>

				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th style="width: 50px">No</th>
							<th>Username</th>
							<th>Email</th>
							<th>Full Name</th>
							<th style="width: 160px"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>root</td>
							<td>root@web.com</td>
							<td>Super User</td>
							<td>
								<a class="btn btn-flat btn-xs btn-info" href="<?php echo base_url(); ?>users/admin/user/view">View</a>
								<a class="btn btn-flat btn-xs btn-warning" href="<?php echo base_url(); ?>users/admin/user/edit">Edit</a>
								<a class="btn btn-flat btn-xs btn-danger" href="<?php echo base_url(); ?>users/admin/user/delete">Delete</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="box-footer clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a href="#">«</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">»</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>