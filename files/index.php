<?
//Um die index.php gewollt klein zu halten, binden wir die global.php ein
require_once('./global.php');

//Der RequestHandler des WCF wird aufgerufen. Ihm übergeben wir ein Array aus der $packageDirs Variable
//(diese wird in der global.php näher erläutert) und hängen den einzelnen Einträgen ein "lib/" an.

//Der Requesthandler schaut jetzt in der aufgerufenen URL welche Seite angezeigt werden soll
//und sucht entsprechende Page/Form/Action Klassen im lib Ordner des WCF und der Endanwendung.
RequestHandler::handle(ArrayUtil::appendSuffix($packageDirs, 'lib/'));
?>