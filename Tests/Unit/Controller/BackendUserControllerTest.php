<?php
namespace R3H6\BeuserManager\Tests\Unit\Controller;
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
 * Test case for class R3H6\BeuserManager\Controller\BackendUserController.
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class BackendUserControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \R3H6\BeuserManager\Controller\BackendUserController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('R3H6\\BeuserManager\\Controller\\BackendUserController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllBackendUsersFromRepositoryAndAssignsThemToView()
	{

		$allBackendUsers = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$backendUserRepository = $this->getMock('R3H6\\BeuserManager\\Domain\\Repository\\BackendUserRepository', array('findAll'), array(), '', FALSE);
		$backendUserRepository->expects($this->once())->method('findAll')->will($this->returnValue($allBackendUsers));
		$this->inject($this->subject, 'backendUserRepository', $backendUserRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('backendUsers', $allBackendUsers);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenBackendUserToBackendUserRepository()
	{
		$backendUser = new \R3H6\BeuserManager\Domain\Model\BackendUser();

		$backendUserRepository = $this->getMock('R3H6\\BeuserManager\\Domain\\Repository\\BackendUserRepository', array('add'), array(), '', FALSE);
		$backendUserRepository->expects($this->once())->method('add')->with($backendUser);
		$this->inject($this->subject, 'backendUserRepository', $backendUserRepository);

		$this->subject->createAction($backendUser);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenBackendUserFromBackendUserRepository()
	{
		$backendUser = new \R3H6\BeuserManager\Domain\Model\BackendUser();

		$backendUserRepository = $this->getMock('R3H6\\BeuserManager\\Domain\\Repository\\BackendUserRepository', array('remove'), array(), '', FALSE);
		$backendUserRepository->expects($this->once())->method('remove')->with($backendUser);
		$this->inject($this->subject, 'backendUserRepository', $backendUserRepository);

		$this->subject->deleteAction($backendUser);
	}
}
