<?php

defined('TYPO3') or die();

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

( function( $tca) {

    $languageFilePrefix = 'LLL:EXT:w4_communitynet/Resources/Private/Language/locallang_be.xlf:';

    $tempColumns = [
        'event_type' => [
            'label' => $languageFilePrefix . 'tx_news.event_type',
            'displayCond' => 'FIELD:is_event:REQ:true',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'size' => 1,
                'maxitems' => 1,
            ]
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns(
        'tx_news_domain_model_news',
        $tempColumns
    );

    ExtensionManagementUtility::addToAllTCAtypes(
        'tx_news_domain_model_news',
        'event_type',
        '',
        'after:is_event'
    );

})( $GLOBALS['TCA']['tx_news_domain_model_news']);
