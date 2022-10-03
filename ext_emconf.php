<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'CommunityNet',
    'description' => 'W4 Basic Extension for CommunityNet websites.',
    'version' => '1.0.0',
    'category' => 'fe',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'vhs' => '6.1.0-6.1.99',
            'container' => '~1.6.0',
            'schema' => '2.5.0.-2.599',
            'tt-address' => '6.1.0-6.1.99',
            'eventnews' => '5.0.0-5.0.99',
            'news' => '9.4.0-9.4.99',
            'faq' => '5.1.0-5.1.99',
            'w4_organization_list' => '1.0.0-1.0.99'
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
