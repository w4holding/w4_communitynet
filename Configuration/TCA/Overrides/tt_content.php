<?php

defined('TYPO3') or die();

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

( function( $tca) {

    $languageFilePrefix = 'LLL:EXT:w4_communitynet/Resources/Private/Language/locallang_be.xlf:';
    $imgPath = 'EXT:w4_communitynet/Resources/Public/Images/';

    ExtensionManagementUtility::addTcaSelectItemGroup(
        'tt_content',
        'CType',
        'w4_communitynet',
        'CommunityNet'
    );

    $tempColumns = [
        'tx_w4communitynet_button' => [
            'label' => $languageFilePrefix . 'ce.w4_communitynet_button.wizard.title',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => 'FILE:EXT:w4_communitynet/Configuration/FlexForms/Button.xml',
                ],
            ]
        ],
        'tx_w4communitynet_counters' => [
            'label' => $languageFilePrefix . 'ce.w4_communitynet_counters.wizard.title',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => 'FILE:EXT:w4_communitynet/Configuration/FlexForms/Counters.xml',
                ],
            ],
        ],
        'tx_w4communitynet_colorheader' => [
            'label' => $languageFilePrefix . 'tt_content.tx_w4communitynet_colorheader',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle'
            ]
        ],
        'tx_w4communitynet_underlineheader' => [
            'label' => $languageFilePrefix . 'tt_content.tx_w4communitynet_underlineheader',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle'
            ]
        ],
        'tx_w4communitynet_pheader' => [
            'label' => $languageFilePrefix . 'tt_content.tx_w4communitynet_pheader',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle'
            ]
        ],
        'tx_w4communitynet_visibility' => [
            'label' => $languageFilePrefix . 'responsive',
            'config' => [
                'type' => 'check',
                'items' => [
                    [$languageFilePrefix . 'hidden.xs', 'xs'],
                    [$languageFilePrefix . 'hidden.sm', 'sm'],
                    [$languageFilePrefix . 'hidden.md', 'md'],
                    [$languageFilePrefix . 'hidden.lg', 'lg'],
                    [$languageFilePrefix . 'hidden.xl', 'xl']
                ],
                'cols' => 'inline',
                'renderType' => 'checkboxToggle'
            ]
        ],
        'tx_w4communitynet_iframe' => [
            'label' => $languageFilePrefix . 'ce.w4_communitynet_iframe.wizard.title',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => 'FILE:EXT:w4_communitynet/Configuration/FlexForms/Iframe.xml',
                ],
            ]
        ],
        'tx_w4communitynet_boxtextheight' => [
            'label' => $languageFilePrefix . 'tt_content.tx_w4communitynet_boxtextheight',
            'displayCond' => [
                'OR' => [
                    'FIELD:imageorient:=:25',
                    'FIELD:imageorient:=:26'
                ]
            ],
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle'
            ]
        ],
        'tx_w4communitynet_sliderheight' => [
            'label' => $languageFilePrefix . 'tt_content.tx_w4communitynet_sliderheight',
            'displayCond' => [
                'OR' => [
                    'FIELD:imageorient:=:100',
                    'FIELD:imageorient:=:101'
                ]
            ],
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [ $languageFilePrefix . 'tt_content.tx_w4communitynet_sliderheight.0', '0' ],
                    [ $languageFilePrefix . 'tt_content.tx_w4communitynet_sliderheight.1', '1' ],
                    [ $languageFilePrefix . 'tt_content.tx_w4communitynet_sliderheight.2', '2' ],
                ],
                'size' => 1,
                'maxitems' => 1,
                'default' => 1,
            ]
        ],
        'tx_w4communitynet_slidermask' => [
            'label' => $languageFilePrefix . 'tt_content.tx_w4communitynet_slidermask',
            'displayCond' => [
                'OR' => [
                    'FIELD:imageorient:=:100',
                    'FIELD:imageorient:=:101'
                ]
            ],
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle'
            ]
        ],
        'tx_w4communitynet_citationbg' => [
            'label' => $languageFilePrefix . 'pages.tx_w4communitynet_citationbg',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'tx_w4communitynet_citationbg',
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
        'tx_w4communitynet_citationtext' => [
            'label' => $languageFilePrefix . 'pages.tx_w4communitynet_citationtext',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15
            ]
        ],
        'tx_w4communitynet_columnorder' => [
            'label' => $languageFilePrefix . 'pages.tx_w4communitynet_columnorder',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [ 'Citation in first column',1],
                    [ 'Citation in second column', 2],
                ],
                'size' => 1,
                'maxitems' => 1,
            ]
        ],
        'tx_w4communitynet_citationcolor' => [
            'label' => $languageFilePrefix . 'pages.tx_w4communitynet_citationcolor',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [ 'Transparent Background',''],
                    [ 'Black Background', 'blackbg'],
                ],
                'size' => 1,
                'maxitems' => 1,
            ]
        ],
        'tx_w4communitynet_eventscategoryselector' => [
            'label' => $languageFilePrefix . 'tt_content.tx_w4communitynet_eventscategoryselector',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [ 'Transparent Background',''],
                    [ 'Black Background', 'blackbg'],
                ],
                'size' => 1,
                'maxitems' => 1,
            ]
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns(
        'tt_content',
        $tempColumns
    );
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'visibility',
        'tx_w4communitynet_visibility'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'header',
        'tx_w4communitynet_citationbg,tx_w4communitynet_citationtext,tx_w4communitynet_columnorder,tx_w4communitynet_citationcolor'
    );
 
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        '--palette--;;visibility',
        '',
        'after:sectionIndex'
    );  

    $GLOBALS['TCA']['tt_content']['types']['w4_communitynet_button'] = [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                --palette--;;headers,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;;frames,
                --palette--;;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                --palette--;;categories,
            --div--;' . $languageFilePrefix . 'configuration,
                tx_w4communitynet_button,
        ',
    ];

    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $languageFilePrefix . 'ce.w4_communitynet_button.wizard.title',
            'w4_communitynet_button',
            'button',
            'w4_communitynet'
        ]
    );

    $GLOBALS['TCA']['tt_content']['types']['w4_communitynet_iframe'] = [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                --palette--;;headers,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;;frames,
                --palette--;;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                --palette--;;categories,
            --div--;' . $languageFilePrefix . 'configuration,
                tx_w4communitynet_iframe,
        ',
    ];

    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $languageFilePrefix . 'ce.w4_communitynet_iframe.wizard.title',
            'w4_communitynet_iframe',
            'iframe',
            'w4_communitynet'
        ]
    );

    $GLOBALS['TCA']['tt_content']['types']['w4_communitynet_counters'] = [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                --palette--;;headers,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;;frames,
                --palette--;;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                --palette--;;categories,
            --div--;' . $languageFilePrefix . 'configuration,
                tx_w4communitynet_counters,
      ',
    ];

    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $languageFilePrefix . 'ce.w4_communitynet_counters.wizard.title',
            'w4_communitynet_counters',
            'counter',
            'w4_communitynet'
        ]
    );

    ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'gallerySettings',
        'tx_w4communitynet_sliderheight, tx_w4communitynet_slidermask',
        'after:imageorient'
    );

    ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'headers',
        '--linebreak--,tx_w4communitynet_pheader, tx_w4communitynet_colorheader, tx_w4communitynet_underlineheader',
        'after:date'
    );

    ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'gallerySettings',
        'tx_w4communitynet_boxtextheight',
        'after:imagecols'
    );

    GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
            new \B13\Container\Tca\ContainerConfiguration(
                '2cols-container',
                $languageFilePrefix . 'ce.w4_communitynet_2cols.wizard.title',
                $languageFilePrefix . 'ce.w4_communitynet_2cols.wizard.title',
                [
                    [
                        ['name' => $languageFilePrefix . 'column_1', 'colPos' => 201],
                        ['name' => $languageFilePrefix . 'column_2', 'colPos' => 202]
                    ]
                ]
            )
        )
        ->setIcon('EXT:w4_communitynet/Resources/Public/Images/Content/Cols2.png')
    );

    GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
            new \B13\Container\Tca\ContainerConfiguration(
                '3cols-container',
                $languageFilePrefix . 'ce.w4_communitynet_3cols.wizard.title',
                $languageFilePrefix . 'ce.w4_communitynet_3cols.wizard.title',
                [
                    [
                        ['name' => $languageFilePrefix . 'column_1', 'colPos' => 201],
                        ['name' => $languageFilePrefix . 'column_2', 'colPos' => 202],
                        ['name' => $languageFilePrefix . 'column_3', 'colPos' => 203]
                    ]
                ]
            )
        )
        ->setIcon('EXT:w4_communitynet/Resources/Public/Images/Content/Cols3.png')
    );

    GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
            new \B13\Container\Tca\ContainerConfiguration(
                '4cols-container',
                $languageFilePrefix . 'ce.w4_communitynet_4cols.wizard.title',
                $languageFilePrefix . 'ce.w4_communitynet_4cols.wizard.title',
                [
                    [
                        ['name' => $languageFilePrefix . 'column_1', 'colPos' => 201],
                        ['name' => $languageFilePrefix . 'column_2', 'colPos' => 202],
                        ['name' => $languageFilePrefix . 'column_3', 'colPos' => 203],
                        ['name' => $languageFilePrefix . 'column_4', 'colPos' => 204]
                    ]
                ]
            )
        )
        ->setIcon('EXT:w4_communitynet/Resources/Public/Images/Content/Cols4.png')
    );

    GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
            new \B13\Container\Tca\ContainerConfiguration(
                'citationbox-container',
                $languageFilePrefix . 'ce.w4_communitynet_citationbox.wizard.title',
                $languageFilePrefix . 'ce.w4_communitynet_citationbox.wizard.title',
                [
                    [
                        ['name' => $languageFilePrefix . 'column_1', 'colPos' => 201]
                    ]
                ]
            )
        )
        ->setIcon('EXT:w4_communitynet/Resources/Public/Images/Content/Cols2.png')
    );

    $GLOBALS['TCA']['tt_content']['types']['citationbox-container']['showitem'] = '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, 
                --palette--;;general, 
                    header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.div_formlabel, 
                    tx_w4communitynet_citationbg,
                    tx_w4communitynet_citationtext,
                    tx_w4communitynet_columnorder,
                    tx_w4communitynet_citationcolor,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance, 
                --palette--;;frames, --palette--;;appearanceLinks, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, 
                --palette--;;language, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                --palette--;;hidden, --palette--;;access, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories, categories, 
                --palette--;;visibility,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes, rowDescription, 
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,';

    GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
            new \B13\Container\Tca\ContainerConfiguration(
                '2colsSidecol-container',
                $languageFilePrefix . 'ce.w4_communitynet_2colsSidecol.wizard.title',
                $languageFilePrefix . 'ce.w4_communitynet_2colsSidecol.wizard.title',
                [
                    [
                        ['name' => $languageFilePrefix . 'column_1', 'colPos' => 201, 'colspan' => 3],
                        ['name' => $languageFilePrefix . 'column_2', 'colPos' => 202, 'colspan' => 1]
                    ]
                ]
            )
        )
        ->setIcon('EXT:w4_communitynet/Resources/Public/Images/Content/Cols2Sidecol.png')
    );

    $GLOBALS['TCA']['tt_content']['columns']['imageorient']['onChange'] = 'reload';
    $GLOBALS['TCA']['tt_content']['columns']['imagecols']['displayCond'] = 'FIELD:imageorient:<:10';
    $GLOBALS['TCA']['tt_content']['columns']['image_zoom']['displayCond'] = 'FIELD:imageorient:<:10';

})( $GLOBALS['TCA']['tt_content']);
