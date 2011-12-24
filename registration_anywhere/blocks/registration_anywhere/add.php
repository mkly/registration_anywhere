<script type="text/javascript" charset="utf-8">
	$(function() {
		set_form_title_display();
		$('#use_custom_form_title').change(function() {
			set_form_title_display();
		});
	});
	function set_form_title_display() {
		if($('#use_custom_form_title').is(':checked')) {
			$('#form_title').show();
		} else {
			$('#form_title').hide();
		}
	}
</script>
<div class="ccm-block-field-group">
<?php echo $form->checkbox('show_logged_in', 1, true) ?>
<?php echo t('Display "Currently logged in as..."') ?>
<br />
<br />
<?php echo $form->checkbox('use_custom_form_title', 1, $use_custom_form_title) ?>
<?php echo t('Custom Title') ?>
<br />
<?php echo $form->text('form_title', $form_title) ?>
</div>
