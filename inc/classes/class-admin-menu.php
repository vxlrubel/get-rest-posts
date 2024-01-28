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
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ad quibusdam consequatur quod excepturi eaque obcaecati sapiente fugiat blanditiis laboriosam modi, officiis sit quae hic. Harum accusantium assumenda sed quisquam non cupiditate corrupti quae, molestiae, omnis id minus, ipsam animi autem dolor laboriosam eum sit atque similique aliquam possimus beatae?
                </div>
            </div>
        </div>
        <?php
    }
 }