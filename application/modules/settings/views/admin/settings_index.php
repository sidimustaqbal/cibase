<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"></h3>

		<div class="action-buttons pull-right">
			<?php
			echo anchor('settings/admin/settings/create', lang('settings:settings:create'), 'class="btn btn-flat btn-sm btn-primary"');
			?>
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<!-- form start -->
		<form method="post" class="form-horizontal">
			<div class="box-body">
				<?php foreach($settings['entries'] as $setting_entry) { ?>
				<div class="form-group">
					<label for="input" class="col-sm-2 control-label"><?php echo $setting_entry['title']; ?></label>

					<div class="col-sm-5">
						<?php
						$value = '';
						if($this->input->post($setting_entry['slug'])) {
							$value = $this->input->post($setting_entry['slug']);
						} else {
							$value = $setting_entry['default'];
							if($setting_entry['value']!='') {
								$value = $setting_entry['value'];
							}
						}

						echo generate_element($setting_entry['type'], $setting_entry['slug'], $setting_entry['title'], $setting_entry['value'], $setting_entry['options']);
						?>
					</div>
				</div>
				<?php } ?>
				<div class="form-group">
					<label for="actionButtons" class="col-sm-2 control-label"></label>
					<div class="col-sm-5">
						<button type="submit" class="btn btn-flat btn-sm btn-primary">Save</button>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</form>
	</div>
</div>
<!-- /.box -->