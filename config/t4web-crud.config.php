<?php

namespace T4web\Log;

return [
    'route-generation' => [
        [
            'entity' => 'log',
            'backend' => [
                'actions' => [
                    'list',
                ],
                'options' => [
                    'list' => [
                        'criteriaValidator' => Action\Backend\ListAction\CriteriaValidator::class,
                    ],
                ],
            ],
        ],
    ],
];

