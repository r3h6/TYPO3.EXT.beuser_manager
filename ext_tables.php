<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'R3H6.' . $_EXTKEY,
		'user',	 // Make module a submodule of 'user'
		'manager',	// Submodule key
		'',						// Position
		array(
			'BackendUser' => 'list, new, create, delete, enable, disable',
			
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_manager.xlf',
		)
	);


	$GLOBALS['TYPO3_CONF_VARS']['BE']['customPermOptions'][\R3H6\BeuserManager\Domain\Model\Dto\CrudBackendUserGroupPermission::KEY] = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\R3H6\BeuserManager\Domain\Model\Dto\CrudBackendUserGroupPermission::class);

}

