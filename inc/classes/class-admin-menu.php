<?php

namespace grp\classes;

// derectly access denied
defined('ABSPATH') || exit;

/**
 * Create admin menu
 * @version 1.0
 * @author Rubel Mahmud <vxlrubel@gmail.com>
 * @link https://github.com/vxlrubel
 */

 class Admin_Menu{

    public function __construct(){
        add_action( 'admin_menu', [ $this, 'admin_menu'] );
    }

    /**
     * admin menu page
     *
     * @return void
     */
    public function admin_menu(){
        add_menu_page(
            esc_html__( 'Get Rest Posts', 'get-rest-posts' ),
            esc_html__( 'Get Rest Posts', 'get-rest-posts' ),
            'manage_options',
            'get-rest-posts',
            [ $this, 'render_page_content' ],
            'dashicons-text-page',
            25
        );
    }

    /**
     * render page content
     *
     * @return void
     */
    public function render_page_content(){
        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline">Get Rest Posts</h1>
            <hr class="wp-header-end">
        </div>
        <?php
    }
 }