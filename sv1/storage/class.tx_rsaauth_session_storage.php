<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Dmitry Dulepov <dmitry@typo3.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * $Id$
 */

require_once(t3lib_extMgm::extPath('rsaauth', 'sv1/storage/class.tx_rsaauth_abstract_storage.php'));

/**
 * This class contains a session-based storage for private keys
 *
 * @author	Dmitry Dulepov <dmitry@typo3.org>
 * @package	TYPO3
 * @subpackage	tx_rsaauth
 */
class tx_rsaauth_session_storage extends tx_rsaauth_abstract_storage {

	/**
	 * Creates an instance of this class. It checks and initializes PHP
	 * sessions if necessary.
	 *
	 * @return	void
	 */
	public function __construct() {
		if (!isset($_SESSION) || !is_array($_SESSION)) {
			session_start();
		}
	}

	/**
	 * Obtains key from the session
	 *
	 * @return string	The key or null
	 * @see tx_rsaauth_abstract_storage::get()
	 */
	public function get() {
		return (isset($_SESSION['tx_rsaauth_key']) ? $_SESSION['tx_rsaauth_key'] : null);
	}

	/**
	 * Puts key to the session
	 *
	 * @param string	$key	The key
	 * @see tx_rsaauth_abstract_storage::put()
	 */
	public function put($key) {
		$_SESSION['tx_rsaauth_key'] = $key;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rsaauth/storage/class.tx_rsaauth_session_storage.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rsaauth/storage/class.tx_rsaauth_session_storage.php']);
}

?>