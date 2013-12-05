<?php
defined('C5_EXECUTE') or die('Access Denied.');

class RegistrationAnywhereBlockController extends BlockController {

  protected $btTable = 'btRegistrationAnywhere';
  protected $btInterfaceWidth = "350";
  protected $btInterfaceHeight = "400";

  protected $btCacheBlockRecord = true;
  protected $btCacheBlockOutput = false;
  protected $btCacheBlockOutputOnPost = false;
  protected $btCacheBlockOutputForRegisteredUsers = false;
  protected $btCacheBlockOutputLifetime = 300;

  public function getBlockTypeDescription() {
    return t('Place a registration form anywhere on you site');
  }

  public function getBlockTypeName() {
    return t('Registration Anywhere');
  }

	public function on_page_view() {
		$attribs = UserAttributeKey::getRegistrationList();
		// we need to suppress the form fields
		// from printing
		ob_start();
		foreach($attribs as $ak) {
			$akc = $ak->getController();
			$akc->form();
		}
		ob_end_clean();
	}

  public function view() {
		$form = Loader::helper('form');
    $this->set('form', $form);
		$this->set('aform', Loader::helper('form/attribute'));

		$captcha = Loader::helper('validation/captcha');
		$this->set('captcha', $captcha);

    $u = new User();
		$up = new Permissions(Page::getCurrentPage());
		if(!$u->isLoggedIn() || $up->canAdminPage()) {
			$this->set('show_form', true);
		}

		if($u->isLoggedIn() && $this->use_user_attribute_key) {
			$ui = UserInfo::getByID($u->getUserID());
			$ak = UserAttributeKey::getByID($this->user_attribute_key_id);
			if($ak) {
				$this->set('display_name', $ui->getAttribute($ak));
			} else {
				$this->set('display_name', $u->getUserName());
			}
		} elseif ($u->isLoggedIn()) {
			$this->set('display_name', $u->getUserName());
		}

    $this->set('display_username_field', true);  
		$this->load_attributes();
		$this->set('captcha_enabled', ENABLE_REGISTRATION_CAPTCHA);
		$this->set('show_registration_disabled', !ENABLE_REGISTRATION);

		$this->set('registration_disabled_text', t('Registration Disabled.'));

    if(!$this->use_custom_form_title) {
      $this->set('form_title', t(SITE . ' Registration'));
		}

		if(!$this->use_custom_details_header) {
			$this->set('details_header', t('Your Details'));
		}

		if(!$this->use_custom_options_header) {
			$this->set('options_header', t('Options'));
		}

		if(!$this->use_custom_logged_in_as) {
			$this->set('logged_in_as', t('Logged in as'));
		}


	}

	public function add() {
		$this->edit();
	}

	public function edit() {
		$this->set('user_attribute_selector', $this->user_attribute_selector());
	}

  public function save($args) {
    $args['show_logged_in'] = isset($args['show_logged_in']) ? 1 : 0;
		$args['use_custom_form_title'] = isset($args['use_custom_form_title']) ? 1 : 0;
		$args['use_custom_logged_in_as'] = isset($args['use_custom_logged_in_as']) ? 1 : 0;
		$args['use_user_attribute_key'] = isset($args['use_user_attribute_key']) ? 1 : 0;
		$args['show_details_header'] = isset($args['show_details_header']) ? 1 : 0;
		$args['use_custom_details_header'] = isset($args['use_custom_details_header']) ? 1 : 0;
		$args['show_options_header'] = isset($args['show_options_header']) ? 1 : 0;
		$args['use_custom_options_header'] = isset($args['use_custom_options_header']) ? 1 : 0;
    parent::save($args);
  }
	/* This is for anyone who wants to add the block 
	/* in a theme from the global scrapbook
	/* In the header before
	/* Loader::element('header_required')
	/* add this
	/* <?php
	/*   $bl = Block:getByName("Global SB Block Name");
	/*   if(is_object($bl)) $bl->getController()
	/*     ->addRegistrationAnywhereHeaderItems();
	/* ?>
	 */
	public function addRegistrationAnywhereHeaderItems() {
		// This is so that if on_page_view ever needs
		// something different or extra we won't
		// have backwards compatibility problems
		$this->on_page_view();
	}

	protected function load_attributes() {
		$attributes = UserAttributeKey::getRegistrationList();
		$this->set('attributes', $attributes);

		$lighter_attributes = array();
		foreach($attributes as $idx => $attribute) {
			$display = $attribute->render('form', false, true);
			preg_match('/id=\"([A-z0-9\-\_]+)\"/', $display, $match);
			if($match) {
				$lighter_attributes[$idx]['id'] = $match[1];
			}
			$lighter_attributes[$idx]['form'] = $display;
			$lighter_attributes[$idx]['name'] = $attribute->getAttributeKeyName();
			$lighter_attributes[$idx]['required'] = $attribute->isAttributeKeyRequiredOnRegister();
		}
		$this->set('lighter_attributes', $lighter_attributes);
	}

	protected function user_attribute_selector() {
		loader::model('attribute/categories/user');
		$registration_list = UserAttributeKey::getRegistrationList();
		$options = array();
		foreach($registration_list as $attrib) {
			$options[$attrib->getAttributeKeyID()] = $attrib->getAttributeKeyName();
		}
		return $options;
	}	

}
  
?>
