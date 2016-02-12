<?php

if (!isset($GLOBALS['TCA']['be_groups']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['be_groups']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['be_groups']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['be_groups']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_beusermanager_be_groups = array();
	$tempColumnstx_beusermanager_be_groups[$GLOBALS['TCA']['be_groups']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('BackendUserGroup','Tx_BeuserManager_BackendUserGroup')
			),
			'default' => 'Tx_BeuserManager_BackendUserGroup',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('be_groups', $tempColumnstx_beusermanager_be_groups, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'be_groups',
	$GLOBALS['TCA']['be_groups']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['be_groups']['ctrl']['label']
);

$tmp_beuser_manager_columns = array(

	'title' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backendusergroup.title',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim,required'
		),
	),
	'description' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backendusergroup.description',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim'
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('be_groups',$tmp_beuser_manager_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['be_groups']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['be_groups']['types']['Tx_BeuserManager_BackendUserGroup']['showitem'] = $GLOBALS['TCA']['be_groups']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['be_groups']['types'])) {
	// use first entry in types array
	$be_groups_type_definition = reset($GLOBALS['TCA']['be_groups']['types']);
	$GLOBALS['TCA']['be_groups']['types']['Tx_BeuserManager_BackendUserGroup']['showitem'] = $be_groups_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['be_groups']['types']['Tx_BeuserManager_BackendUserGroup']['showitem'] = '';
}
$GLOBALS['TCA']['be_groups']['types']['Tx_BeuserManager_BackendUserGroup']['showitem'] .= ',--div--;LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:tx_beusermanager_domain_model_backendusergroup,';
$GLOBALS['TCA']['be_groups']['types']['Tx_BeuserManager_BackendUserGroup']['showitem'] .= 'title, description';

$GLOBALS['TCA']['be_groups']['columns'][$GLOBALS['TCA']['be_groups']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:beuser_manager/Resources/Private/Language/locallang_db.xlf:be_groups.tx_extbase_type.Tx_BeuserManager_BackendUserGroup','Tx_BeuserManager_BackendUserGroup');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);