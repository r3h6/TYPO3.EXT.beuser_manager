<?php
namespace R3H6\BeuserManager\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 R3 H6 <r3h6@outlook.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * The repository for BackendUsers
 */
class BackendUserRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    protected static $systemUsers = array('_cli_lowlevel', '_cli_scheduler');
    
    public function getBackendUser()
    {
        return $this->findByIdentifier($GLOBALS['BE_USER']->user['uid']);
    }
    
    /**
     * @param \R3H6\BeuserManager\Domain\Model\Dto\BackendUserDemand $demand
     */
    public function findDemanded(\R3H6\BeuserManager\Domain\Model\Dto\BackendUserDemand $demand)
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->getBackendUser()->getCrudBackendUserGroups());
        return;
        /** @var TYPO3\CMS\Extbase\Persistence\Generic\Query $query */
        $query = $this->createQuery();
        $constraints = array();
        $constraints[] = $query->logicalNot($query->in('username', static::$systemUsers));
        if (!$this->getBackendUser()->isAdmin()) {
            $constraints[] = $query->equals('admin', false);
        }
        $query->matching($query->logicalAnd($constraints));
        // custom_options beuser_manager:2,beuser_manager:3,beuser_manager:1
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($grantedGroups);
        return $query->execute();
    }

}