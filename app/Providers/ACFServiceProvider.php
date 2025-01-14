<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Roots\Acorn\Sage\SageServiceProvider;

class ACFServiceProvider extends SageServiceProvider
{
    /**
     * Register ACF services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        /**
         * Register ACF blocks from the config.
         */
        add_action('acf/init', function (): void {
            Collection::make(config('acf-blocks'))
                ->each(function ($args) {
                    acf_register_block_type($args);
                });
        }, 100);

        /**
         * Register ACF save JSON filter.
         */
        add_filter('acf/settings/save_json', function ($path): string {
            $path = base_path() . '/resources/acf';
            return $path;
        });

        /**
         * Register ACF load JSON filter.
         */
        add_filter('acf/settings/load_json', function ($path): string {
            $path = base_path() . '/resources/acf';
            return $path;
        });

        /**
         * Adds an options page to the admin menu
         */
        add_action('acf/init', function () {
            if (function_exists('acf_add_options_page')) {
                // Add parent
                $parent = acf_add_options_page([
                    'page_title' => 'Thema opties',
                    'menu_title' => 'Thema opties',
                    'menu_slug'  => 'site-options',
                    'capability' => 'edit_posts',
                    'redirect'   => false
                ]);

                if (function_exists('acf_add_options_sub_page')) {
                    // Add sub page.
                    $child = acf_add_options_sub_page(array(
                        'page_title'  => __('Footer opties'),
                        'menu_title'  => __('Footer'),
                        'parent_slug' => $parent['menu_slug'],
                    ));
                }
            }
        });

        /**
         * Dynamically populate select choices based on CPT's
         */
        add_filter('acf/load_field/name=matching_partnerkantoor', function ($field) {
            // Reset choices
            $field['choices'] = [
                'null' => 'Geen'
            ];

            // Get the Text Area values from the options page without any formatting
            $choices = get_posts([
                'post_type'         => 'partnerkantoor',
                'posts_per_page'    => -1,
                'orderby'           => 'title',
                'order'             => 'ASC'
            ]);

            // Loop through the array and add to field 'choices'
            if (is_array($choices)) {

                foreach ($choices as $choice) {

                    $field['choices'][$choice->ID] = $choice->post_title;
                }
            }


            // Return the field
            return $field;
        });

        /**
         * Dynamically populate select choices based on CPT's
         */
        add_filter('acf/load_field/name=event_partnerkantoren', function ($field) {
            // Get the Text Area values from the options page without any formatting
            $choices = get_posts([
                'post_type'         => 'partnerkantoor',
                'posts_per_page'    => -1,
                'orderby'           => 'title',
                'order'             => 'ASC'
            ]);

            // Loop through the array and add to field 'choices'
            if (is_array($choices)) {

                foreach ($choices as $choice) {

                    $field['choices'][$choice->ID] = $choice->post_title;
                }
            }


            // Return the field
            return $field;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
