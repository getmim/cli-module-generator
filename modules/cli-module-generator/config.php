<?php

return [
    '__name' => 'cli-module-generator',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/cli-module-generator.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Rian',
        'email' => 'godamri@gmail.com',
        'website' => '-'
    ],
    '__files' => [
        'modules/cli-module-generator' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'cli' => NULL
            ],
            [
                'cli-module' => NULL
            ],
            [
                'lib-formatter' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'CliModuleGenerator\\Controller' => [
                'type' => 'file',
                'base' => 'modules/cli-module-generator/controller'
            ],
            'CliModuleGenerator\\Library' => [
                'type' => 'file',
                'base' => 'modules/cli-module-generator/library'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'tool-module' => [
            'toolControllerGenerator' => [
                'info' => 'Generate controller and model from config file',
                'path' => [
                    'value' => 'generator (:command)',
                    'params' => [
                        'command' => 'slug'
                    ]
                ],
                'handler' => 'CliModuleGenerator\\Controller\\Generator::generate'
            ]
        ],
        'cli' => []
    ],
    'cli' => [
        'autocomplete' => [
            '!^generator( [a-z]*)?$!' => [
                'priority' => 3,
                'handler' => [
                    'class' => 'CliModuleGenerator\\Library\\Autocomplete',
                    'method' => 'command'
                ]
            ]
        ]
    ]
];