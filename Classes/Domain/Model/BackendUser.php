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

/**
 * Backend user
 */
class BackendUser extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Username
     *
     * @var string
     * @validate NotEmpty
     */
    protected $username = '';

    /**
     * Password
     *
     * @var string
     * @validate NotEmpty
     */
    protected $password = '';

    /**
     * Name
     *
     * @var string
     */
    protected $realName = '';

    /**
     * E-mail
     *
     * @var string
     */
    protected $email = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Admin
     *
     * @var bool
     */
    protected $admin = false;

    /**
     * Creation date
     *
     * @var \DateTime
     */
    protected $creationDate = null;

    /**
     * Usergroup
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup>
     */
    protected $groups = null;

    /**
     * Created by
     *
     * @var \R3H6\BeuserManager\Domain\Model\BackendUser
     * @lazy
     */
    protected $creator = null;

    /**
     * startTime
     *
     * @var \DateTime
     */
    protected $startTime = null;

    /**
     * endTime
     *
     * @var \DateTime
     */
    protected $endTime = null;

    /**
     * hidden
     *
     * @var bool
     */
    protected $hidden = false;

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
        $this->groups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the username
     *
     * @return string $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets the username
     *
     * @param string $username
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Returns the password
     *
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the password
     *
     * @param string $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Returns the realName
     *
     * @return string $realName
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * Sets the realName
     *
     * @param string $realName
     * @return void
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * Returns the admin
     *
     * @return bool $admin
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Sets the admin
     *
     * @param bool $admin
     * @return void
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    /**
     * Returns the boolean state of admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin;
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
     * [getCrudBackendUserGroups description]
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup>
     */
    public function getCrudBackendUserGroups()
    {
        /** @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage $objectStorage */
        $objectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        foreach ($this->groups as $group) {
            $objectStorage->addAll($group->getCrudBackendUserGroups());
        }
        return $objectStorage;
    }

    /**
     * Adds a BackendUserGroup
     *
     * @param \R3H6\BeuserManager\Domain\Model\BackendUserGroup $group
     * @return void
     */
    public function addGroup(\R3H6\BeuserManager\Domain\Model\BackendUserGroup $group)
    {
        $this->groups->attach($groups);
    }

    /**
     * Removes a BackendUserGroup
     *
     * @param \R3H6\BeuserManager\Domain\Model\BackendUserGroup $groupToRemove The BackendUserGroup to be removed
     * @return void
     */
    public function removeGroup(\R3H6\BeuserManager\Domain\Model\BackendUserGroup $groupToRemove)
    {
        $this->groups->detach($groupToRemove);
    }

    /**
     * Returns the groups
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup> groups
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Sets the groups
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup> $groups
     * @return void
     */
    public function setGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groups)
    {
        $this->groups = $groups;
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
     * Returns the startTime
     *
     * @return \DateTime $startTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Sets the startTime
     *
     * @param \DateTime $startTime
     * @return void
     */
    public function setStartTime(\DateTime $startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * Returns the endTime
     *
     * @return \DateTime $endTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Sets the endTime
     *
     * @param \DateTime $endTime
     * @return void
     */
    public function setEndTime(\DateTime $endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * Returns the hidden
     *
     * @return bool $hidden
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Sets the hidden
     *
     * @param bool $hidden
     * @return void
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * Returns the boolean state of hidden
     *
     * @return bool
     */
    public function isHidden()
    {
        return $this->hidden;
    }

    public function toDataArray()
    {
        $properties = [];
        foreach ($this->_getProperties() as $propertyName) {
            if ($this->_isDirty($propertyName)) {
                $properties[$propertyName] = $this->_getProperty($propertyName);
            }
        }

        $uid = $this->_isNew() ? uniqid('NEW_') : $this->uid;

        return [
            'be_users' => [
                $uid => $properties,
            ],
        ];
    }
}