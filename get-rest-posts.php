<?php
/*
 * Plugin Name:       Get Rest Posts
 * Plugin URI:        https://github.com/vxlrubel/get-rest-posts
 * Description:       A powerful and flexible WordPress plugin that allows you to effortlessly retrieve and display posts using the WordPress REST API. Seamlessly integrate dynamic content from your WordPress site into any page or post by simply using the provided shortcode. Customize the number of posts and implement pagination to create a user-friendly browsing experience. With "Get Rest Posts," unlock the potential to showcase your latest content dynamically with ease.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rubel Mahmud ( Sujan )
 * Author URI:        https://www.linkedin.com/in/vxlrubel/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       get-rest-posts
 * Domain Path:       /lang
 */

 final class Get_Rest_Posts{
    
    private static $instance;

    public function __construct(){}

    /**
     * get instance
     *
     * @return void
     */
    public static function init(){
        if ( is_null( self::$instance ) ){
            self::$instance = new self();
        }
        return self::$instance;
    }
 }

 function get_rest_posts(){
    return Get_Rest_Posts::init();
 }
 get_rest_posts();