<?php

add_filter('body_class','add_custom_body_class', 99 );
function add_custom_body_class( $classes ) {

    // if( is_post_type_archive( 'odor_reports' ) ) {
    //    $classes[] = 'archive_odor_reports_template';
    // }
    // if(is_archive() && get_post_type() == 'odor_reports'){

    //     $classes[] = 'archive_odor_reports_template';
    // }
    // else if(is_single() && get_post_type() == 'odor_reports'){

    //     $classes[] = 'single_odor_reports_template';
    // }
    // else if(is_page_template('template-add-new-odor-reports.php')) {

    // 	$classes[] = 'template_odor_reports_template';
    // }
    // else 
    
    if ( is_singular( 'page' ) ) {
        global $post;
        $classes[] = 'pagename-' . $post->post_name;
    }

    // if ( is_user_logged_in() ) {
    //     $classes[] = 'user_logged_in_now';
    // }

    // global $post;

    // if ( is_product() ) {
    //         $terms = get_the_terms( $post->ID, 'product_cat' );
    //         foreach ($terms as $term) {
    //             $classes[] = 'product_cat-' . $term->name;
    //         }
    // }
    
    return $classes;
}