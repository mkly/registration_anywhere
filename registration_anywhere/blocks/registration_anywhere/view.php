<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<?php if($show_registration_disabled): ?>
	<div class="registration-anywhere">
		<p>
			<?php echo $registration_disabled_text ?>
		</p>
	</div>
<?php elseif($show_form): ?>
	<div class="registration-anywhere">
		<h2><?php echo t($form_title) ?></h2>
		<form id="registration-anywhere" name="registration-anywhere" method="post" action="<?php echo $this->url('/register', 'do_register')?>">
			<fieldset>
				<?php if($show_details_header): ?>
					<legend><?php echo $details_header ?></legend>
				<?php endif; ?>
				<?php if ($display_username): ?>
 			  	<div>
						<?php echo $form->label('uName', t('Username') )?>
						<span class="ccm-required">*</span>
						<div class="input">
 	   					<?php echo $form->text('uName')?>
						</div>
 			   	</div>
	 			<?php endif; ?>
  
				<div>
					<?php echo $form->label('uEmail', t('Email Address') )?>
					<span class="ccm-required">*</span>
					<div class="input">
 	  				<?php echo $form->text('uEmail')?>
					</div>
 	 			</div>
 	 
 	 			<div>
 	 			 	<?php echo $form->label('uPassword', t('Password') )?>
					<span class="ccm-required">*</span>
					<div class="input">
 	  				<?php echo $form->password('uPassword')?>
					</div>
 	 			</div>

				<div>
					<?php echo $form->label('uPasswordConfirm', t('Confirm Password') )?>
					<span class="ccm-required">*</span>
					<div class="input">
 		  			<?php echo $form->password('uPasswordConfirm')?>
					</div>
 		 		</div>
			</fieldset>
	
			<fieldset>
				<?php if($show_options_header): ?>
					<legend><?php echo $options_header ?></legend>
				<?php endif; ?>
				<?php foreach($attributes as $attribute): ?>
					<?php echo $aform->display($attribute, $attribute->isAttributeKeyRequiredOnRegister()); ?>
				<?php endforeach; ?>
			</fieldset> 
			<?php if($captcha_enabled): ?>
				<fieldset>
					<div class="clearfix">
						<?php echo $captcha->label() ?>
						<?php $captcha->display(); ?>
						<div>
							<?php $captcha->showInput(); ?>
						</div>
				</fieldset>
			<?php endif; ?>

			<fieldset>
				<div class="actions">
					<input id="register" class="primary btn ccm-input-submit" type="submit" value="<?php echo t('Register') ?> >" name="register" />
					<?php echo $form->hidden('rcID', $rcID); ?>
				</div>
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
