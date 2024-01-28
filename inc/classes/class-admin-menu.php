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
     * update form fields
     *
     * @return void
     */
    private function update_form_fields(){
        if ( isset( $_REQUEST['set_title'] ) && ! empty( $_REQUEST['set_title'] ) && isset( $_REQUEST['post_per_page'] ) && ! empty( $_REQUEST['post_per_page'] ) ){
            $title = sanitize_text_field( esc_sql( $_REQUEST['set_title'] ) );
            $count = (int) sanitize_text_field( esc_sql( $_REQUEST['post_per_page'] ) );
            update_option( '_set_grp_title', $title );
            update_option( '_set_grp_count', $count );

            printf('<div class="notice notice-success is-dismissible"><p>%s</p></div>', 'Update successfull.' );
        }
    }

    /**
     * render page content
     *
     * @return void
     */
    public function render_page_content(){
        $this->update_form_fields();
        $action_url = $_SERVER['PHP_SELF'] . '?page=get-rest-posts';
        $get_title  = get_option( '_set_grp_title', 'Latest Post' );
        $get_count  = get_option( '_set_grp_count', 10 );
        ?>
        <div class="wrap grp-wrap">
            <h1 class="wp-heading-inline">Get Rest Posts</h1>
            <hr class="wp-header-end">

            <div class="inner-wrap">
                <div class="options">
                    <form action="<?php echo $action_url; ?>" method="POST">
                        <p>
                            <label>
                                Set the title:
                                <input type="text" class="widefat" name="set_title" value="<?php echo esc_attr( $get_title );?>">
                            </label>
                        </p>
                        <div class="counter-parent">
                            <label for="post-per-page">Posts Per Page:</label>
                            <div class="grp-count">
                                <a href="javascript:void(0)" class="minus">
                                    <span class="dashicons dashicons-minus"></span>
                                </a>
                                <input type="number" step="1" min="5" max="50" id="post-per-page" name="post_per_page" value="<?php echo esc_attr( $get_count ); ?>">
                                <a href="javascript:void(0)" class="plus">
                                    <span class="dashicons dashicons-plus-alt2"></span>
                                </a>
                            </div>
                        </div>
                        <p class="submit">
                            <input type="submit" class="button button-primary" value="Save Changes">
                        </p>
                    </form>
                </div>
                <div class="author-info">
                    <img src="https://github.com/vxlrubel/vxlrubel/raw/main/assets/rubel-mahmud.jpg" alt="Rubel Mahmud">
                    <h2>Author Information</h2>
                    <p>
                        <strong>Name: </strong> <span>Rubel Mahmud</span>
                    </p>
                    <p>Hi, I am a professional WordPress developer. I have created so many plugins and themes for my clients. If you like my plugin then hire me for your project.</p>
                    <h4>Connect with:</h4>
                    
                    <div class="social">
                        <a href="https://www.facebook.com/rubel.ft.me" target="_blank"><span class="dashicons dashicons-facebook-alt"></span></a>
                        <a href="https://www.linkedin.com/in/vxlrubel/" target="_blank"><span class="dashicons dashicons-linkedin"></span></a>
                        <a href="https://twitter.com/vxlrubel" target="_blank"><span class="dashicons dashicons-twitter"></span></a>
                        <a href="https://www.instagram.com/vxlrubel/" target="_blank"><span class="dashicons dashicons-instagram"></span></a>
                        <a href="https://www.reddit.com/user/vxlrubel" target="_blank"><span class="dashicons dashicons-reddit"></span></a>
                        <a href="https://api.whatsapp.com/send?phone=8801625601619&amp;text=Hi, Rubel!" target="_blank"><span class="dashicons dashicons-whatsapp"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
 }