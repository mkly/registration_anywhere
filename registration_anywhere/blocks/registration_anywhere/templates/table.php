<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php if ($show_registration_disabled) { ?>
	<div class="registration-anywhere">
		<p>
			<?= $registration_disabled_text ?>
		</p>
	</div>
<?php } else if ($show_form) { ?>
	<div class="registration-anywhere">
		<table>
			<form id="registration-anywhere" name="registration-anywhere" method="post" action="<?= $this->url('/register', 'do_register') ?>">
				<thead>
					<tr>
						<th colspan="2">
							<h2><?= t($form_title) ?></h2>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($show_details_header) { ?>
						<tr>
							<td colspan="2">
								<h3><?= $details_header ?></h3>
							</td>
						</tr>
					<?php } ?>
					<?php if ($display_username_field) { ?>
						<tr>
							<td>
								<?= $form->label('uName', t('Username') . '<pan class="ccm-required">*</span>' ) ?>
							</td>
							<td>
								<?= $form->text('uName') ?>
							</td>
						</tr>
					<?php } ?>
					<tr>
						<td>
							<?= $form->label('uEmail', t('Email Address') . '<span class="ccm-required">*</span>' ) ?>
						</td>
						<td>
							<?= $form->text('uEmail') ?>
						</td>
					</tr>
					<tr>
						<td>
							<?= $form->label('uPassword', t('Password') . '<span class="ccm-required">*</span>' ) ?>
						</td>
						<td>
							<?= $form->password('uPassword') ?>
						</td>
					</tr>
					<tr>
						<td>
							<?= $form->label('uPasswordConfirm', t('Confirm Password') . '<span class="ccm-required">*</span>') ?>
						</td>
						<td>
							<?= $form->password('uPasswordConfirm') ?>
						</td>
					</tr>
	
					<?php if ($show_options_header) { ?>
						<tr>
							<td colspan="2">
								<h3><?= $options_header ?></h3>
							</td>
						</tr>
					<?php } ?>
					<?php foreach ($lighter_attributes as $attribute) { ?>
						<tr>
							<td>
								<?php if ($attribute['required']) { ?>
									<?= $form->label($attribute['id'], $attribute['name'] . '<span class="ccm-required">*</span>') ?>
								<?php } else { ?>
									<?= $form->label($attribute['id'], $attribute['name']) ?>
								<?php } ?>
							</td>
							<td>
								<?= $attribute['form'] ?>
							</td>
						</tr>
					<?php } ?>
					<tr>
						<td>
								<?php echo $captcha->label() ?>
						</td>
						<td>
							<?php $captcha->showInput() ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<?php $captcha->display() ?>
						</td>
					</tr>
					<tr>
						<td colspan="2"><?= $form->submit('register', t('Register') . ' &gt;') ?></td>
					</tr>
				</tbody>
			</form>
		</table>
	</div>
<?php } else if ($show_logged_in) { ?>
	<div class="registration-anywhere">
		<p>
			<?= $logged_in_as . ' ' . $display_name ?>
		</p>
	</div>
<?php } ?>
