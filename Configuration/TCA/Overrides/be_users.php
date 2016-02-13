<?php

$GLOBALS['TCA']['be_users']['ctrl']['adminOnly'] = 0;
$GLOBALS['TCA']['be_users']['ctrl']['security'] = array(
    'ignoreWebMountRestriction' => 1,
    'ignoreRootLevelRestriction' => 1,
);
