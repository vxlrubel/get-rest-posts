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
        <div class="wrap grp-wrap">
            <h1 class="wp-heading-inline">Get Rest Posts</h1>
            <hr class="wp-header-end">

            <div class="inner-wrap">
                <div class="options">
                    <form action="">
                        <p>
                            <label>
                                Set the title:
                                <input type="text" class="widefat" name="set_title">
                            </label>
                        </p>
                        <div class="counter-parent">
                            <label for="post-per-page">Posts Per Page:</label>
                            <div class="grp-count">
                                <a href="javascript:void(0)"><span class="dashicons dashicons-minus"></span></a>
                                <input type="number" min="5" max="50" id="post-per-page" name="post_per_page">
                                <a href="javascript:void(0)"><span class="dashicons dashicons-plus-alt2"></span></a>
                            </div>
                        </div>
                        <p class="submit">
                            <input type="submit" class="button button-primary" value="Save Changes">
                        </p>
                    </form>
                </div>
                <div class="author-info">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ad quibusdam consequatur quod excepturi eaque obcaecati sapiente fugiat blanditiis laboriosam modi, officiis sit quae hic. Harum accusantium assumenda sed quisquam non cupiditate corrupti quae, molestiae, omnis id minus, ipsam animi autem dolor laboriosam eum sit atque similique aliquam possimus beatae?
                </div>
            </div>
        </div>
        <?php
    }
 }