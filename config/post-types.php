<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Post Types
    |--------------------------------------------------------------------------
    |
    | Post types to be registered with Extended CPTs
    | <https://github.com/johnbillion/extended-cpts>
    |
    */

    'post_types' => [
        'partnerkantoor' => [
            'menu_icon' => 'dashicons-building',
            'menu_position' => 20,
            'supports' => ['title', 'editor', 'revisions', 'thumbnail'],
            'show_in_rest' => true,
            'names' => [
                'singular' => 'Partnerkantoor',
                'plural' => 'Partnerkantoren',
                'slug' => 'partnerkantoren',
            ]
        ],
        'vacature' => [
            'menu_icon' => 'dashicons-text-page',
            'menu_position' => 20,
            'supports' => ['title', 'editor', 'revisions', 'thumbnail'],
            'show_in_rest' => true,
            'names' => [
                'singular' => 'Vacature',
                'plural' => 'Vacatures',
                'slug' => 'vacatures',
            ]
        ],
        'evenement' => [
            'menu_icon' => 'dashicons-tickets',
            'menu_position' => 20,
            'supports' => ['title', 'editor', 'revisions', 'thumbnail'],
            'show_in_rest' => true,
            'names' => [
                'singular' => 'Evenement',
                'plural' => 'Evenementen',
                'slug' => 'evenement',
            ]
        ],
        'bestuur' => [
            'menu_icon' => 'dashicons-groups',
            'menu_position' => 20,
            'supports' => ['title', 'editor', 'revisions', 'thumbnail'],
            'show_in_rest' => true,
            'names' => [
                'singular' => 'Bestuur',
                'plural' => 'Bestuur',
                'slug' => 'bestuur',
            ]
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Taxonomies
    |--------------------------------------------------------------------------
    |
    | Taxonomies to be registered with Extended CPTs library
    | <https://github.com/johnbillion/extended-cpts>
    |
    */

    'taxonomies' => [
        'seed_category' => [
            'post_types' => ['seed'],
            'meta_box' => 'radio',
            'names' => [
                'singular' => 'Category',
                'plural' => 'Categories',
            ],
        ],
    ],
];
