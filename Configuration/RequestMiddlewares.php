<?php

return [
    'frontend' => [
        'w4services/w4_communitynet/include_layout_definition_middleware' => [
            'target' => \W4Services\W4Communitynet\Middleware\IncludeLayoutDefinitionMiddleware::class,
            'after' => [
                'typo3/cms-frontend/page-resolver',
                'typo3/cms-frontend/tsfe',
            ],
            'before' => [
                'typo3/cms-frontend/prepare-tsfe-rendering',
            ]
        ]
    ]
];
