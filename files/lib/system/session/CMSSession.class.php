<?php
// cms imports
require_once(CMS_DIR.'lib/data/user/CMSUserSession.class.php');
require_once(CMS_DIR.'lib/data/user/CMSGuestSession.class.php');

// wcf imports
require_once(WCF_DIR.'lib/system/session/CookieSession.class.php');
require_once(WCF_DIR.'lib/data/user/User.class.php');

class CMSSession extends CookieSession {
	protected $userSessionClassName = 'CMSUserSession';
	protected $guestSessionClassName = 'CMSGuestSession';
	protected $styleID = 0;
	
	/**
	 * Initialises the session.
	 */
	public function init() {
		parent::init();
		
		// handle style id
		if ($this->user->userID) $this->styleID = $this->user->styleID;
		if (($styleID = $this->getVar('styleID')) !== null) $this->styleID = $styleID;
	}

	/**
	 * Sets the active style id.
	 * 
	 * @param 	integer		$newStyleID
	 */
	public function setStyleID($newStyleID) {
		$this->styleID = $newStyleID;
		if ($newStyleID > 0) $this->register('styleID', $newStyleID);
		else $this->unregister('styleID');
	}
	
	/**
	 * Returns the active style id.
	 * 
	 * @return	integer
	 */
	public function getStyleID() {
		return $this->styleID;
	}
}
?>