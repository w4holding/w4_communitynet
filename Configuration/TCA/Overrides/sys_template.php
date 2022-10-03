<?php

defined('TYPO3') or die();

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

( function( $tca) {

    $languageFilePrefix = 'LLL:EXT:w4_communitynet/Resources/Private/Language/locallang_be.xlf:sys_template.';
    $imgPath = 'EXT:w4_communitynet/Resources/Public/Images/';

    $tempColumns = [
        'tx_w4communitynet_layout' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_layout',
            'displayCond' => 'FIELD:root:REQ:true',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
                // To add items via tsconfig
                'size' => 1,
                'maxitems' => 1,
            ]
        ],
        'tx_w4communitynet_layoutcolor' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_layoutcolor',
            'displayCond' => 'FIELD:root:REQ:true',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
                // To add items via tsconfig
                'size' => 1,
                'maxitems' => 1,
            ]
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns(
        'sys_template',
        $tempColumns
    );

    ExtensionManagementUtility::addToAllTCAtypes(
        'sys_template',
        '--div--;' . $languageFilePrefix . 'tx_w4communitynet_layout.selector,
        tx_w4communitynet_layout,
        tx_w4communitynet_layoutcolor'
    );

    $GLOBALS['TCA']['sys_template']['columns']['root']['onChange'] = 'reload';

})( $GLOBALS['TCA']['sys_template']);
