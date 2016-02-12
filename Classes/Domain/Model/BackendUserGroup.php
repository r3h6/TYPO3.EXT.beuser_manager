<?php
namespace R3H6\BeuserManager\Domain\Model;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Backend user group
 */
class BackendUserGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    const ALLOWED_BACKEND_GROUPS_PERMISSION = 'tx_beusermanager_allowedbackendgroups';

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
    protected $createdBy = null;

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

    public function getAllowedBackendGroups()
    {
        $customOptions = GeneralUtility::trimExplode(',', $this->customOptions, true);
        $allowedBackendGroups = [];
        foreach ($customOptions as $optionValue) {
            if (strpos($optionValue, self::ALLOWED_BACKEND_GROUPS_PERMISSION) === 0) {
                $allowedBackendGroups[] = (int) substr($optionValue, strlen(self::ALLOWED_BACKEND_GROUPS_PERMISSION) + 1);
            }
        }
        return $allowedBackendGroups;
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
     * Returns the createdBy
     *
     * @return \R3H6\BeuserManager\Domain\Model\BackendUser $createdBy
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the createdBy
     *
     * @param \R3H6\BeuserManager\Domain\Model\BackendUser $createdBy
     * @return void
     */
    public function setCreatedBy(\R3H6\BeuserManager\Domain\Model\BackendUser $createdBy)
    {
        $this->createdBy = $createdBy;
    }

}