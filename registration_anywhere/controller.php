<?php
defined('C5_EXECUTE') or die('Access Denied.');

class RegistrationAnywherePackage extends Package {

  protected $pkgHandle = 'registration_anywhere';
  protected $appVersionRequired = '5.5';
  protected $pkgVersion = '1.2.5';

  public function getPackageDescription() {
    return t('Place a registration form anywhere on your site.');
  }

  public function getPackageName() {
    return t('Registration Anywhere');
  }

  public function install() {
    $pkg = parent::install();

    BlockType::InstallBlockTypeFromPackage('registration_anywhere', $pkg);
  }

}
?>
