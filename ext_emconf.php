<?php

declare(strict_types=1);

$EM_CONF[$_EXTKEY] = [
    'title' => 'CommunityNet',
    'description' => 'Basic Extension for CommunityNet websites.',
    'version' => '1.0.1',
    'category' => 'fe',
    'constraints' => [
        'depends' => [
            'php' => '8.0.0-8.0.99',
            'typo3' => '11.5.0-11.5.99',
            'container' => '~1.6.0',
            'schema' => '~2.5.0',
            'vhs' => '~6.1.0',
            'w4holding/w4_organization_list' => '~1.0.0',
        ],
    ],
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'author' => 'W4 Services GmbH',
    'author_email' => 'info@w-4.ch',
    'author_company' => 'W4 Services GmbH',
    'autoload' => [
        'psr-4' => [
            'W4Services\\W4Communitynet\\' => 'Classes'
        ],
    ],
];
