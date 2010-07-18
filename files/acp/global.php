<?php
define('RELATIVE_CMS_DIR', '../');

$packageDirs = array();
require_once(dirname(dirname(__FILE__)).'/config.inc.php');

require_once(RELATIVE_WCF_DIR.'global.php');
if (!count($packageDirs)) $packageDirs[] = CMS_DIR;
$packageDirs[] = WCF_DIR;

require_once(CMS_DIR.'lib/system/CMSACP.class.php');
new CMSACP();
?>