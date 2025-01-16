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
            'supports' => ['title', 'editor', 'revisions', 'thumbnail', 'excerpt'],
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
            'supports' => ['title', 'editor', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'names' => [
                'singular' => 'Evenement',
                'plural' => 'Evenementen',
                'slug' => 'evenementen',
            ]
        ],
        'bestuur' => [
            'menu_icon' => 'dashicons-groups',
            'menu_position' => 20,
            'supports' => ['title', 'editor', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'exclude_from_search' => true,
            'query_var'           => false,
            'names' => [
                'singular' => 'Bestuur',
                'plural' => 'Bestuur',
                'slug' => 'bestuur',
            ]
        ],
        'dictatencentrale' => [
            'menu_icon' => 'dashicons-media-document',
            'menu_position' => 20,
            'supports' => ['title', 'editor', 'revisions', 'excerpt'],
            'show_in_rest' => true,
            'names' => [
                'singular' => 'Dictatencentrale',
                'plural' => 'Dictatencentrale',
                'slug' => 'dictatencentrale',
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
        'category-event' => [
            'post_types' => ['evenement'],
            'meta_box' => 'simple',
            'names' => [
                'singular' => 'Category',
                'plural' => 'Categories',
            ],
        ],
        'location' => [
            'post_types' => ['evenement'],
            'meta_box' => 'dropdown',
            'names' => [
                'singular' => 'Location',
                'plural' => 'Locations',
            ],
        ],
        'vak-dictatencentrale' => [
            'post_types' => ['dictatencentrale'],
            'meta_box' => 'dropdown',
            'names' => [
                'singular' => 'Vak',
                'plural' => 'Vakken',
            ],
        ],
        'type-dictatencentrale' => [
            'post_types' => ['dictatencentrale'],
            'meta_box' => 'dropdown',
            'names' => [
                'singular' => 'Type',
                'plural' => 'Types',
            ],
        ],
    ],
];
