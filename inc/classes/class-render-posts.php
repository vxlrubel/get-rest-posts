<?php

namespace grp\classes;

// derectly access denied
defined('ABSPATH') || exit;

/**
 * This class use for render the posts
 * @version 1.0
 * @author Rubel Mahmud <vxlrubel@gmail.com>
 * @link https://github.com/vxlrubel
 */

 class Render_Posts{
    public function __construct(){
        add_shortcode( 'get_rest_posts', [ $this, 'render_posts' ] );
    }

    /**
     * render posts from post type posts and status publish
     *
     * @return void
     */
    public function render_posts( $atts ){
        $pairs = [
            'page'     => 1,
            'per_page' => 5
        ];
        $atts      = shortcode_atts( $pairs, $atts, 'get_rest_posts' );
        $cache_key = 'get_rest_posts_' . md5(serialize($atts));
        $posts     = wp_cache_get($cache_key, 'get_rest_posts');

        if ( $posts === false ){
            $api_url  = home_url( 'wp-json/wp/v2/posts' );
            $api_url .= "?page={$atts['page']}&per_page={$atts['per_page']}";

            $response = wp_remote_get( $api_url );



            if ( is_wp_error( $response ) ){
                return 'Error fetching posts.';
            }

            $posts = json_decode(wp_remote_retrieve_body($response), true );

            // Cache the retrieved posts for a specified duration (e.g., 1 hour)
            wp_cache_set($cache_key, $posts, 'get_rest_posts', 3600);

        }


        $rendered_post  = "<div class=\"grp-rendered-posts\">\n";

        if ( count( $posts ) > 0 ){
            foreach ( $posts as $post ) {
                if ( $post['status'] == 'publish' ){

                    $title         = $post['title']['rendered'];
                    $permalink     = $post['link'];
                    $thumbnail_url = get_the_post_thumbnail_url( $post['id'] );
                    $excerpt       = $post['excerpt']['rendered'];

                    $rendered_post .= '
                        <div class="rendered-posts">
                            <div class="grp-thumb">
                                <img src="' . esc_html( $thumbnail_url ) . '" alt="image">
                            </div>
                            <div class="grp-details">
                                <h2>' . esc_html( $title ) . '</h2>
                                <p>' .  wp_kses_post( $excerpt ). '</p>
                                <a href="'. esc_url( $permalink ) .'">Read More</a>
                            </div>
                        </div>
                    ';

                }
            }    
        }else{
            $rendered_post .= sprintf('<h2 class="grp-no-post-found">%s</h2>', esc_html__( 'No Post Found.', 'get-rest-posts' ) );
        }

        $rendered_post .= "<div>\n";

        return $rendered_post;

        
    }
 }