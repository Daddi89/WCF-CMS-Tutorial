<?php
/**
Das ist unsere Hauptklasse CMSCore.
Wir erben vom WCF (wurde in der global.php included) und überschreiben 2 Methoden
*/
class CMSCore extends WCF {

	/**
	 Die automatisch vom WCF aufgerufende Methode initTPL ist dafür zuständig das Template System zu initialisieren.
	 */
	protected function initTPL() {
		//Wir brauchen die schon beschriebene $packageDirs Variable...
		global $packageDirs;
		
		//um daraus dem Template-System angeben zu können, wo es die anzuzeigenden Templates findet.
		//in diesem Falle wäre das CMS_DIR/templates/ und WCF_DIR/templates/
		//als zusätzlichem Parameter wird die Sprache angegeben
		self::$tplObj = new Template(self::getLanguage()->getLanguageID(), ArrayUtil::appendSuffix($packageDirs, 'templates/'));
		
		//hier rufen wir die WCF Methode assignDefaultTemplateVariables() auf
		//diese sorgt unter anderem dafür, dass im Template "this" zur Verfügung steht und wir darüber direkt auf das CMSCore Objekt zugreifen können
		//bspw für {$this->user->username}
		$this->assignDefaultTemplateVariables();
	}

	/**
	 Auch diese Methode überschreiben wir.
	 Diese gibt dem System den Speicherort an, an dem die options.inc.php Datei gespeichert werden soll.
	 Die Datei wird beim Aufruf des Systems automatisch geschrieben und enhält Konstanten wie z.b. die Zeitzone oder den Cookie-Pfad
	 */
	protected function getOptionsFilename() {
		return CMS_DIR.'options.inc.php';
	}

}
?>