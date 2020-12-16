<?php

return [
    /**
     * The pattern to use for API Resource Naming.
     * This will be used with sprintf().
     */
    'resource_name' => '%sResource',

    /**
     * The pattern to use for Policy Naming.
     * This will be used with sprintf().
     */
    'policy_name' => '%sPolicy',

    /**
     * The pattern to use for Seeder Naming.
     * This will be used with sprintf().
     */
    'seeder_name' => '%sSeeder',

    /**
     * The names of the Controllers to generate for each API Resource,
     * Please include any options you may want to include.
     * By default they are invokable controllers.
     */
    'controllers' => [
        [
            'name' => 'IndexController',
            'options' => [
                '--invokable',
            ]
        ],
        [
            'name' => 'CreateController',
            'options' => [
                '--invokable',
            ]
        ],
        [
            'name' => 'ShowController',
            'options' => [
                '--invokable',
            ]
        ],
        [
            'name' => 'UpdateController',
            'options' => [
                '--invokable',
            ]
        ],
        [
            'name' => 'DeleteController',
            'options' => [
                '--invokable',
            ]
        ],
    ],

    /**
     * The names of the Form Requests to generate for each API Resource.
     */
    'form_requests' => [
        'CreateRequest',
        'UpdateRequest',
    ],
];
