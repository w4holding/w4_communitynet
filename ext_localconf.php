<?php

defined('TYPO3') or die();

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

( function( $_EXTKEY) {

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$_EXTKEY.'_auto_cache_clear'] =
        \W4Services\W4Communitynet\Hooks\Cacheautoclear::class;

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_extfilefunc.php']['processData'][$_EXTKEY.'_auto_cache_clear'] =
        \W4Services\W4Communitynet\Hooks\Filecacheautoclear::class;


    /* Register RTE configuration */
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:' . $_EXTKEY . '/Configuration/RTE/Default.yaml';

    /* Load constants */
    ExtensionManagementUtility::addTypoScript(
        $_EXTKEY,
        'constants',
        '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $_EXTKEY . '/Configuration/TypoScript/Constants/" extensions="typoscript">'
    );

    /* Load setup */
    ExtensionManagementUtility::addTypoScript(
        $_EXTKEY,
        'setup',
        '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $_EXTKEY . '/Configuration/TypoScript/Setup/" extensions="typoscript">'
    );

    /* Load TSConfig */
    ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $_EXTKEY . '/Configuration/TypoScript/TSConfig/" extensions="tsconfig">'
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['postUserLookUp'][] =
     \W4Services\W4Communitynet\Hooks\OverwriteFlexForm::class . '->overwrite';
     
     $GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['classes']['Domain/Model/News']['w4_communitynet'] = 'w4_communitynet';

})( 'w4_communitynet');
