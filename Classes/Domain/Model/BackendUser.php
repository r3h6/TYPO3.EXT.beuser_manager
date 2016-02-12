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
     * Usergroup
     *
     * @var \R3H6\BeuserManager\Domain\Model\BackendUserGroup
     */
    protected $usergroup = null;
    
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
     * Returns the usergroup
     *
     * @return \R3H6\BeuserManager\Domain\Model\BackendUserGroup $usergroup
     */
    public function getUsergroup()
    {
        return $this->usergroup;
    }
    
    /**
     * Sets the usergroup
     *
     * @param \R3H6\BeuserManager\Domain\Model\BackendUserGroup $usergroup
     * @return void
     */
    public function setUsergroup(\R3H6\BeuserManager\Domain\Model\BackendUserGroup $usergroup)
    {
        $this->usergroup = $usergroup;
    }

}