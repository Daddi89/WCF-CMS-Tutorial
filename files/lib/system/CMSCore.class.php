<?php
// wcf imports
require_once(WCF_DIR.'lib/system/style/StyleManager.class.php');


class CMSCore extends WCF {

	/**
	 * @see WCF::initTPL()
	 */
	protected function initTPL() {
		$this->initStyle();
		
		global $packageDirs;
		require_once(WCF_DIR.'lib/system/template/StructuredTemplate.class.php');
		self::$tplObj = new StructuredTemplate(self::getStyle()->templatePackID, self::getLanguage()->getLanguageID(), ArrayUtil::appendSuffix($packageDirs, 'templates/'));
		$this->assignDefaultTemplateVariables();

		// user ban
		if (self::getUser()->banned && (!isset($_REQUEST['page']) || $_REQUEST['page'] != 'LegalNotice')) {
			throw new NamedUserException(WCF::getLanguage()->getDynamicVariable('wcf.user.banned'));
		}
	}

	/**
	 * @see WCF::getOptionsFilename()
	 */
	protected function getOptionsFilename() {
		return CMS_DIR.'options.inc.php';
	}
		
	/**
	 * @see WCF::initSession()
	 */
	protected function initSession() {
		// start session
		require_once(CMS_DIR.'lib/system/session/CMSSessionFactory.class.php');
		$factory = new CMSSessionFactory();
		self::$sessionObj = $factory->get();
		self::$userObj = self::getSession()->getUser();
	}
	
	
	/**
	 * @see	WCF::assignDefaultTemplateVariables()
	 */
	protected function assignDefaultTemplateVariables() {
		parent::assignDefaultTemplateVariables();
		self::getTPL()->registerPrefilter('icon');
		self::getTPL()->assign(array(
			'timezone' => DateUtil::getTimezone()
		));
	}
	
	/**
	 * Initialises the style system.
	 */
	protected function initStyle() {
		StyleManager::changeStyle(self::getSession()->getStyleID());
	}

	/**
	 * Returns the active style object.
	 * 
	 * @return	ActiveStyle
	 */
	public static final function getStyle() {
		return StyleManager::getStyle();
	}
	

}
?>