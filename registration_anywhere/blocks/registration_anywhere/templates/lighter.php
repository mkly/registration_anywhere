<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php if($show_registration_disabled): ?>
	<div class="registration-anywhere">
		<p>
			<?php echo $registration_disabled_text ?>
		</p>
	</div>
<?php elseif($show_form): ?>
	<div class="registration-anywhere">
		<h2><?php echo t($form_title) ?></h2>
		<form id="registration-anywhere" name="registration-anywhere" method="post" action="<?php echo $this->url('/register', 'do_register') ?>">

			<fieldset>
				<?php if($show_details_header): ?>
					<legend><?php echo $details_header ?></legend>
				<?php endif; ?>
				<?php if($display_username): ?>
					<?php echo $form->label('uName', t('Username') . '<span class="ccm-required">*</span>' ) ?>
					<?php echo $form->text('uName') ?>
				<?php endif; ?>
				<?php echo $form->label('uEmail', t('Email Address') . '<span class="ccm-required">*</span>') ?>
				<?php echo $form->text('uEmail') ?>
				<?php echo $form->label('uPassword', t('Password') . '<span class="ccm-required">*</span>') ?>
				<?php echo $form->password('uPassword') ?>
				<?php echo $form->label('uPasswordConfirm', t('Confirm Password') . '<span class="ccm-required">*</span>') ?>
				<?php echo $form->password('uPasswordConfirm') ?>
			</fieldset>
		
			<fieldset>
				<?php if($show_options_header): ?>
					<legend><?php echo $options_header ?></legend>
				<?php endif; ?>
				<?php foreach($lighter_attributes as $attribute): ?>
					<?php if($attribute['required']): ?>
						<?php echo $form->label($attribute['id'], $attribute['name'] . '<span class="ccm-required">*</span>') ?>
					<?php else: ?>
						<?php echo $form->label($attribute['id'], $attribute['name']) ?>
					<?php endif; ?>
					<?php echo $attribute['form'] ?>
				<?php endforeach; ?>
			</fieldset>

			<fieldset>
				<?php echo $form->submit('register', t('Register') . ' >'); ?>
			</fieldset>
		</form>
	</div>
<?php elseif($show_logged_in): ?>
	<div class="registration-anywhere">
		<p>
			<?php echo t('Logged in as') . ' ' . $display_name ?>
		</p>
	</div>
<?php endif; ?>


