<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<script type="text/javascript" charset="utf-8">
	$(function() {
		set_relationship('#use_custom_form_title', '#use_custom_form_title_wrap + div');	
		set_relationship('#show_logged_in', '#show_logged_in_wrap + div');
		set_relationship('#use_custom_logged_in_as', '#use_custom_logged_in_as_wrap + div');
		set_relationship('#use_user_attribute_key', '#use_user_attribute_key_wrap + div');
		set_relationship('#show_details_header', '#show_details_header_wrap + div');
		set_relationship('#use_custom_details_header', '#use_custom_details_header_wrap + div');
		set_relationship('#show_options_header', '#show_options_header_wrap + div');
		set_relationship('#use_custom_options_header', '#use_custom_options_header_wrap + div');
	});
	function set_dependant_display(master, slave) {
		if($(master).is(':checked')) {
			$(slave).show();
		} else {
			$(slave).hide();
		}
		console.log($(slave));
	}
	function set_relationship(master, slave) {
		set_dependant_display(master, slave);
		$(master).change(function() {
			set_dependant_display(master, slave);
		});
	}
</script>
<div class="ccm-block-field-group">
<div id="use_custom_form_title_wrap">
	<?php echo $form->checkbox('use_custom_form_title', 1, $use_custom_form_title) ?>
	<?php echo t('Use Custom Title') ?>
</div>
<div>
	<?php echo $form->text('form_title', $form_title) ?>
</div>
<div id="show_logged_in_wrap">
	<?php echo $form->checkbox('show_logged_in', 1, $show_logged_in) ?>
	<?php echo t('Display "Logged in as..."') ?>
</div>
<div>
	<div id="use_custom_logged_in_as_wrap">
		<?php echo $form->checkbox('use_custom_logged_in_as', 1, $use_custom_logged_in_as) ?>
		<?php echo t('Use Custom "Logged in as..." text') ?>
	</div>
	<div>
		<?php echo $form->text('logged_in_as', $logged_in_as) ?>
	</div>
	<div id="use_user_attribute_key_wrap">
		<?php echo $form->checkbox('use_user_attribute_key', 1, $use_user_attribute_key); ?>
		<?php echo t('Use User Attribute for "Logged in as..."'); ?>
	</div>
	<div>
		<?php echo $form->select('user_attribute_key_id', $user_attribute_selector, $user_attribute_key_id); ?>
	</div>
</div>
<div id="show_details_header_wrap">
	<?php echo $form->checkbox('show_details_header', 1, $show_details_header); ?>
	<?php echo t('Show Details Header') ;?>
</div>
<div>
	<div id="use_custom_details_header_wrap">	
		<?php echo $form->checkbox('use_custom_details_header', 1, $use_custom_details_header); ?>
		<?php echo t('Use Custom Details Header'); ?>
	</div>
	<div>
		<?php echo $form->text('details_header', $details_header); ?>
	</div>
</div>
<div id="show_options_header_wrap">
	<?php echo $form->checkbox('show_options_header', 1, $show_options_header); ?>
	<?php echo t('Show Options Header'); ?>
</div>
<div>
	<div id="use_custom_options_header">	
		<?php echo $form->checkbox('use_custom_options_header', 1, $use_custom_options_header); ?>
		<?php echo t('Use Custom Options header'); ?>
	</div>
	<div>
		<?php echo $form->text('options_header', $options_header); ?>
	</div>
</div>
