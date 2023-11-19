<?php

defined('TYPO3') or die();

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

( function() {

    $languageFilePrefix = 'LLL:EXT:w4_communitynet/Resources/Private/Language/locallang_be.xlf:';

    $GLOBALS['TCA']['tt_address']['types'][0]['columnsOverrides'] = [
        'description' => [
            'label' => $languageFilePrefix  . 'tt_address.description'
        ],
        'company' => [
            'label' => $languageFilePrefix  . 'tt_address.party'
        ],
        'building' => [
            'label' => $languageFilePrefix  . 'tt_address.additional_information',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default'
            ],
        ],
    ];    

    $GLOBALS['TCA']['tt_address']['types'][0]['showitem'] = '
    --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.name;name,
    image, description,
    --palette--;;building,
    --div--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_tab.address,
        --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.address;address,
        --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.coordinates;coordinates,
    --div--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_tab.contact,
        --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.contact;contact,
        --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.organization;organization,
        --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.social;social,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
        --palette--;;language,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
        --palette--;;paletteHidden,
        --palette--;;paletteAccess,
    --div--;' . 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category, categories
    ';

})();
