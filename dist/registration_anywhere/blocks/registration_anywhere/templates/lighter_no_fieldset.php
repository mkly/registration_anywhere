<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php if ($show_registration_disabled) { ?>
	<div class="registration-anywhere">
		<p>
			<?= $registration_disabled_text ?>
		</p>
	</div>
<?php } else if ($show_form) { ?>
	<div class="registration-anywhere">
		<h2><?= t($form_title) ?></h2>
		<form id="registration-anywhere" name="registration-anywhere" method="post" action="<?= $this->url('/register', 'do_register') ?>">

			<?php if ($show_details_header) { ?>
				<h3><?= $details_header ?></h3>
			<? } ?>
			<?php if ($display_username_field) { ?>
				<?= $form->label('uName', t('Username') . '<span class="ccm-required">*</span>' ) ?>
				<?= $form->text('uName') ?>
			<?php } ?>
			<?= $form->label('uEmail', t('Email Address') . '<span class="ccm-required">*</span>') ?>
			<?= $form->text('uEmail') ?>
			<?= $form->label('uPassword', t('Password') . '<span class="ccm-required">*</span>') ?>
			<?= $form->password('uPassword') ?>
			<?= $form->label('uPasswordConfirm', t('Confirm Password') . '<span class="ccm-required">*</span>') ?>
			<?=$form->password('uPasswordConfirm') ?>
	
			<?php if ($show_options_header) { ?>
				<h3><?= $options_header ?></h3>
			<?php } ?>
			<?php foreach ($lighter_attributes as $attribute) { ?>
				<?php if ($attribute['required']) { ?>
					<?= $form->label($attribute['id'], $attribute['name'] . '<span class="ccm-required">*</span>') ?>
				<?php } ?>
					<?= $form->label($attribute['id'], $attribute['name']) ?>
				<?= $attribute['form'] ?>
			<?php } ?>

			<?php if ($captcha_enabled) { ?>
				<?php $captcha->display() ?>	
				<?= $captcha->label() ?>
				<?php $captcha->showInput() ?>
			<?php } ?>

			<?php $form->submit('register', t('Register') . ' &gt;') ?>

		</form>
	</div>
<?php } else if ($show_logged_in) { ?>
	<div class="registration-anywhere">
		<p>
			<?= $logged_in_as . ' ' . $display_name ?>
		</p>
	</div>
<?php } ?>
