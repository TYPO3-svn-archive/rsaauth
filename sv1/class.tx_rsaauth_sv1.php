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
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_t3lib . 'class.t3lib_svbase.php');

// Include backends

/**
 * Service "RSA authentication" for the "rsaauth" extension.
 *
 * @author	Dmitry Dulepov <dmitry@typo3.org>
 * @package	TYPO3
 * @subpackage	tx_rsaauth
 */
class tx_rsaauth_sv1 extends t3lib_svbase {

	/**
	 * Standard prefix id for the service
	 *
	 * @var	string
	 */
	public	$prefixId = 'tx_rsaauth_sv1';		// Same as class name

	/**
	 * Standard reated path for the service
	 *
	 * @var	string
	 */
	public	$scriptRelPath = 'sv1/class.tx_rsaauth_sv1.php';	// Path to this script relative to the extension dir.

	/**
	 * Standard extension key for the service
	 *
	 * @var	string
	 */
	public	$extKey = 'rsaauth';	// The extension key.

	/**
	 * An RSA backend.
	 *
	 * @var	tx_rsaauth_abstract_backend
	 */
	protected	$backend;

	/**
	 * Initializes the service.
	 *
	 * @return	boolean
	 */
	public function init()	{
		$available = parent::init();
		if ($available) {
			$this->backend = $this->getBackend();
			if (!is_null($this->backend)) {
				$available = true;
			}
		}

		return $available;
	}

	/**
	 * Obtains the RSA backend.
	 *
	 * @return	tx_rsa_abstract_backend	An RSA backend or null
	 */
	protected function getBackend() {
		$availableBackends = array(
			'tx_rsaauth_php_backend',
			'tx_rsaauth_cmdline_backend'
		);
		foreach ($availableBackends as $backendClass) {
			t3lib_div::requireOnce(t3lib_extMgm::extPath($this->extKey, 'backends/class.' . $backendClass . '.php'));

			$backend = t3lib_div::makeInstance($backendClass);
			/* @var $backend tx_rsaauth_abstract_backend */
			if ($backend->isAvailable()) {
				return $backend;
			}
			// Attempt to force destruction of the object
			unset($backend);
		}

		return null;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rsaauth/sv1/class.tx_rsaauth_sv1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rsaauth/sv1/class.tx_rsaauth_sv1.php']);
}

?>