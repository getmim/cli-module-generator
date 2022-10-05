<?php

/**
 * Controller helper
 * @package cli-module-generator
 * @version 0.0.1
 */

namespace CliModuleGenerator\Library;

use Cli\Library\Bash;
use Mim\Library\Fs;
use CliModule\Library\BController;
use CliModule\Library\BModel;

class Generator
{
    static $config = [
        'controller' => [
            'items' => [
                [
                    "gate" => "api",
                    "extends" => "\\Api\\Controller",
                    "model" => "\\Options\\Model\\Options",
                    "format" => [
                        "name" => "details-options",
                        "fields" => [
                            "product",
                            "details"
                        ]
                    ],
                    "Doc.Path" => "Store\/Product\/Details\/Options",
                    "route" => [
                        "path" => [
                            "value" => "\/store\/(:store)\/product\/(:product)\/details\/(:details)\/(:type)\/options",
                            "params" => [
                                "store" => "number",
                                "product" => "number",
                                "details" => "number",
                                "type" => "slug"
                            ]
                        ]
                    ],
                    "parents" => [
                        "store" => [
                            "model" => "Store\\Model\\Store",
                            "field" => "id",
                            "filters" => [
                                "status" => "1",
                                "services" => [
                                    "user" => [
                                        "property" => "id",
                                        "column" => "user"
                                    ],
                                    "brand" => [
                                        "property" => "id",
                                        "column" => "merchant_brand"
                                    ]
                                ]
                            ]
                        ],
                        "product" => [
                            "model" => "Product\\Model\\Product",
                            "field" => "id",
                            "filters" => [
                                "parents" => [
                                    "store" => [
                                        "property" => "id",
                                        "column" => "store"
                                    ]
                                ]
                            ],
                            "setget" => [
                                "property" => "id",
                                "column" => "product"
                            ]
                        ],
                        "details" => [
                            "model" => "Details\\Model\\Details",
                            "field" => "id",
                            "filters" => [
                                "status" => "1",
                                "parents" => [
                                    "store" => [
                                        "property" => "id",
                                        "column" => "store"
                                    ],
                                    "product" => [
                                        "property" => "id",
                                        "column" => "product"
                                    ]
                                ]
                            ],
                            "setget" => [
                                "property" => "id",
                                "column" => "details"
                            ]
                        ]
                    ],
                    "auths" => [
                        "app" => true,
                        "user" => true
                    ],
                    "filters" => [
                        "status" => "1",
                        "services" => [
                            "user" => [
                                "property" => "id",
                                "column" => "user"
                            ]
                        ],
                        "parents" => [
                            "details" => [
                                "property" => "id",
                                "column" => "details"
                            ]
                        ]
                    ],
                    "methods" => [
                        "index" => [
                            "filters" => [
                                "name",
                                "status"
                            ],
                            "sorts" => [
                                "id",
                                "name",
                                "created"
                            ]
                        ],
                        "single" => [],
                        "create" => [
                            "form" => "api.details-options.create",
                            "columns" => [
                                "services" => [
                                    "user" => [
                                        "property" => "id",
                                        "column" => "user"
                                    ]
                                ]
                            ]
                        ],
                        "update" => [
                            "form" => "api.details-options.update"
                        ],
                        "delete" => [
                            "status" => "0"
                        ]
                    ],
                    "name" => "DetailsController",
                    "ns" => "Module\\Controller"
                ]
            ],
        ],
        'model' => [
            'items' => [
                [
                    'dir' => false,
                    'name' => 'Gallery',
                    'ns' => 'Module\\Model',
                    'extends' => '\\Mim\\Model',
                    'implements' => [],
                    'methods' => [],
                    'properties' => [
                        [
                            'name' => 'table',
                            'prefix' => 'protected static',
                            'value' => 'gallery'
                        ],
                        [
                            'name' => 'chains',
                            'prefix' => 'protected static',
                            'value' => [],
                        ],
                        [
                            'name' => 'q',
                            'prefix' => 'protected static',
                            'value' => []
                        ]
                    ],
                    'fields' => [
                        'id' => [
                            'type' => 'INTEGER',
                            'attrs' => [
                                'unsigned' => TRUE,
                                'primary_key' => TRUE,
                                'auto_increment' => TRUE,
                            ],
                            'index' => 1000,
                            'format' => [
                                'type' => 'number'
                            ]
                        ],
                        'user' => [
                            'type' => 'INTEGER',
                            'attrs' => [
                                'unsigned' => TRUE,
                                'null' => FALSE,
                            ],
                            'index' => 2000,
                            'format' => [
                                'type' => 'user'
                            ]
                        ],
                        'object' => [
                            'type' => 'INTEGER',
                            'attrs' => [
                                'unsigned' => TRUE,
                                'null' => FALSE,
                            ],
                            'index' => 2500,
                            'format' => [
                                'type' => 'object',
                                'model' => [
                                    'name' => 'Object\\Model\\Obj',
                                    'field' => 'id',
                                    'type' => 'number'
                                ],
                                'format' => 'std-object'
                            ]
                        ],
                        'text' => [
                            'type' => 'TEXT',
                            'attrs' => [],
                            'index' => 3000,
                            'format' => [
                                'type' => 'text'
                            ]
                        ],
                        'varchar' => [
                            'type' => 'VARCHAR',
                            'length' => 100,
                            'attrs' => [
                                'null' => TRUE,
                                'unique' => TRUE,
                            ],
                            'index' => 4000,
                            'format' => [
                                'type' => 'text'
                            ]
                        ],
                        'bigint' => [
                            'type' => 'BIGINT',
                            'attrs' => [
                                'unsigned' => TRUE,
                                'null' => FALSE,
                                'default' => 1,
                            ],
                            'index' => 5000,
                            'format' => [
                                'type' => 'number'
                            ]
                        ],
                        'double' => [
                            'type' => 'DOUBLE',
                            'length' => '12,3',
                            'attrs' => [
                                'unsigned' => TRUE,
                                'null' => FALSE,
                                'default' => 12.2,
                            ],
                            'index' => 6000,
                            'format' => [
                                'type' => 'number'
                            ]
                        ],
                        'integer' => [
                            'type' => 'INTEGER',
                            'attrs' => [
                                'unsigned' => TRUE,
                                'null' => FALSE,
                                'default' => 1,
                            ],
                            'index' => 7000,
                            'format' => [
                                'type' => 'number'
                            ]
                        ],
                        'tinyint' => [
                            'type' => 'TINYINT',
                            'attrs' => [
                                'unsigned' => TRUE,
                                'null' => FALSE,
                                'default' => 1,
                            ],
                            'index' => 8000,
                            'format' => [
                                'type' => 'number'
                            ]
                        ],
                        'date' => [
                            'type' => 'DATE',
                            'attrs' => [
                                'null' => FALSE,
                            ],
                            'index' => 9000,
                            'format' => [
                                'type' => 'date'
                            ]
                        ],
                        'datetime' => [
                            'type' => 'DATETIME',
                            'attrs' => [
                                'null' => FALSE,
                            ],
                            'index' => 10000,
                            'format' => [
                                'type' => 'date'
                            ]
                        ],
                        'updated' => [
                            'type' => 'TIMESTAMP',
                            'attrs' => [
                                'default' => 'CURRENT_TIMESTAMP',
                                'update' => 'CURRENT_TIMESTAMP',
                            ],
                            'index' => 11000,
                            'format' => [
                                'type' => 'date'
                            ]
                        ],
                        'created' => [
                            'type' => 'TIMESTAMP',
                            'attrs' => [
                                'default' => 'CURRENT_TIMESTAMP',
                            ],
                            'index' => 11000,
                            'format' => [
                                'type' => 'date'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];

    static $availableOptions = [
        'migration' => [
            'types' => [
                'text' => [
                    'CHAR',
                    'ENUM',
                    'LONGTEXT',
                    'SET',
                    'TEXT',
                    'TINYTEXT',
                    'VARCHAR'
                ],
                'numeric' => [
                    'BIGINT',
                    'BOOLEAN',
                    'DECIMAL',
                    'DOUBLE',
                    'FLOAT',
                    'INTEGER',
                    'TINYINT',
                    'SMALLINT',
                    'MEDIUMINT',
                ],
                'date' => [
                    'DATE',
                    'DATETIME',
                    'TIMESTAMP',
                    'TIME',
                    'YEAR'
                ],
            ],
            'attributes' => [
                'null',
                'default',
                'update',
                'unsigned',
                'unique',
                'primary_key',
                'auto_increment'
            ]
        ],
        'formatter' => [
            'types' => [
                'number' => [
                    'type' => 'number'
                ],
                'user' => [
                    'type' => 'user'
                ],
                'object' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'Object\\Model\\Obj',
                        'field' => 'id',
                        'type' => 'number'
                    ],
                    'format' => 'std-object'
                ],
                'text' => [
                    'type' => 'text'
                ],
                'date' => [
                    'type' => 'date'
                ]

            ]
        ]
    ];

    public static function build($moduleDir, $command)
    {
        if ($command === 'init') {

            self::boilerplate($moduleDir);
            Bash::echo('Config generated!');
        } elseif ($command === 'run') {

            self::generate($moduleDir);
            Bash::echo('Generator executed!');
        } else {

            Bash::error('Unrecognized command!');
        }

        return;
    }

    static function boilerplate($moduleDir)
    {

        Fs::write($moduleDir . '/module-generator.yaml', \yaml_emit(self::$config));
        Fs::write($moduleDir . '/available-options.yaml', \yaml_emit(self::$availableOptions));
        Bash::echo('config generated');
        exit;
    }

    static function generate($moduleDir)
    {

        $yaml = file_get_contents($moduleDir . '/module-generator.yaml') ?? '';
        $yaml = \yaml_parse($yaml);

        $modelsConfigs = $yaml['model']['items'] ?? [];
        $controllerConfigs = $yaml['controller']['items'] ?? [];

        foreach ($controllerConfigs as $config) {
            self::buildController($moduleDir, $config);
        }
        foreach ($modelsConfigs as $config) {
            self::buildModel($moduleDir, $config);
        }
        return;
    }

    static function buildModel($moduleDir, $config)
    {

        $tableName = null;
        foreach ($config['properties'] as $cfg) {
            if (is_array($cfg)) {
                foreach ($cfg as $k => $c) {
                    if ($k === 'name' && $c === 'table') {
                        $tableName = $cfg['value'];
                        break;
                    }
                }
            }
        }
        if (!$tableName) {
            Bash::echo('Model ' . $config['name'] . ' Skipped, no table name detected');
            return;
        }
        BModel::build(
            $moduleDir,
            $tableName,
            $config,
        );
    }

    static function buildController($path, $config)
    {
        BController::build($path, $config['name'], $config);
        return true;
    }
}
