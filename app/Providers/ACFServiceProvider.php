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
        add_filter('acf/settings/save_json', function($path): string {
            $path = base_path() . '/resources/acf';
            return $path;
        });

        /**
         * Register ACF load JSON filter.
         */
        add_filter('acf/settings/load_json', function($path): string {
            $path = base_path() . '/resources/acf';
            return $path;
        });
    
        /**
         * Adds an options page to the admin menu
         */
        add_action('acf/init', function () {
            if (function_exists('acf_add_options_page')) {
                acf_add_options_page([
                    'page_title' => 'Opties',
                    'menu_title' => 'Opties',
                    'menu_slug'  => 'site-options',
                    'capability' => 'edit_posts',
                    'redirect'   => false
                ]);
            }
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