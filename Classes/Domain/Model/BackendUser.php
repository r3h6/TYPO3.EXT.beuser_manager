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
    protected $usergroup = null;

    /**
     * Created by
     *
     * @var \R3H6\BeuserManager\Domain\Model\BackendUser
     * @lazy
     */
    protected $createdBy = null;

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
        $this->usergroup = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Adds a BackendUserGroup
     *
     * @param \R3H6\BeuserManager\Domain\Model\BackendUserGroup $usergroup
     * @return void
     */
    public function addUsergroup(\R3H6\BeuserManager\Domain\Model\BackendUserGroup $usergroup)
    {
        $this->usergroup->attach($usergroup);
    }

    /**
     * Removes a BackendUserGroup
     *
     * @param \R3H6\BeuserManager\Domain\Model\BackendUserGroup $usergroupToRemove The BackendUserGroup to be removed
     * @return void
     */
    public function removeUsergroup(\R3H6\BeuserManager\Domain\Model\BackendUserGroup $usergroupToRemove)
    {
        $this->usergroup->detach($usergroupToRemove);
    }

    /**
     * Returns the usergroup
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup> $usergroup
     */
    public function getUsergroup()
    {
        return $this->usergroup;
    }

    /**
     * Sets the usergroup
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\BeuserManager\Domain\Model\BackendUserGroup> $usergroup
     * @return void
     */
    public function setUsergroup(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $usergroup)
    {
        $this->usergroup = $usergroup;
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