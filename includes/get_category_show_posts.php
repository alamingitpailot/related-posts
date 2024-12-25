<?php
namespace ALRP_Related_Posts;
if ( !defined('ABSPATH') ) { exit;}

class get_category_show_posts {

    public function __construct()
    {
        add_filter('the_content', array( $this, 'the_content')); 
    }

    public function the_content($contents) { 
        if( !is_singular('post')){
            return $contents;
        }

        // get current post categories
        $terms = wp_get_post_terms(get_the_ID(), 'category');

        // store taxonomy id 
        $terms_list = [];
        foreach($terms as $term){
            $terms_list[] = $term->term_id;
        }

        // get_posts args 
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'category__in' => $terms_list,
            'orderby'  => 'rand',
            'post_status' => 'publish',
            'exclude' => [get_the_ID()]
        );

        // query get_posts 
        $posts = get_posts( $args );
        ob_start();
        require_once ALRP_PLUGIN_PATH . 'templates/category.php';
        require_once ALRP_PLUGIN_PATH . 'templates/posts.php';
        $html = ob_get_clean();
        return $contents . $html;
    }
}