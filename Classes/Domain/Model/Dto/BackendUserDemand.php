<?php
namespace R3H6\BeuserManager\Domain\Model\Dto;

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
 * Backend user demand
 */
class BackendUserDemand extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Search term
     *
     * @var string
     */
    protected $search;

    /**
     * Get search
     *
     * @return  string  Search term
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Set search
     *
     * @param   string $search  Search term
     */
    public function setSearch($search)
    {
        $this->search = $search;
    }
}
