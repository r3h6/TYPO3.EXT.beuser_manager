<?php

if (!isset($GLOBALS['TCA']['be_users']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['be_users']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['be_users']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['be_users']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_beusermanager_be_users = array();
	$tempColumnstx_beusermanager_be_users[$GLOBALS['TCA']['be_users']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('BackendUser','Tx_BeuserManager_BackendUser')
			),
			'default' => 'Tx_BeuserManager_BackendUser',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('be_users', $tempColumnstx_beusermanager_be_users, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'be_users',
	$GLOBALS['TCA']['be_users']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['be_users']['ctrl']['label']
);

$tmp_beuser_manager_columns = array(

	'username' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backenduser.username',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim,required'
		),
	),
	'password' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backenduser.password',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'nospace,password,required'
		)
	),
	'real_name' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backenduser.real_name',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'email' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backenduser.email',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'description' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backenduser.description',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim'
		)
	),
	'usergroup' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backenduser.usergroup',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'be_groups',
			'minitems' => 0,
			'maxitems' => 1,
			'appearance' => array(
				'collapseAll' => 0,
				'levelLinksPosition' => 'top',
				'showSynchronizationLink' => 1,
				'showPossibleLocalizationRecords' => 1,
				'showAllLocalizationLink' => 1
			),
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('be_users',$tmp_beuser_manager_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['be_users']['types']['1']['showitem'])) {
	$GLOBALS['TCA']['be_users']['types']['Tx_BeuserManager_BackendUser']['showitem'] = $GLOBALS['TCA']['be_users']['types']['1']['showitem'];
} elseif(is_array($GLOBALS['TCA']['be_users']['types'])) {
	// use first entry in types array
	$be_users_type_definition = reset($GLOBALS['TCA']['be_users']['types']);
	$GLOBALS['TCA']['be_users']['types']['Tx_BeuserManager_BackendUser']['showitem'] = $be_users_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['be_users']['types']['Tx_BeuserManager_BackendUser']['showitem'] = '';
}
$GLOBALS['TCA']['be_users']['types']['Tx_BeuserManager_BackendUser']['showitem'] .= ',--div--;LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backenduser,';
$GLOBALS['TCA']['be_users']['types']['Tx_BeuserManager_BackendUser']['showitem'] .= 'username, password, real_name, email, description, usergroup';

$GLOBALS['TCA']['be_users']['columns'][$GLOBALS['TCA']['be_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:be_users.tx_extbase_type.Tx_BeuserManager_BackendUser','Tx_BeuserManager_BackendUser');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);