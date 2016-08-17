<?php

namespace T4web\Log;

return [
    't4web-log' => include 't4web-log.config.php',
    'entity_map' => include 'entity_map.config.php',
    'sebaks-view' => include 'sebaks-view.config.php',
    't4web-crud' => include 't4web-crud.config.php',
    
    'router' => [
        'routes' => [
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            't4web-log' => __DIR__ . '/../view',
        ],
    ],

    'console' => [
        'router' => [
            'routes' => [
                'migration-init' => [
                    'type' => 'Simple',
                    'options' => [
                        'route' => 'log init',
                        'defaults' => [
                            'controller' => Action\Console\InitController::class,
                        ]
                    ]
                ],
            ]
        ]
    ],

    'controllers' => [
        'factories' => [
            Action\Console\InitController::class => Action\Console\InitControllerFactory::class,
        ],
    ],

    'service_manager' => [
        'factories' => [
            Logger::class => function($sm) {
                $config = $sm->get('Config');
//                die(var_dump());
                return new Logger(
                    $sm->get('Log\Infrastructure\Repository'),
                    $config['t4web-log']['scopes']
                );
            }
        ],
    ],
];
