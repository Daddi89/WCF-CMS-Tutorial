<?php
/**
Das ist unsere Hauptklasse CMSCore.
Wir erben vom WCF (wurde in der global.php included) und �berschreiben 2 Methoden
*/
class CMSCore extends WCF {

	/**
	 Die automatisch vom WCF aufgerufende Methode initTPL ist daf�r zust�ndig das Template System zu initialisieren.
	 */
	protected function initTPL() {
		//Wir brauchen die schon beschriebene $packageDirs Variable...
		global $packageDirs;
		
		//um daraus dem Template-System angeben zu k�nnen, wo es die anzuzeigenden Templates findet.
		//in diesem Falle w�re das CMS_DIR/templates/ und WCF_DIR/templates/
		//als zus�tzlichem Parameter wird die Sprache angegeben
		self::$tplObj = new Template(self::getLanguage()->getLanguageID(), ArrayUtil::appendSuffix($packageDirs, 'templates/'));
		
		//hier rufen wir die WCF Methode assignDefaultTemplateVariables() auf
		//diese sorgt unter anderem daf�r, dass im Template "this" zur Verf�gung steht und wir dar�ber direkt auf das CMSCore Objekt zugreifen k�nnen
		//bspw f�r {$this->user->username}
		$this->assignDefaultTemplateVariables();
	}

	/**
	 Auch diese Methode �berschreiben wir.
	 Diese gibt dem System den Speicherort an, an dem die options.inc.php Datei gespeichert werden soll.
	 Die Datei wird beim Aufruf des Systems automatisch geschrieben und enh�lt Konstanten wie z.b. die Zeitzone oder den Cookie-Pfad
	 */
	protected function getOptionsFilename() {
		return CMS_DIR.'options.inc.php';
	}

}
?>