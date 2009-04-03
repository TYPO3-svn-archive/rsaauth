<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

// Add the service
t3lib_extMgm::addService($_EXTKEY,  'auth' /* sv type */,  'tx_rsaauth_sv1' /* sv key */,
	array(
		'title' => 'RSA authentication',
		'description' => 'Authenticates users by using encrypted passwords',

		'subtype' => 'getUserBE,authUserBE',

		'available' => TRUE,
		'priority' => 100,
		'quality' => 100,

		'os' => '',
		'exec' => '',

		'classFile' => t3lib_extMgm::extPath($_EXTKEY) . 'sv1/class.tx_rsaauth_sv1.php',
		'className' => 'tx_rsaauth_sv1',
	)
);

// Add the hook to the login form
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/index.php']['loginFormHook'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/hooks/class.tx_rsaauth_loginformhook.php:tx_rsaauth_loginformhook->loginFormHook';

?>