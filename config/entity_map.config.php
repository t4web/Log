<?php

namespace T4web\Log;

return [
    'Log' => [
        'entityClass' => Domain\Log\Log::class,
        'table' => 'logs',
        'primaryKey' => 'id',
        'columnsAsAttributesMap' => [
            'id' => 'id',
            'message' => 'message',
            'scope' => 'scope',
            'priority' => 'priority',
            'extras' => 'extras',
            'created_dt' => 'createdDt',
        ],
        'criteriaMap' => [
            'id' => 'id_equalTo'
        ]
    ],
];
