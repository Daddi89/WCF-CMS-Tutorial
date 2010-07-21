<?php
/*
Das ist unsere IndexPage.class.php
Diese wird automatisch aufgerufen vom Requesthandler, insofern in der URL nichts anderes angegeben wurde.
*/

//Wir binden vom WCF die AbstractPage Klasse ein...
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');

//... und erben direkt von dieser.
//Innerhalb der Klasse geben wir noch das aufzurufende Template an, 
//um dessen Anzeige kümmert sich die show() Methode aus der Abstract-Page
class IndexPage extends AbstractPage {
	public $templateName = "index";
	
}
?>