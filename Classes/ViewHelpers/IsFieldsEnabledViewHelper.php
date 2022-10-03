<?php

namespace W4Services\W4Communitynet\ViewHelpers;

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
 
class IsFieldsEnabledViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    private $fieldmap = [
        'name' =>  0b00000001,
        'birthday' =>  0b00000010,
        'address' =>  0b00000100,
        'building' =>  0b00001000,
        'room' =>  0b00010000,
        'phone' =>  0b00100000,
        'fax' =>  0b01000000,
        'mobile' =>  0b10000000,
        'www' =>  0b0000000100000000,
        'email' =>  0b0000001000000000,
        'socialmedia' =>  0b0000010000000000,
        'company' =>  0b0000100000000000,
        'position' =>  0b0001000000000000,
        'city' =>  0b0010000000000000,
        'zip' =>  0b0100000000000000,
        'region' =>  0b1000000000000000,
        'country' =>  0b000000010000000000000000,
        'image' =>  0b000000100000000000000000,
        'description' =>  0b000001000000000000000000,
    ];

    public function initializeArguments()
    {
        $this->registerArgument('field', 'string', 'is field enabled', false);
        $this->registerArgument('value', 'string', 'is field enabled', false);
    }
 
    /**
     * @return mixed
     */
    public function render()
    {
        $field = $this->arguments['field']; 
        $value = $this->arguments['value'];  
        return $this->fieldmap[$field] & (int) $value;
    }
}
