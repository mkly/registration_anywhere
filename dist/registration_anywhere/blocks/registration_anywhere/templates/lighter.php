<?php defined('C5_EXECUTE') or die('Access Denied.') ?>
<?php if ($show_registration_disabled) { ?>
	<div class="registration-anywhere">
		<p>
			<?= $registration_disabled_text ?>
		</p>
	</div>
<?php } else if($show_form) { ?>
	<div class="registration-anywhere">
		<h2><?= t($form_title) ?></h2>
		<form id="registration-anywhere" name="registration-anywhere" method="post" action="<?= $this->url('/register', 'do_register') ?>">

			<fieldset>
				<?php if ($show_details_header) { ?>
					<legend><?= $details_header ?></legend>
				<?php } ?>
				<?php if ($display_username_field) { ?>
					<?= $form->label('uName', t('Username') . '<span class="ccm-required">*</span>' ) ?>
					<?= $form->text('uName') ?>
				<?php } ?>
				<?= $form->label('uEmail', t('Email Address') . '<span class="ccm-required">*</span>') ?>
				<?= $form->text('uEmail') ?>
				<?= $form->label('uPassword', t('Password') . '<span class="ccm-required">*</span>') ?>
				<?= $form->password('uPassword') ?>
				<?= $form->label('uPasswordConfirm', t('Confirm Password') . '<span class="ccm-required">*</span>') ?>
				<?= $form->password('uPasswordConfirm') ?>
			</fieldset>
		
			<fieldset>
				<?php if ($show_options_header) { ?>
					<legend><?= $options_header ?></legend>
				<?php } ?>
				<?php foreach ($lighter_attributes as $attribute) { ?>
					<?php if ($attribute['required']) { ?>
						<?= $form->label($attribute['id'], $attribute['name'] . '<span class="ccm-required">*</span>') ?>
					<?php } ?>
					<?= $form->label($attribute['id'], $attribute['name']) ?>
					<?= $attribute['form'] ?>
				<?php } ?>
			</fieldset>

			<?php if ($captcha_enabled) { ?>
				<fieldset>
					<?php $captcha->display() ?>
					<?= $captcha->label() ?>
					<?php $captcha->showInput() ?>
				</fieldset>
			<?php } ?>

			<?= $form->submit('register', t('Register') . ' >'); ?>

		</form>
	</div>
<?php } else if ($show_logged_in) { ?>
	<div class="registration-anywhere">
		<p>
			<?= $logged_in_as . ' ' . $display_name ?>
		</p>
	</div>
<?php } ?>
