<?php
add_action( 'template_redirect', 'wpse_128636_redirect_post' );

function wpse_128636_redirect_post() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'divulgar' ==  $queried_post_type ) {
    wp_redirect( home_url('/divulgar/') );
    exit;
  }
}

add_action( 'template_redirect', 'wpse_128636_redirect_post_org_archive' );

function wpse_128636_redirect_post_org_archive() {
  $queried_post_type = get_query_var('post_type');
  if ( is_post_type_archive('divulgar') ) {
    wp_redirect( home_url('/divulgar/') );
    exit;
  }
}

add_action( 'template_redirect', 'wpse_128636_redirect_post_conversas_digitais' );

function wpse_128636_redirect_post_conversas_digitais() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'conversas_digitais' ==  $queried_post_type ) {
    wp_redirect( home_url('/conversas_digitais/') );
    exit;
  }
}

add_action( 'template_redirect', 'wpse_128636_redirect_post_org_archive_conversas_digitais' );

function wpse_128636_redirect_post_org_archive_conversas_digitais() {
  $queried_post_type = get_query_var('post_type');
  if ( is_post_type_archive('conversas_digitais') ) {
    wp_redirect( home_url('/conversas_digitais/') );
    exit;
  }
}