<?php

defined('TYPO3') or die();

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

( function( $tca) {

    $languageFilePrefix = 'LLL:EXT:w4_communitynet/Resources/Private/Language/locallang_be.xlf:pages.';

    $tempColumns = [
        'tx_w4communitynet_menucolumns' => [
            'l10n_mode' => 'amount',
            'label' => $languageFilePrefix . 'tx_w4communitynet_menucolumns',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['1', '1'],
                    ['2', '2'],
                    ['3', '3'],
                    ['4', '4'],
                ],
                'size' => 1,
                'maxitems' => 1,
            ]
        ],
        'tx_w4communitynet_logo' => [
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'label' => $languageFilePrefix . 'tx_w4communitynet_logo',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'tx_w4communitynet_logo',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'minitems' => 0,
                    'maxitems' => 1,
                ],
                'svg,png'
            ),
        ],
        'tx_w4communitynet_logoname' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_logoname',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'input',
                'eval' => 'trim'
            ]
        ],
        'tx_w4communitynet_logosubname' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_logosubname',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'input',
                'eval' => 'trim'
            ]
        ],
        'tx_w4communitynet_facebook' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_facebook',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'input',
                'eval' => 'trim'
            ]
        ],
        'tx_w4communitynet_twitter' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_twitter',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'input',
                'eval' => 'trim'
            ]
        ],
        'tx_w4communitynet_instagram' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_instagram',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'input',
                'eval' => 'trim'
            ]
        ],
        'tx_w4communitynet_quicklinks' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_quicklinks',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => 5,
                'maxitems' => 10
            ],
        ],
        'tx_w4communitynet_search' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_search',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => 1,
                'maxitems' => 1,
                'eval' => 'int',
                'default' => 0,
            ],
        ],
        'tx_w4communitynet_footerlinks' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_footerlinks',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => 5,
                'maxitems' => 10
            ],
        ],
        'tx_w4communitynet_icon_class' => [
            'label' => 'Auswahl Toplink-Icon',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [ '-', 0],
                    [ 'Haus', 'home-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/building.svg'],
                    [ 'Fragezeichen/Häufige Fragen', 'questionmark-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/question-circle.svg'],
                    [ 'Links', 'pointer-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/hand-pointer.svg'],
                    [ 'Karte Umrisse', 'map-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/map.svg'],
                    [ 'Karte ausgefüllt', 'map-dark-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/map.svg'],
                    [ 'Telefon/ Kontakt', 'phone-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/phone.svg'],
                    [ 'Notfälle', 'medkit-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/briefcase-medical.svg'],
                    [ 'Login', 'user-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/user.svg'],
                    [ 'Webcam', 'webcam-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/camera.svg'],
                    [ 'Kalender', 'calendar-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/calendar-alt.svg'],
                    [ 'E-Umzug', 'eumzug-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/share-square.svg'],
                    [ '360 Grad', 'grad360-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/circle.svg'],
                    [ 'GeoP', 'geop-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/globe.svg'],
                    [ 'Hallo Aargau', 'aargau-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/aargau.svg'],
                    [ 'SBB', 'sbb-icon'],
                    [ 'Facebook', 'facebook-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/brands/facebook.svg'],
                    [ 'FlashCable', 'flashcable-icon'],
                    [ 'Ennetbadener Post', 'ennetbaden-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/mail-bulk.svg'],
                    [ 'Warenkorb', 'cart-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/cart-plus.svg'],
                    [ 'Verwaltung', 'university-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/university.svg'],
                    [ 'Agenda', 'list-alt-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/clipboard-list.svg'],
                    [ 'Formular', 'wpforms-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/brands/wpforms.svg'],
                    [ 'Newspaper', 'newspaper-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/newspaper.svg'],
                    [ 'Fundbüro', 'laf-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/city.svg'],
                    [ 'Jobs', 'job-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/desktop.svg'],
                    [ 'Entsorgung', 'entsorgung', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/hands-wash.svg'],
                    [ 'Chch', 'chch-icon'],
                    [ 'Icon Briefumschlag', 'envelope-icon'],
                    [ 'Trash icon', 'trash-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/regular/trash-alt.svg'],
                    [ 'RWB', 'rwb-icon'],
                    [ 'Info icon', 'info-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/info-circle.svg'],
                    [ 'Logout icon', 'logout-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/user-times.svg'],
                    [ 'Wasser', 'wasser-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/water.svg'],
                    [ 'Dokument', 'dokument-icon', 'EXT:w4_communitynet/Resources/Public/Icons/svgs/solid/file-lines-regular.svg'], 
                ],
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
            ]
        ],
        'tx_w4communitynet_headerbg' => [
            'label' => $languageFilePrefix . 'tx_w4communitynet_headerbg',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'tx_w4communitynet_headerbg',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'minitems' => 0,
                    'maxitems' => 1,
                ],
                'svg,png,jpeg,jpg'
            ),
        ],
    
    ];

    ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $tempColumns
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        '--div--;' . $languageFilePrefix . 'layoutfieldsdiv,
        tx_w4communitynet_logo,
        tx_w4communitynet_logoname,
        tx_w4communitynet_logosubname,
        tx_w4communitynet_search,
        tx_w4communitynet_quicklinks,
        tx_w4communitynet_facebook,
        tx_w4communitynet_twitter,
        tx_w4communitynet_instagram,
        tx_w4communitynet_footerlinks'
    );

    ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        'tx_w4communitynet_menucolumns,tx_w4communitynet_headerbg',
        '',
        'after:backend_layout_next_level'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'layout',
        'tx_w4communitynet_icon_class;LLL:EXT:w4_communitynet/Resources/Private/Language/locallang_be.xlf:w4_community_net.icon_class',
        'after:newUntil'
    );



    $GLOBALS['TCA']['pages']['columns']['is_siteroot']['onChange'] = 'reload';

})( $GLOBALS['TCA']['pages']);
