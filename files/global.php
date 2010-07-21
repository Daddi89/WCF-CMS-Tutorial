<?php
//In diesem Array werden die Pfade zum WCF und zur Endanwendung abgespeichert.
//Später können wir dieses Array übergeben damit die Systeme wissen wo sie nach Klassen oder Templates suchen müssen.
$packageDirs = array();

//Beim installieren einer Endanwendung legt das WCF automatisch dafür eine config.inc.php an. 
//Inhalt der Datei sind mehrere Konstanten-Definitionen wie in dem Falle zum Beispiel CMS_DIR oder beim WBB das WBB_DIR
//Das einbinden der Datei legt dabei in das $packageDirs Array die CMS_DIR Variable ab, also wo im Dateisystem das CMS liegt. 
require_once(dirname(__FILE__).'/config.inc.php');

//Hier wird das WCF eingebunden in unsere Endanwendung
//Dies müssen wir machen um unsere Endanwendung vom WCF ableiten zu können.
require_once(RELATIVE_WCF_DIR.'global.php');

//Hier wird (falls nicht bereits vorhanden) dem $packageDirs Array die CMS_DIR und die wichtige WCF_DIR Konstante abgelegt.
if(!count($packageDirs)) $packageDirs[] = CMS_DIR;
$packageDirs[] = WCF_DIR;


//Das einbinden der Core-Klasse, welche vom WCF erbt, passiert hier.
//Anschliessent wird ein neues Objekt der Klasse instanziert und danach in der index.php wird durch den Requesthandler z.b. die IndexPage.class.php aufgerufen.
require_once(CMS_DIR.'lib/system/CMSCore.class.php');
new CMSCore();
?>