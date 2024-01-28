<?php

namespace grp\classes;

// derectly access denied
defined('ABSPATH') || exit;

/**
 * Assets class create for loading assets file like css, js and image.
 * @version 1.0
 * @author Rubel Mahmud <vxlrubel@gmail.com>
 * @link https://github.com/vxlrubel
 */

 class Assets{

    public function __construct(){

        // register frontend script
        add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );

        // enqueue admin script
        add_action( 'admin_enqueue_scripts', [ $this, 'register_admin_scripts' ] );
    }

    /**
     * register admin script
     *
     * @return void
     */
    public function register_admin_scripts(){
        wp_enqueue_style(
            'grp-admin-style',
            GRP_ASSETS . 'admin/css/main.css',
            '',
            GRP_VERSION,
            'all'
        );

        wp_enqueue_script(
            'grp-admin-script',
            GRP_ASSETS . 'admin/js/custom.js',
            ['jquery'],
            GRP_VERSION,
            true
        );
    }

    /**
     * register script file
     *
     * @return void
     */
    public function register_scripts(){
        
        // get stylesheet
        $get_style   = $this->get_style();
        $get_scripts = $this->get_scripts();

        // enqueue style file
        foreach ( $get_style as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : '';
            wp_enqueue_style(
                $handle,
                $style['src'],
                $deps,
                GRP_VERSION,
                'all'
            );
        }

        // enqueue script file

        foreach ( $get_scripts as $handle => $script ){
            wp_enqueue_script(
                $handle,
                $script['src'],
                $script['deps'],
                GRP_VERSION,
                true
            );
        }
    }

    /**
     * get style file
     *
     * @return void
     */
    public function get_style(){
        return [
            'grp-style' => [
                'src' => GRP_ASSETS . 'css/main.css',
            ]
        ];
    }

    /**
     * get script file
     *
     * @return void
     */
    public function get_scripts(){
        return [
            'grp-script' => [
                'src'  => GRP_ASSETS . 'js/custom.js',
                'deps' => ['jquery'],
            ]
        ];

    }
 }