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

//  directly access denied
 defined('ABSPATH') || exit;

 use grp\classes\Assets;
 use grp\classes\Render_Posts;
 use grp\classes\Admin_Menu;
 
 //  include autoload file
 if ( file_exists( dirname(__FILE__) . '/inc/autoload.php' ) ){
    require_once dirname(__FILE__) . '/inc/autoload.php';
 }

 final class Get_Rest_Posts{
    
    private static $instance;

    // set plugin version
    private static $version = '1.0.0';

    public function __construct(){

        // define constant
        $this->define_constant();

        // check wp version
        add_action( 'admin_init', [ $this, 'check_wp_version' ] );

        // register text domain
        add_action( 'plugins_loaded', [ $this, 'register_text_domain' ] );

        // enaueue assets
        new Assets;

        // render posts
        new Render_Posts;

        // create admin menu
        new Admin_Menu; 
    }

    /**
     * register text domain
     *
     * @return void
     */
    public function register_text_domain(){
        load_plugin_textdomain( 
            'get-rest-posts',
            false,
            dirname( plugin_basename( __FILE__ ) ) . trailingslashit( '/lang' )
        );
    }

    /**
     * check WordPress version
     *
     * @return void
     */
    public function check_wp_version(){
        
        if ( version_compare( get_bloginfo( 'version' ), '5.2', '<') ){
            add_action( 'admin_notices', [ $this, 'wp_version_notice'] );
        }
    }

    /**
     * display wp version notice
     *
     * @return void
     */
    public function wp_version_notice(){
        $text = 'Get Rest Posts plugin requires WordPress version 5.2 or above. Please update your WordPress installation.';

        printf(
            '<div class="notice notice-warning is-dismissible"><p>%s</p></div>',
            esc_html__( $text, 'get-rest-posts' )
        );
    }

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

    /**
     * define constact
     *
     * @return void
     */
    public function define_constant(){
        define( 'GRP_VERSION', self::$version );
        define( 'GRP_ASSETS', trailingslashit( plugins_url( 'assets', __FILE__ ) ) );
        define( 'GRP_ASSETS_IMG', trailingslashit( GRP_ASSETS . 'img' ) );
    }
 }

 function get_rest_posts(){
    return Get_Rest_Posts::init();
 }
 get_rest_posts();