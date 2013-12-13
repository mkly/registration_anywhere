<?php defined('C5_EXECUTE') or die("Access Denied.") ?>
<?php if ($show_registration_disabled) { ?>
	<div class="registration-anywhere">
		<p>
			<?= $registration_disabled_text ?>
		</p>
	</div>
<?php } else if ($show_form) { ?>
	<div class="registration-anywhere">
		<h2><?= t($form_title) ?></h2>
		<form id="registration-anywhere" name="registration-anywhere" method="post" action="<?= $this->url('/register', 'do_register')?>">

			<fieldset>
				<?php if ($show_details_header) { ?>
					<legend><?= $details_header ?></legend>
				<?php } ?>
				<?php if ($display_username_field) { ?>
				<div>
						<?= $form->label('uName', t('Username')) ?>
						<span class="ccm-required">*</span>
						<div class="input">
						<?=$form->text('uName') ?>
						</div>
				</div>
				<?php } ?>

				<div>
					<?= $form->label('uEmail', t('Email Address')) ?>
					<span class="ccm-required">*</span>
					<div class="input">
					<?= $form->text('uEmail') ?>
					</div>
				</div>

				<div>
					<?= $form->label('uPassword', t('Password')) ?>
					<span class="ccm-required">*</span>
					<div class="input">
					<?= $form->password('uPassword') ?>
					</div>
				</div>

				<div>
					<?= $form->label('uPasswordConfirm', t('Confirm Password')) ?>
					<span class="ccm-required">*</span>
					<div class="input">
					<?= $form->password('uPasswordConfirm') ?>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<?php if ($show_options_header) { ?>
					<legend><?= $options_header ?></legend>
				<?php } ?>
				<?php foreach ($attributes as $attribute) { ?>
					<?= $aform->display($attribute, $attribute->isAttributeKeyRequiredOnRegister()) ?>
				<?php } ?>
			</fieldset> 

			<?php if ($captcha_enabled) { ?>
				<fieldset>
					<div class="clearfix">
						<div>
							<?php echo $captcha->label() ?>
						</div>
						<?php $captcha->showInput() ?>
						<div>
							<?php $captcha->display() ?>
						</div>
					</div>
				</fieldset>
			<?php } ?>

			<fieldset>
				<div class="actions">
					<input id="register" class="primary btn ccm-input-submit" type="submit" value="<?= t('Register') ?> >" name="register" />
					<?= $form->hidden('rcID', $rcID) ?>
				</div>
			</fieldset>

		</form>
	</div>
<?php }  else if ($show_logged_in) { ?>
	<div class="registration-anywhere">
		<p>
			<?= $logged_in_as . ' ' . $display_name ?>
		</p>
	</div>
<?php } ?>
