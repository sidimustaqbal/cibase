<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
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
								<?php
								$value = '';
								if($this->input->get('email')) {
									$value = $this->input->get('email');
								}
								?>
								<input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php echo $value; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputFullName" class="col-sm-2 control-label">FullName</label>

							<div class="col-sm-5">
								<?php
								$value = '';
								if($this->input->get('full_name')) {
									$value = $this->input->get('full_name');
								}
								?>
								<input type="text" class="form-control" id="inputFullName" placeholder="FullName" name="full_name" value="<?php echo $value; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="actionButtons" class="col-sm-2 control-label"></label>

							<div class="col-sm-5">
								<button type="submit" class="btn btn-flat btn-sm btn-primary"><?php echo lang('globals:filter'); ?></button>
								<a href="<?php echo base_url().$this->uri->uri_string(); ?>" class="btn btn-flat btn-sm btn-default"><?php echo lang('globals:clear'); ?></a>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</form>

				<?php if(count($users)>0) { ?>
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
						<?php foreach ($users['entries'] as $key => $user_entry) { ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $user_entry->username; ?></td>
							<td><?php echo $user_entry->email; ?></td>
							<td><?php echo $user_entry->first_name.' '.$user_entry->last_name; ?></td>
							<td>
								<?php echo anchor('users/admin/user/view/'.$user_entry->id, lang('globals:view'), 'class="btn btn-flat btn-xs btn-info"'); ?>
								<?php echo anchor('users/admin/user/edit/'.$user_entry->id, lang('globals:edit'), 'class="btn btn-flat btn-xs btn-warning"'); ?>
								<?php echo anchor('users/admin/user/delete/'.$user_entry->id, lang('globals:delete'), 'class="btn btn-flat btn-xs btn-danger confirm"'); ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<?php
				echo $users['pagination'];
				?>
			<?php } else { ?>
				<div class="well">There is no entry for users</div>
			<?php } ?>
			</div>

			<div class="box-footer clearfix">
				
			</div>
		</div>
	</div>
</div>