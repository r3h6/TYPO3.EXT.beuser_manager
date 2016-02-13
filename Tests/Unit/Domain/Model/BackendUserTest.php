<?php

namespace R3H6\BeuserManager\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 R3 H6 <r3h6@outlook.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \R3H6\BeuserManager\Domain\Model\BackendUser.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class BackendUserTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \R3H6\BeuserManager\Domain\Model\BackendUser
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \R3H6\BeuserManager\Domain\Model\BackendUser();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getUsernameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUsername()
		);
	}

	/**
	 * @test
	 */
	public function setUsernameForStringSetsUsername()
	{
		$this->subject->setUsername('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'username',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPasswordReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPassword()
		);
	}

	/**
	 * @test
	 */
	public function setPasswordForStringSetsPassword()
	{
		$this->subject->setPassword('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'password',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRealNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRealName()
		);
	}

	/**
	 * @test
	 */
	public function setRealNameForStringSetsRealName()
	{
		$this->subject->setRealName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'realName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail()
	{
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAdminReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getAdmin()
		);
	}

	/**
	 * @test
	 */
	public function setAdminForBoolSetsAdmin()
	{
		$this->subject->setAdmin(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'admin',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCreationDateReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCreationDate()
		);
	}

	/**
	 * @test
	 */
	public function setCreationDateForDateTimeSetsCreationDate()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setCreationDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'creationDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStartTimeReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getStartTime()
		);
	}

	/**
	 * @test
	 */
	public function setStartTimeForDateTimeSetsStartTime()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setStartTime($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'startTime',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEndTimeReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getEndTime()
		);
	}

	/**
	 * @test
	 */
	public function setEndTimeForDateTimeSetsEndTime()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setEndTime($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'endTime',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDisableReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getDisable()
		);
	}

	/**
	 * @test
	 */
	public function setDisableForBoolSetsDisable()
	{
		$this->subject->setDisable(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'disable',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGroupsReturnsInitialValueForBackendUserGroup()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getGroups()
		);
	}

	/**
	 * @test
	 */
	public function setGroupsForObjectStorageContainingBackendUserGroupSetsGroups()
	{
		$group = new \R3H6\BeuserManager\Domain\Model\BackendUserGroup();
		$objectStorageHoldingExactlyOneGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneGroups->attach($group);
		$this->subject->setGroups($objectStorageHoldingExactlyOneGroups);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneGroups,
			'groups',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addGroupToObjectStorageHoldingGroups()
	{
		$group = new \R3H6\BeuserManager\Domain\Model\BackendUserGroup();
		$groupsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$groupsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($group));
		$this->inject($this->subject, 'groups', $groupsObjectStorageMock);

		$this->subject->addGroup($group);
	}

	/**
	 * @test
	 */
	public function removeGroupFromObjectStorageHoldingGroups()
	{
		$group = new \R3H6\BeuserManager\Domain\Model\BackendUserGroup();
		$groupsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$groupsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($group));
		$this->inject($this->subject, 'groups', $groupsObjectStorageMock);

		$this->subject->removeGroup($group);

	}

	/**
	 * @test
	 */
	public function getCreatorReturnsInitialValueForBackendUser()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCreator()
		);
	}

	/**
	 * @test
	 */
	public function setCreatorForBackendUserSetsCreator()
	{
		$creatorFixture = new \R3H6\BeuserManager\Domain\Model\BackendUser();
		$this->subject->setCreator($creatorFixture);

		$this->assertAttributeEquals(
			$creatorFixture,
			'creator',
			$this->subject
		);
	}
}
