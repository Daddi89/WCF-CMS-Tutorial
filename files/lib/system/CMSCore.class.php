<?php
// wcf imports
require_once(WCF_DIR.'lib/system/style/StyleManager.class.php');


class CMSCore extends WCF {

	/**
	 * @see WCF::initTPL()
	 */
	protected function initTPL() {
		global $packageDirs;
		self::$tplObj = new Template(self::getLanguage()->getLanguageID(), ArrayUtil::appendSuffix($packageDirs, 'templates/'));
		$this->assignDefaultTemplateVariables();
	}

	/**
	 * @see WCF::getOptionsFilename()
	 */
	protected function getOptionsFilename() {
		return CMS_DIR.'options.inc.php';
	}

}
?>