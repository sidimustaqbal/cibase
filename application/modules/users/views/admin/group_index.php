<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $template['title']; ?></h3>
				<a class="btn btn-flat btn-sm btn-primary pull-right" href="<?php echo base_url(); ?>users/admin/group/create">Create</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label for="inputFullName" class="col-sm-2 control-label"><?php echo lang('users:group:description'); ?></label>

							<div class="col-sm-5">
								<?php
								$value = '';
								if($this->input->get('description')) {
									$value = $this->input->get('description');
								}
								?>
								<input type="text" class="form-control" id="input<?php echo lang('users:group:description'); ?>" placeholder="<?php echo lang('users:group:description'); ?>" name="description" value="<?php echo $value; ?>">
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

				<?php if(count($groups)>0) { ?>
				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th style="width: 50px">No</th>
							<th><?php echo lang('users:group:name'); ?></th>
							<th><?php echo lang('users:group:description'); ?></th>
							<th style="width: 160px"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($groups['entries'] as $key => $group_entry) { ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $group_entry->name; ?></td>
							<td><?php echo $group_entry->description; ?></td>
							<td>
								<?php echo anchor('users/admin/group/view/'.$group_entry->id, lang('globals:view'), 'class="btn btn-flat btn-xs btn-info"'); ?>
								<?php echo anchor('users/admin/group/edit/'.$group_entry->id, lang('globals:edit'), 'class="btn btn-flat btn-xs btn-warning"'); ?>
								<?php echo anchor('users/admin/group/delete/'.$group_entry->id, lang('globals:delete'), 'class="btn btn-flat btn-xs btn-danger confirm"'); ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<?php
				echo $groups['pagination'];
				?>
			<?php } else { ?>
				<div class="well">There is no entry for groups</div>
			<?php } ?>
			</div>

			<div class="box-footer clearfix">
				
			</div>
		</div>
	</div>
</div>