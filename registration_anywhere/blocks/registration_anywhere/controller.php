<?php
defined('C5_EXECUTE') or die('Access Denied.');

class RegistrationAnywhereBlockController extends BlockController {

  protected $btTable = 'btRegistrationAnywhere';
  protected $btInterfaceWidth = "350";
  protected $btInterfaceHeight = "110";

  protected $btCacheBlockRecord = true;
  protected $btCacheBlockOutput = true;
  protected $btCacheBlockOutputOnPost = false;
  protected $btCacheBlockOutputForRegisteredUsers = true;
  protected $btCacheBlockOutputLifetime = 300;

  public function getBlockTypeDescription() {
    return t('Place a registration form anywhere on you site');
  }

  public function getBlockTypeName() {
    return t('Registration Anywhere');
  }

	public function on_page_view() {
		Loader::model('attribute/categories/user');
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
    $this->set('form', Loader::helper('form'));
    $u = new User();
    $this->set('u', $u);
    $up = new Permissions(Page::getCurrentPage());
    $this->set('up', $up);
    $this->set('displayUserName', true);  
    if(!$this->use_custom_form_title) {
      $this->set('form_title', t(SITE . ' Registration'));
    }
	}

  public function save($args) {
    $args['show_logged_in'] = isset($args['show_logged_in']) ? 1 : 0;
    $args['use_custom_form_title'] = isset($args['use_custom_form_title']) ? 1 : 0;
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

}
  
?>
