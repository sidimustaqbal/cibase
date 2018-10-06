<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $template['title']; ?></h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<!-- form start -->
		<form method="post" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('users:group:name'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('name')) {
							$value = $this->input->post('name');
						} elseif ($mode=='edit') {
							$value = (isset($field->name)) ? $field->name : '';
						}
						?>
						<input type="text" class="form-control" id="input" placeholder="<?php echo lang('users:group:name'); ?>" name="name" value="<?php echo $value; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input<?php echo lang('users:group:description'); ?>" class="col-sm-2 control-label"><?php echo lang('users:group:description'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('description')) {
							$value = $this->input->post('description');
						} elseif ($mode=='edit') {
							$value = (isset($field->description)) ? $field->description : '';
						}
						?>
						<input type="text" class="form-control" id="input<?php echo lang('users:group:description'); ?>" placeholder="<?php echo lang('users:group:description'); ?>" name="description" value="<?php echo $value; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="actionButtons" class="col-sm-2 control-label"></label>
					<?php echo (isset($field->id)) ? form_hidden('id', $field->id) : '';?>
					<div class="col-sm-5">
						<button type="submit" class="btn btn-flat btn-sm btn-primary">Save</button>
						<a href="<?php echo base_url().$return; ?>" class="btn btn-flat btn-sm btn-default">Cancel</a>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</form>
	</div>
</div>
<!-- /.box -->