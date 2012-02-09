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

				<?php if($show_details_header): ?>
					<h3><?php echo $details_header ?></h3>
				<?php endif; ?>
				<?php if ($display_username_field): ?>
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
	
			<?php if($show_options_header): ?>
				<h3><?php echo $options_header ?></h3>
			<?php endif; ?>
			<?php foreach($attributes as $attribute): ?>
				<?php echo $aform->display($attribute, $attribute->isAttributeKeyRequiredOnRegister()); ?>
			<?php endforeach; ?>

			<?php if($captcha_enabled): ?>
				<div>
					<div>
						<?php if($pre_55): ?>
							<?php echo $form->label('captcha', t('Please type the letters and numbers shown in the image')); ?>
						<?php else: ?>
							<?php echo $captcha->label() ?>
						<?php endif; ?>
						<div>
							<?php $captcha->showInput(); ?>
						</div>
						<div>
							<?php $captcha->display(); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="ccm-buttons">
				<?php echo $form->submit('register', t('Register')) ?>
				<?php echo $form->hidden('rcID', $rcID); ?>
			</div>

		</form>
	</div>
<?php elseif($show_logged_in): ?>
	<div class="registration-anywhere">
		<p>
			<?php echo $logged_in_as . ' ' . $display_name ?>
		</p>
	</div>
<?php endif; ?>
