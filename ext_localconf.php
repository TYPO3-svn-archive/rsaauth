<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addService($_EXTKEY,  'auth' /* sv type */,  'tx_rsaauth_sv1' /* sv key */,
		array(

			'title' => 'RSA authentication',
			'description' => 'Authenticates users by using encrypted passwords',

			'subtype' => 'getUserFE,authUserFE,getUserBE,authUserBE',

			'available' => TRUE,
			'priority' => 100,
			'quality' => 100,

			'os' => '',
			'exec' => 'openssh',

			'classFile' => t3lib_extMgm::extPath($_EXTKEY).'sv1/class.tx_rsaauth_sv1.php',
			'className' => 'tx_rsaauth_sv1',
		)
	);
?>