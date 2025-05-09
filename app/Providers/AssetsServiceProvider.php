<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use function Roots\bundle;

class AssetsServiceProvider extends ServiceProvider
{
    /**
     * Register assets services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Register the theme assets.
         *
         * @return void
         */
        add_action('wp_enqueue_scripts', function (): void {
            bundle('app')->enqueue();
            wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . env('GOOGLE_MAPS_KEY') . "&loading=async&libraries=marker", [], null, true);

            remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
        }, 100);

        /**
         * Register the theme assets with the block editor.
         *
         * @return void
         */
        add_action('enqueue_block_editor_assets', function (): void {
            bundle('editor')->enqueue();
        }, 100);

        /**
         * Add the type="module" attribute to script tags that have the .mjs extension.
         *
         * @param  string $tag
         * @return string
         */
        add_filter('script_loader_tag', function (string $tag): string {
            $hasModuleExtension = str_contains($tag, '.mjs"');

            $hasModuleAttribute = ! empty(array_filter(
                ['type="module"', 'type=module', "type='module'"],
                fn ($value) => str_contains($tag, $value)
            ));

            if (! $hasModuleExtension || $hasModuleAttribute) {
                return $tag;
            }

            return str_replace(' src=', ' type=module src=', $tag);
        }, 10, 2);

        /**
         * Use theme.json from the build directory
         *
         * @param  string $path
         * @param  string $file
         * @return string
         */
        add_filter('theme_file_path', function (string $path, string $file): string {
            if ($file === 'theme.json') {
                return public_path() . '/dist/theme.json';
            }

            return $path;
        }, 10, 2);

        /**
         * Remove default theme.json styles and use custom theme.json file path.
         *
         * @link   https://developer.wordpress.org/block-editor/reference-guides/filters/global-styles-filters/
         * @return void
         */
        add_filter('wp_theme_json_data_default', function (\WP_Theme_JSON_Data $themeJson): \WP_Theme_JSON_Data {
            $themeJsonFile = public_path('/dist/theme.json');
            if (!file_exists($themeJsonFile)) {
                return $themeJson;
            }

            $decodedData = wp_json_file_decode($themeJsonFile, ['associative' => true]);
            if (!is_array($decodedData) || empty($decodedData)) {
                return $themeJson;
            }

            return new \WP_Theme_JSON_Data($decodedData, 'default');
        }, 100);
    }
}
