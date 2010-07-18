<?php
//initialize package array
$packageDirs = array();
//include config
require_once(dirname(__FILE__).'/config.inc.php');

//include WCF
require_once(RELATIVE_WCF_DIR.'global.php');

if(!count($packageDirs)) $packageDirs[] = CMS_DIR;
$packageDirs[] = WCF_DIR;

//starting test application
require_once(CMS_DIR.'lib/system/CMSCore.class.php');
new CMSCore();
?>