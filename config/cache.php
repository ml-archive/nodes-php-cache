<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Enable/Disable Nodes cache
    |--------------------------------------------------------------------------
    |
    | To disable/flush all existing Nodes caches, set this to false.
    |
    */
    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Default cache lifetime
    |--------------------------------------------------------------------------
    |
    | If a cache group does not have a "lifetime" available, it will use this
    | setting as a default lifetime. Default is 60 minutes (1 hour).
    |
    */
    'lifetime' => 60,

    /*
    |--------------------------------------------------------------------------
    | Cache groups
    |--------------------------------------------------------------------------
    |
    | Divide your cache settings into different cache groups
    | for easier access and maintenance.
    |
    | To retrieve a cache group it'll be concatenated with a dot - "group.tag"
    | E.g. "nstack.translate", "project.feed", "nodes.employees"
    |
    |   Example
    |
    |   'users' => [
    |        'active' => true,
    |        'key' => 'users.index',
    |        'lifetime' => 60 // 1 hour
    |    ]
    |
    */
    'groups' => [
        /*
        |--------------------------------------------------------------------------
        | Project
        |--------------------------------------------------------------------------
        |
        | Cache settings used by your project.
        |
        */
        'project' => [],
    ],
];
