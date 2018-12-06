<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"></h3>

		
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<!-- form start -->
		<form method="post" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('settings:title'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('title')) {
							$value = $this->input->post('title');
						}
						?>
						<input type="text" class="form-control" id="input-title" placeholder="<?php echo lang('settings:title'); ?>" name="title" value="<?php echo $value; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('settings:slug'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('slug')) {
							$value = $this->input->post('slug');
						}
						?>
						<input type="text" class="form-control" id="input-slug" placeholder="<?php echo lang('settings:slug'); ?>" name="slug" value="<?php echo $value; ?>" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('settings:description'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('description')) {
							$value = $this->input->post('description');
						}
						?>
						<input type="text" class="form-control" id="input" placeholder="<?php echo lang('settings:description'); ?>" name="description" value="<?php echo $value; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('settings:type'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('type')) {
							$value = $this->input->post('type');
						}
						?>
						
						<select class="form-control" name="type">
							<option <?php echo ($value=='text') ? 'selected="selected"' : ''; ?> value="text">Text</option>
							<option <?php echo ($value=='textarea') ? 'selected="selected"' : ''; ?> value="textarea">Text Area</option>
							<option <?php echo ($value=='password') ? 'selected="selected"' : ''; ?> value="password">Password</option>
							<option <?php echo ($value=='select') ? 'selected="selected"' : ''; ?> value="select">Select</option>
							<option <?php echo ($value=='select-multiple') ? 'selected="selected"' : ''; ?> value="select-multiple">Select Multiple</option>
							<option <?php echo ($value=='radio') ? 'selected="selected"' : ''; ?> value="radio">Radio</option>
							<option <?php echo ($value=='checkbox') ? 'selected="selected"' : ''; ?> value="checkbox">Check Box</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('settings:options'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('options')) {
							$value = $this->input->post('options');
						}
						?>
						<input type="text" class="form-control" id="input" placeholder="<?php echo lang('settings:options'); ?>" name="options" value="<?php echo $value; ?>">
						<span class="help-block">Format : value1=text 1|value2=text 2</span>
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('settings:default'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('default')) {
							$value = $this->input->post('default');
						}
						?>
						<input type="text" class="form-control" id="input" placeholder="<?php echo lang('settings:default'); ?>" name="default" value="<?php echo $value; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('settings:value'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('value')) {
							$value = $this->input->post('value');
						}
						?>
						<input type="text" class="form-control" id="input" placeholder="<?php echo lang('settings:value'); ?>" name="value" value="<?php echo $value; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('settings:group'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('group')) {
							$value = $this->input->post('group');
						}
						?>
						<input type="text" class="form-control" id="input" placeholder="<?php echo lang('settings:group'); ?>" name="group" value="<?php echo $value; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo lang('settings:is_required'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = 1;
						if($this->input->post('is_required')) {
							$value = $this->input->post('is_required');
						}
						?>
						<div class="radio">
							<label>
								<input <?php echo ($value==1) ? 'checked="checked"' : ''; ?> type="radio" name="is_required" id="is_required1" value="1">
								<?php echo lang('settings:is_required:1'); ?>
							</label>
						</div>
						<div class="radio">
							<label>
								<input <?php echo ($value==0) ? 'checked="checked"' : ''; ?> type="radio" name="is_required" id="is_required0" value="0">
								<?php echo lang('settings:is_required:0'); ?>
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="actionButtons" class="col-sm-2 control-label"></label>
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery.slugify.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#input-title').slugify({slug:'#input-slug',max_length:4});
	});
</script>