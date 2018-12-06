<div class="row">
	<div class="col-sm-3">
		<div class="box box-primary">
			<!-- /.box-header -->
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/adminlte/img/user2-160x160.jpg" alt="User profile picture">

				<h3 class="profile-username text-center"><?php echo $field->first_name.' '.$field->last_name ?></h3>
			</div>
		</div>
	</div>

	<div class="col-sm-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="action-buttons pull-right">
					<?php
					echo anchor('users/admin/user/index', lang('globals:back'), 'class="btn btn-flat btn-sm btn-info"');
					echo anchor('users/admin/user/edit/'.$field->id, lang('globals:edit'), 'class="btn btn-flat btn-sm btn-warning"');
					echo anchor('users/admin/user/delete/'.$field->id, lang('globals:delete'), 'class="btn btn-flat btn-sm btn-danger confirm"');
					?>
				</div>

				<h3 class="box-title"></h3>
			</div>
			<div class="box-body box-profile">
				<div class="row">
					<label class="col-sm-2 control-label"><?php echo lang('users:email'); ?></label>
					<span class="col-sm-10"><?php echo $field->email; ?></span>
				</div>
				<div class="row">
					<label class="col-sm-2 control-label"><?php echo lang('users:full_name'); ?></label>
					<span class="col-sm-10"><?php echo $field->first_name.' '.$field->last_name; ?></span>
				</div>
			</div>
		</div>
	</div>
</div>