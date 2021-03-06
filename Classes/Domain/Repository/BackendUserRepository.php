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

    /**
     * DataHandler (TCE)
     *
     * @var TYPO3\CMS\Core\DataHandling\DataHandler
     * @inject
     */
    protected $dataHandler = null;

    public function initializeObject()
    {
        /** @var $querySettings \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings */
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setIgnoreEnableFields(true);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function getBackendUser()
    {
        return $this->findByIdentifier($GLOBALS['BE_USER']->user['uid']);
    }

    /**
     * @param \R3H6\BeuserManager\Domain\Model\Dto\BackendUserDemand $demand
     */
    public function findDemanded(\R3H6\BeuserManager\Domain\Model\Dto\BackendUserDemand $demand)
    {
        /** @var TYPO3\CMS\Extbase\Persistence\Generic\Query $query */
        $query = $this->createQuery();
        $constraints = array();
        $constraints[] = $query->logicalNot($query->in('username', static::$systemUsers));
        if (!$this->getBackendUser()->isAdmin()) {
            $constraints[] = $query->equals('admin', false);
            $constraints[] = $query->in('groups', $this->getBackendUser()->getCrudBackendUserGroups());
        }
        $query->matching($query->logicalAnd($constraints));
        return $query->execute();
    }
    /**
     * Replaces an existing object with the same identifier by the given object
     *
     * @param object $modifiedObject The modified object
     * @throws Exception\UnknownObjectException
     * @throws Exception\IllegalObjectTypeException
     * @return void
     */
    public function update($modifiedObject)
    {
        if (!$modifiedObject instanceof $this->objectType) {
            throw new \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException('The modified object given to update() was not of the type (' . $this->objectType . ') this repository manages.', 1249479625);
        }

        $this->dataHandler->stripslashes_values = 0;
        $this->dataHandler->start($modifiedObject->toDataArray(), []);
        $this->dataHandler->process_datamap();
    }
}
