<?php
require_once(WCF_DIR.'lib/system/WCFACP.class.php');

class CMSACP extends WCFACP {

	protected function getOptionsFilename() {
		return CMS_DIR.'options.inc.php';
	}
	
	protected function initTPL() {
		global $packageDirs;
		
		self::$tplObj = new ACPTemplate(self::getLanguage()->getLanguageID(), ArrayUtil::appendSuffix($packageDirs, 'acp/templates/'));
		$this->assignDefaultTemplateVariables();
	}
	
	protected function initAuth() {
		parent::initAuth();
		
		if (self::getUser()->banned) {
			throw new PermissionDeniedException();
		}
	}
	
	protected function assignDefaultTemplateVariables() {
		parent::assignDefaultTemplateVariables();
		
		self::getTPL()->assign(array(
			'additionalHeaderButtons' => '<li><a href="'.RELATIVE_CMS_DIR.'index.php?page=Index"><img src="'.RELATIVE_WCF_DIR.'icon/websiteS.png" alt="" /> <span>'.WCF::getLanguage()->get('cms.acp.jumpToCMS').'</span></a></li>',
			'pageTitle' => StringUtil::encodeHTML(PAGE_TITLE . ' - ' . PACKAGE_NAME . ' ' . PACKAGE_VERSION)
		));
	}
}
?>