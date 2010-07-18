<?php
// wbb imports
require_once(CMS_DIR.'lib/system/session/CMSSession.class.php');
require_once(CMS_DIR.'lib/data/user/CMSUserSession.class.php');
require_once(CMS_DIR.'lib/data/user/CMSGuestSession.class.php');

// wcf imports
require_once(WCF_DIR.'lib/system/session/CookieSessionFactory.class.php');

class CMSSessionFactory extends CookieSessionFactory {
	protected $guestClassName = 'CMSGuestSession';
	protected $userClassName = 'CMSUserSession';
	protected $sessionClassName = 'CMSSession';
}
?>