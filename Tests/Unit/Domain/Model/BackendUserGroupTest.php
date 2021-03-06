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
 * Test case for class \R3H6\BeuserManager\Domain\Model\BackendUserGroup.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class BackendUserGroupTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \R3H6\BeuserManager\Domain\Model\BackendUserGroup
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \R3H6\BeuserManager\Domain\Model\BackendUserGroup();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
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
	public function getCustomOptionsReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCustomOptions()
		);
	}

	/**
	 * @test
	 */
	public function setCustomOptionsForStringSetsCustomOptions()
	{
		$this->subject->setCustomOptions('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'customOptions',
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

	/**
	 * @test
	 */
	public function getSubGroupsReturnsInitialValueForBackendUserGroup()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getSubGroups()
		);
	}

	/**
	 * @test
	 */
	public function setSubGroupsForObjectStorageContainingBackendUserGroupSetsSubGroups()
	{
		$subGroup = new \R3H6\BeuserManager\Domain\Model\BackendUserGroup();
		$objectStorageHoldingExactlyOneSubGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneSubGroups->attach($subGroup);
		$this->subject->setSubGroups($objectStorageHoldingExactlyOneSubGroups);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneSubGroups,
			'subGroups',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addSubGroupToObjectStorageHoldingSubGroups()
	{
		$subGroup = new \R3H6\BeuserManager\Domain\Model\BackendUserGroup();
		$subGroupsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$subGroupsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($subGroup));
		$this->inject($this->subject, 'subGroups', $subGroupsObjectStorageMock);

		$this->subject->addSubGroup($subGroup);
	}

	/**
	 * @test
	 */
	public function removeSubGroupFromObjectStorageHoldingSubGroups()
	{
		$subGroup = new \R3H6\BeuserManager\Domain\Model\BackendUserGroup();
		$subGroupsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$subGroupsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($subGroup));
		$this->inject($this->subject, 'subGroups', $subGroupsObjectStorageMock);

		$this->subject->removeSubGroup($subGroup);

	}
}
