<?php
/*
	Siehe index.php im Hauptordner
*/

require_once('./global.php');
RequestHandler::handle(ArrayUtil::appendSuffix($packageDirs, 'lib/acp/'));
?>