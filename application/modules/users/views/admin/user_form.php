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
					<label for="inputEmail" class="col-sm-2 control-label"><?php echo lang('users:email'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						$disabled = '';
						if($this->input->post('email')) {
							$value = $this->input->post('email');
						} elseif ($mode=='edit') {
							$value = (isset($field->email)) ? $field->email : '';
							$disabled = 'disabled="disabled"';
						}
						?>
						<input type="email" class="form-control" id="inputEmail" placeholder="<?php echo lang('users:email'); ?>" name="email" value="<?php echo $value; ?>" <?php echo $disabled; ?>>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-sm-2 control-label"><?php echo lang('users:password'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('password')) {
							$value = $this->input->post('password');
						} elseif ($mode=='edit') {

						}
						?>
						<input type="password" class="form-control" id="inputPassword" placeholder="<?php echo lang('users:password'); ?>" name="password" value="<?php echo $value; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputconfirm_password" class="col-sm-2 control-label"><?php echo lang('users:confirm_password'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('confirm_password')) {
							$value = $this->input->post('confirm_password');
						} elseif ($mode=='edit') {

						}
						?>
						<input type="password" class="form-control" id="inputconfirm_password" placeholder="<?php echo lang('users:confirm_password'); ?>" name="confirm_password" value="<?php echo $value; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputgroups" class="col-sm-2 control-label"><?php echo lang('users:groups'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = array();
						if($this->input->post('groups')) {
							$value = $this->input->post('groups');
						} elseif ($mode=='edit') {
							// $value = (isset($field->groups)) ? $field->groups : '';
							if(!empty($field->groups)) {
								foreach ($field->groups as $group) {
									$value[] = $group->id;
								}
							}
						}
						?>
						
						<?php foreach($groups as $group_entry) { ?>
						<div class="checkbox">
							<label>
								<?php
								$checked = '';
								if(in_array($group_entry['id'], $value)) {
									$checked = 'checked="checked"';
								}
								?>
								<input type="checkbox" name="groups[]" value="<?php echo $group_entry['id']; ?>" <?php echo $checked; ?>>
								<?php echo $group_entry['name']; ?>
							</label>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputFirstName" class="col-sm-2 control-label"><?php echo lang('users:first_name'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('first_name')) {
							$value = $this->input->post('first_name');
						} elseif ($mode=='edit') {
							$value = (isset($field->first_name)) ? $field->first_name : '';
						}
						?>
						<input type="text" class="form-control" id="inputFirstName" placeholder="<?php echo lang('users:first_name'); ?>" name="first_name" value="<?php echo $value; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputlast_name" class="col-sm-2 control-label"><?php echo lang('users:last_name'); ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post('last_name')) {
							$value = $this->input->post('last_name');
						} elseif ($mode=='edit') {
							$value = (isset($field->last_name)) ? $field->last_name : '';
						}
						?>
						<input type="text" class="form-control" id="inputlast_name" placeholder="<?php echo lang('users:last_name'); ?>" name="last_name" value="<?php echo $value; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="actionButtons" class="col-sm-2 control-label"></label>
					<?php echo (isset($field->id)) ? form_hidden('id', $field->id) : '';?>
					<?php echo form_hidden($csrf); ?>
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