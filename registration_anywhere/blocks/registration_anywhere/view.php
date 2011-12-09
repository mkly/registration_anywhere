<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<?php global $c; ?>
<?php if((!$u->isLoggedIn() || $c->isEditMode()) && ENABLE_REGISTRATION): ?>
<h2><?php echo t('Site Registration')?></h1>

<form id="registration-anywhere" name="registration-anywhere" method="post" action="<?php echo $this->url('/register', 'do_register')?>">

  <?php  if ($displayUserName) { ?>
    <div>
    <?php echo $form->label('uName', t('Username') )?>
    <?php echo $form->text('uName')?>
    </div>
    <br/>
  <?php  } ?>
  
  <div>
    <?php echo $form->label('uEmail', t('Email Address') )?>
    <?php echo $form->text('uEmail')?>
  </div>
  <br/>
  
  <div>
    <?php echo $form->label('uPassword', t('Password') )?>
    <?php echo $form->password('uPassword')?>
  </div>
  <br/>

  <div>
    <?php echo $form->label('uPasswordConfirm', t('Confirm Password') )?>
    <?php echo $form->password('uPasswordConfirm')?>
  </div>

  <?php 

	Loader::model('attribute/categories/user');
  $attribs = UserAttributeKey::getRegistrationList();
  $af = Loader::helper('form/attribute');
  
  foreach($attribs as $ak) { 
    print $af->display($ak, $ak->isAttributeKeyRequiredOnRegister());  
    print '<br/><br/>';
  }
  
  if (ENABLE_REGISTRATION_CAPTCHA) { 
    print $form->label('captcha', t('Please type the letters and numbers shown in the image.'));
    print '<br/>';
    $captcha = Loader::helper('validation/captcha');        
    $captcha->display();
    ?>
    
    <div><?php  $captcha->showInput();?> </div>
  <?php } ?>  
  <br/>
  <div class="ccm-button">
    <?php echo $form->submit('register', t('Register'))?>
    <?php echo $form->hidden('rcID', $rcID); ?>
  </div>

</form>
<?php endif; ?>
