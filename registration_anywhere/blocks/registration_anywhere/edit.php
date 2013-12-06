<?php defined('C5_EXECUTE') or die('Access Denied.') ?>
<style>
.ccm-ui label input[type=checkbox] {
	margin-bottom: 5px;
}
.ccm-ui label.top-level {
	font-size: 14px;
}
.ccm-ui .sub-section {
	margin-left: 15px;
}
.ccm-ui fieldset {
	margin-bottom: 10px;
}
.ccm-ui fieldset.active {
	border: 1px solid #38BDFF;
	background: #fafafa;
}
</style>

<fieldset class="well well-small">
<div id="use_custom_form_title_wrap">
	<label for="use_custom_form_title" class="top-level"
		<?= $form->checkbox('use_custom_form_title', 1, $use_custom_form_title) ?> <?= t('Use Custom Title') ?>
	</label>
</div>
<div class="sub-section">
	<?php echo $form->text('form_title', $form_title) ?>
</div>
</fieldset>

<fieldset class="well well-small">
<div id="show_logged_in_wrap" class="top-level">
	<label for="show_logged_in" class="top-level">
		<?= $form->checkbox('show_logged_in', 1, $show_logged_in) ?> <?= t('Display "Logged in as..."') ?>
	</label>
</div>

<div class="sub-section">
	<div id="use_custom_logged_in_as_wrap">
		<label for="use_custom_logged_in_as">
			<?= $form->checkbox('use_custom_logged_in_as', 1, $use_custom_logged_in_as) ?> <?= t('Use Custom "Logged in as..." text') ?>
		</label>
	</div>
	<div class="sub-section">
		<?php echo $form->text('logged_in_as', $logged_in_as) ?>
	</div>
	<div id="use_user_attribute_key_wrap">
		<label for="use_user_attribute_key">
			<?= $form->checkbox('use_user_attribute_key', 1, $use_user_attribute_key) ?> <?= t('Use User Attribute for "Logged in as..."') ?>
		</label>
	</div>
	<div class="sub-section">
		<?= $form->select('user_attribute_key_id', $user_attribute_selector, $user_attribute_key_id) ?>
	</div>
</div>
</fieldset>

<fieldset class="well well-small">
<div id="show_details_header_wrap">
	<label form="show_details_header" class="top-level">
		<?= $form->checkbox('show_details_header', 1, $show_details_header) ?> <?= t('Show Details Header') ?>
	</label>
</div>
<div class="sub-section">
	<div id="use_custom_details_header_wrap">	
		<label for="use_custom_details_header">
			<?= $form->checkbox('use_custom_details_header', 1, $use_custom_details_header) ?> <?= t('Use Custom Details Header') ?>
		</label>
	</div>
	<div class="sub-section">
		<?= $form->text('details_header', $details_header) ?>
	</div>
</div>
</fieldset>

<fieldset class="well well-small">
<div id="show_options_header_wrap">
	<label for="show_options_header" class="top-level">
		<?= $form->checkbox('show_options_header', 1, $show_options_header) ?> <?= t('Show Options Header') ?>
	</label>
</div>
<div class="sub-section">
	<div id="use_custom_options_header_wrap">
		<label for="use_custom_options_header">
			<?= $form->checkbox('use_custom_options_header', 1, $use_custom_options_header) ?> <?= t('Use Custom Options header') ?>
		</label>
	</div>
	<div>
		<?= $form->text('options_header', $options_header) ?>
	</div>
</div>
</fieldset>
