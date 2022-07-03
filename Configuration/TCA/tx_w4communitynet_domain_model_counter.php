<?php

if (!defined ('TYPO3_MODE')) {
    die ('Access denied.');
}

return (function() {

    $languageFilePrefix = 'LLL:EXT:w4_communitynet/Resources/Private/Language/locallang_be.xlf:';
    $imgPath = 'EXT:w4_communitynet/Resources/Public/Images';

    return [
        'ctrl' => [
            'title' => $languageFilePrefix . 'ce.w4_communitynet_counters.wizard.title',
            'label' => 'name',
            'prependAtCopy' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.prependAtCopy',
            'hideAtCopy' => true,
            'tstamp' => 'tstamp',
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'versioningWS' => true,
            'origUid' => 't3_origuid',
            'editlock' => 'editlock',
            'languageField' => 'sys_language_uid',
            'transOrigPointerField' => 'l10n_parent',
            'transOrigDiffSourceField' => 'l10n_diffsource',
            'translationSource' => 'l10n_source',
            'default_sortby' => 'ORDER BY sorting ASC',
            'sortby' => 'sorting',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
                'fe_group' => 'fe_group',
            ],
            'iconfile' => "EXT:$imgPath/favicon.png",
            'searchFields' => 'name,text',
        ],
        'interface' => [
            'showRecordFieldList' => 'cruser_id,pid,sys_language_uid,l10n_parent,l10n_diffsource,hidden,starttime,endtime,fe_group,name,starting_number,ending_number,suffix,text,img_predefined,img',
        ],
        'columns' => [
            'sys_language_uid' => [
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'special' => 'languages',
                    'items' => [
                        [
                            'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                            -1,
                            'flags-multiple'
                        ],
                    ],
                    'default' => 0,
                ]
            ],
            'l10n_parent' => [
                'displayCond' => 'FIELD:sys_language_uid:>:0',
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
                'config' => [
                    'type' => 'group',
                    'internal_type' => 'db',
                    'allowed' => 'tx_w4communitynet_domain_model_counter',
                    'size' => 1,
                    'maxitems' => 1,
                    'minitems' => 0,
                    'default' => 0,
                ],
            ],
            'l10n_source' => [
                'config' => [
                    'type' => 'passthrough'
                ]
            ],
            'l10n_diffsource' => [
                'config' => [
                    'type' => 'passthrough',
                    'default' => ''
                ]
            ],
            'hidden' => [
                'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
                'config' => [
                    'type' => 'check',
                    'default' => 0,
                ]
            ],
            'cruser_id' => [
                'label' => 'cruser_id',
                'config' => [
                    'type' => 'passthrough'
                ]
            ],
            'pid' => [
                'label' => 'pid',
                'config' => [
                    'type' => 'passthrough'
                ]
            ],
            'crdate' => [
                'label' => 'crdate',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'eval' => 'datetime',
                ]
            ],
            'tstamp' => [
                'label' => 'tstamp',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'eval' => 'datetime',
                ]
            ],
            'sorting' => [
                'label' => 'sorting',
                'config' => [
                    'type' => 'passthrough',
                ]
            ],
            'starttime' => [
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'size' => 16,
                    'eval' => 'datetime,int',
                    'default' => 0,
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ]
            ],
            'endtime' => [
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'size' => 16,
                    'eval' => 'datetime,int',
                    'default' => 0,
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ]
            ],
            'fe_group' => [
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectMultipleSideBySide',
                    'size' => 5,
                    'maxitems' => 20,
                    'items' => [
                        [
                            'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                            -1,
                        ],
                        [
                            'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                            -2,
                        ],
                        [
                            'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                            '--div--',
                        ],
                    ],
                    'exclusiveKeys' => '-1,-2',
                    'foreign_table' => 'fe_groups',
                    'foreign_table_where' => 'ORDER BY fe_groups.title',
                ],
            ],
            'name' => [
                'label' => $languageFilePrefix . 'w4_communitynet_counter.name',
                'config' => [
                    'type' => 'input',
                    'default' =>'',
                    'eval' => 'required,trim',
                    'size' => 9,
                ],
            ],
            'starting_number' => [
                'label' => $languageFilePrefix . 'w4_communitynet_counter.starting_number',
                'config' => [
                    'type' => 'input',
                    'default' =>'',
                    'eval' => 'required,trim',
                    'size' => 9,
                ],
            ],
            'ending_number' => [
                'label' => $languageFilePrefix . 'w4_communitynet_counter.ending_number',
                'config' => [
                    'type' => 'input',
                    'default' =>'',
                    'eval' => 'required,trim',
                    'size' => 9,
                ],
            ],
            'suffix' => [
                'label' => $languageFilePrefix . 'w4_communitynet_counter.suffix',
                'config' => [
                    'type' => 'input',
                    'default' =>'',
                    'size' => 9,
                ],
            ],
            'text' => [
                'label' => $languageFilePrefix . 'w4_communitynet_counter.text',
                'config' => [
                    'type' => 'input',
                    'default' =>'',
                    'eval' => 'trim',
                    'size' => 9,
                ],
            ],
            'img_predefined' => [
                'label' => $languageFilePrefix . 'w4_communitynet_counter.img_predefined',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['', '0'],
                        [$languageFilePrefix . 'w4_communitynet_counter.img_predefined.1', '1', "EXT:$imgPath/Counters/1.svg"],
                        [$languageFilePrefix . 'w4_communitynet_counter.img_predefined.2', '2', "EXT:$imgPath/Counters/2.svg"],
                        [$languageFilePrefix . 'w4_communitynet_counter.img_predefined.3', '3', "EXT:$imgPath/Counters/3.svg"],
                        [$languageFilePrefix . 'w4_communitynet_counter.img_predefined.4', '4', "EXT:$imgPath/Counters/4.svg"]
                    ],
                    'size' => 1,
                    'maxitems' => 1,
                    'default' => '0',
                    'showIconTable' => 1,
                ]
            ],
            'img' => [
                'exclude' => 0,
                'label' => $languageFilePrefix . 'w4_communitynet_counter.img',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'img',
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
        ],
        'types' => [
            '1' => [
                'showitem' => '
                name,starting_number,ending_number,suffix,text,img_predefined,img,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    sys_language_uid, l10n_parent, l10n_diffsource,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden, starttime, endtime, fe_group'
            ],
        ],
        'paletteAccess' => [
            'showitem' => '
            hidden, starttime, endtime, fe_group
        ',
        ],
        'paletteLanguage' => [
            'showitem' => '
            sys_language_uid, l10n_parent, l10n_diffsource,
        ',
        ],
    ];
})();
