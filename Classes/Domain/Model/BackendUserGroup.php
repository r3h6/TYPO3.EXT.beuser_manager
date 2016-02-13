<?php
namespace R3H6\BeuserManager\Domain\Model;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use R3H6\BeuserManager\Domain\Repository\BackendUserGroupRepository;
use \R3H6\BeuserManager\Domain\Model\Dto\CrudBackendUserGroupPermission;

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
 * Backend user group
 */
class BackendUserGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * customOptions
     *
     * @var string
     */
    protected $customOptions = '';

    /**
     * Creation date
     *
     * @var \DateTime
     */
    protected $creationDate = null;

    /**
     * Created by
     *
     * @var \R3H6\BeuserManager\Domain\Model\BackendUser
     * @lazy
     */
    protected $creator = null;

    /**
     * Created by
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup>
     * @lazy
     */
    protected $subGroups = null;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the customOptions
     *
     * @return string $customOptions
     */
    public function getCustomOptions()
    {
        return $this->customOptions;
    }

    /**
     * Sets the customOptions
     *
     * @param string $customOptions
     * @return void
     */
    public function setCustomOptions($customOptions)
    {
        $this->customOptions = $customOptions;
    }

    /**
     * [getCrudBackendUserGroups description]
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup>
     */
    public function getCrudBackendUserGroups()
    {
        /** @var R3H6\BeuserManager\Domain\Repository\BackendUserGroupRepository $backendUserGroupRepository */
        $backendUserGroupRepository = GeneralUtility::makeInstance(ObjectManager::class)->get(BackendUserGroupRepository::class);

        /** @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage $objectStorage */
        $objectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();

        // Collect data from subgroups.
        foreach ($this->subGroups as $group) {
            $objectStorage->addAll($group->getCrudBackendUserGroups());
        }

        // Read custom permissions and add selected crud groups to the storage.
        foreach (GeneralUtility::trimExplode(',', $this->customOptions, true) as $optionValue) {
            if (strpos($optionValue, CrudBackendUserGroupPermission::KEY) === 0) {
                $uid = (int) substr($optionValue, strlen(CrudBackendUserGroupPermission::KEY) + 1);
                $group = $backendUserGroupRepository->findByUid($uid);
                if ($group) {
                    $objectStorage->attach($group);
                }
            }
        }
        return $objectStorage;
    }

    /**
     * Returns the creationDate
     *
     * @return \DateTime $creationDate
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Sets the creationDate
     *
     * @param \DateTime $creationDate
     * @return void
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * Returns the creator
     *
     * @return \R3H6\BeuserManager\Domain\Model\BackendUser creator
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Sets the creator
     *
     * @param \R3H6\BeuserManager\Domain\Model\BackendUser $creator
     * @return void
     */
    public function setCreator(\R3H6\BeuserManager\Domain\Model\BackendUser $creator)
    {
        $this->creator = $creator;
    }

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->subGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a BackendUserGroup
     *
     * @param \R3H6\BeuserManager\Domain\Model\BackendUserGroup $subGroup
     * @return void
     */
    public function addSubGroup(\R3H6\BeuserManager\Domain\Model\BackendUserGroup $subGroup)
    {
        $this->subGroups->attach($subGroup);
    }

    /**
     * Removes a BackendUserGroup
     *
     * @param \R3H6\BeuserManager\Domain\Model\BackendUserGroup $subGroupToRemove The BackendUserGroup to be removed
     * @return void
     */
    public function removeSubGroup(\R3H6\BeuserManager\Domain\Model\BackendUserGroup $subGroupToRemove)
    {
        $this->subGroups->detach($subGroupToRemove);
    }

    /**
     * Returns the subGroups
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup> $subGroups
     */
    public function getSubGroups()
    {
        return $this->subGroups;
    }

    /**
     * Sets the subGroups
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup> $subGroups
     * @return void
     */
    public function setSubGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $subGroups)
    {
        $this->subGroups = $subGroups;
    }

}