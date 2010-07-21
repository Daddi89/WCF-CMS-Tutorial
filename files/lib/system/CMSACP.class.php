<?php
/**
Das ist unsere ACP-Hauptklasse CMSACP.
Wir erben vom WCFACP welches direkt unter diesem Kommentar eingebunden wird
*/
require_once(WCF_DIR.'lib/system/WCFACP.class.php');

class CMSACP extends WCFACP {

	//Siehe CMSCore.class.php
	protected function getOptionsFilename() {
		return CMS_DIR.'options.inc.php';
	}
	
	//Siehe CMSCore.class.php
	protected function initTPL() {
		global $packageDirs;
		
		self::$tplObj = new ACPTemplate(self::getLanguage()->getLanguageID(), ArrayUtil::appendSuffix($packageDirs, 'acp/templates/'));
		$this->assignDefaultTemplateVariables();
	}

	//An dieser Stelle erweitern wir die in der initTPL() aufgerufene assignDefaultTemplateVariables() Methode
	protected function assignDefaultTemplateVariables() {
		parent::assignDefaultTemplateVariables();
		
		//Wir fügen dem Template 2 Variablen hinzu.
		//additionalHeaderButtons hängen wir einen Button an, in dem Falle den Button der uns vom ACP zum CMS bringt (im WBB ist das der "Zum Forum" Button)
		//pageTitle ist einfach nur eine Variable welche im ACP Header-Template genutzt wird um den Title-Tag der Seite zu füllen
		self::getTPL()->assign(array(
			'additionalHeaderButtons' => '<li><a href="'.RELATIVE_CMS_DIR.'index.php?page=Index"><img src="'.RELATIVE_WCF_DIR.'icon/websiteS.png" alt="" /> <span>'.WCF::getLanguage()->get('cms.acp.jumpToCMS').'</span></a></li>',
			'pageTitle' => StringUtil::encodeHTML(PACKAGE_NAME . ' - ' . PACKAGE_VERSION)
		));
	}
}
?>