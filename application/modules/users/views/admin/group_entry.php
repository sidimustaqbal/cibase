<div class="box box-primary">
	<div class="box-header with-border">
		<div class="action-buttons pull-right">
			<?php
			echo anchor('users/admin/group/index', lang('globals:back'), 'class="btn btn-flat btn-sm btn-info"');
			echo anchor('users/admin/group/edit/'.$field->id, lang('globals:edit'), 'class="btn btn-flat btn-sm btn-warning"');
			echo anchor('users/admin/group/delete/'.$field->id, lang('globals:delete'), 'class="btn btn-flat btn-sm btn-danger confirm"');
			?>
		</div>

		<h3 class="box-title"><?php echo $template['title']; ?></h3>
	</div>
	<div class="box-body box-profile">
		<div class="row">
			<label class="col-sm-2 control-label"><?php echo lang('users:group:name'); ?></label>
			<span class="col-sm-10"><?php echo $field->name; ?></span>
		</div>
		<div class="row">
			<label class="col-sm-2 control-label"><?php echo lang('users:group:description'); ?></label>
			<span class="col-sm-10"><?php echo $field->description; ?></span>
		</div>
	</div>
</div>