<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php if($show_registration_disabled): ?>
	<div class="registration-anywhere">
		<p>
			<?php echo $registration_disabled_text ?>
		</p>
	</div>
<?php elseif($show_form): ?>
	<div class="registration-anywhere">
		<table>
			<form id="registration-anywhere" name="registration-anywhere" method="post" action="<?php echo $this->url('/register', 'do_register') ?>">
				<thead>
					<tr>
						<th colspan="2">
							<h2><?php echo t($form_title); ?></h2>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php if($show_details_header): ?>
						<tr>
							<td colspan="2">
								<h3><?php echo $details_header ?></h3>
							</td>
						</tr>
					<?php endif; ?>
					<?php if($display_username): ?>
						<tr>
							<td>
								<?php echo $form->label('uName', t('Username') . '<pan class="ccm-required">*</span>' ) ?>
							</td>
							<td>
								<?php echo $form->text('uName') ?>
							</td>
						</tr>
					<?php endif; ?>
					<tr>
						<td>
							<?php echo $form->label('uEmail', t('Email Address') . '<span class="ccm-required">*</span>' ) ?>
						</td>
						<td>
							<?php echo $form->text('uEmail') ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $form->label('uPassword', t('Password') . '<span class="ccm-required">*</span>' ) ?>
						</td>
						<td>
							<?php echo $form->password('uPassword') ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $form->label('uPasswordConfirm', t('Confirm Password') . '<span class="ccm-required">*</span>') ?>
						</td>
						<td>
							<?php echo $form->password('uPasswordConfirm') ?>
						</td>
					</tr>
	
					<?php if($show_options_header): ?>
						<tr>
							<td colspan="2">
								<h3><?php echo $options_header ?></h3>
							</td>
						</tr>
					<?php endif; ?>
					<?php foreach($lighter_attributes as $attribute): ?>
						<tr>
							<td>
								<?php if($attribute['required']): ?>
									<?php echo $form->label($attribute['id'], $attribute['name'] . '<span class="ccm-required">*</span>') ?>
								<?php else: ?>
									<?php echo $form->label($attribute['id'], $attribute['name']) ?>
								<?php endif; ?>
							</td>
							<td>
								<?php echo $attribute['form'] ?>
							</td>
						</tr>
					<?php endforeach; ?>
					<tr>
						<td colspan="2"><?php echo $form->submit('register', t('Register') . ' &gt;'); ?></td>
					</tr>
				</tbody>
			</form>
		</table>
	</div>
<?php elseif($show_logged_in): ?>
	<div class="registration-anywhere">
		<p>
			<?php echo $logged_in_as . ' ' . $display_name ?>
		</p>
	</div>
<?php endif; ?>
