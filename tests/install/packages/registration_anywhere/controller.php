<?php
defined('C5_EXECUTE') or die('Access Denied.');
class RegistrationAnywhereTestStartingPointPackage extends StartingPointPackage {
	protected $pkgHandle = 'registration_anywhere_test';
	public function getPackageName() {
		return t('Registration Anywhere Test');
	}
	public function getPackageDescription() {
		return t('Registration Anywhere test sample content');
	}
}
