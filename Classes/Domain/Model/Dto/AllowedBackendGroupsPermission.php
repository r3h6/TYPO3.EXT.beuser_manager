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
 * Allowed backend groups permission
 */
class AllowedBackendGroupsPermission implements \ArrayAccess
{
    protected static $locallang = 'EXT:beuser_manager/Resources/Private/Language/locallang_be.xlf';
    protected $array = null;

    protected function initialize()
    {
        $this->array = [];
        $beGroups = $this->getDatabasConnection()->exec_SELECTgetRows('uid,title,description', 'be_groups', 'deleted=0 AND hidden=0', '', 'title');
        if (!empty($beGroups)) {
            $this->array['header'] = 'LLL:' . static::$locallang . ':manager_modul_permission.header';
            $this->array['items'] = [];
            foreach ($beGroups as $beGroup) {
                $this->array['items'][$beGroup['uid']] = [
                    $beGroup['title'],
                    'EXT:core/Resources/Public/Icons/T3Icons/status/status-user-group-backend.svg',
                    $beGroup['description'],
                ];
            }
        }
    }

    /**
     * @return TYPO3\CMS\Core\Database\DatabaseConnection
     */
    protected function getDatabasConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }

    // {{{ ArrayAccess
    final public function offsetSet($offset, $value)
    {
        if ($this->array === null) {
            $this->initialize();
        }
        if (is_null($offset)) {
            $this->array[] = $value;
        } else {
            $this->array[$offset] = $value;
        }
    }
    final public function offsetExists($offset)
    {
        if ($this->array === null) {
            $this->initialize();
        }
        return isset($this->array[$offset]);
    }
    final public function offsetUnset($offset)
    {
        if ($this->array === null) {
            $this->initialize();
        }
        unset($this->array[$offset]);
    }
    final public function offsetGet($offset)
    {
        if ($this->array === null) {
            $this->initialize();
        }
        return isset($this->array[$offset]) ? $this->array[$offset] : null;
    }
    // }}}
}
