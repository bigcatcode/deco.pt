<?php

function cptuisupport_override_ceventfeature( $args, $tax_slug, $orig_args ) {
    // We only want to affect these for one taxonomy, so return early if its not that one
    if ( 'noticias' !== $tax_slug ) {
        return $args;
    }

    // Add in our capabilities setting
    $args['capabilities'] = [
        'manage_terms' => 'manage_' . $tax_slug,
        'edit_terms'   => 'edit_' . $tax_slug,
        'delete_terms' => 'delete' . $tax_slug,
        'assign_terms' => 'assign_' . $tax_slug,
    ];
    
    return $args;
}
add_action( 'cptui_pre_register_taxonomy', 'cptuisupport_override_ceventfeature', 10, 3 );

function cptuisupport_override_explorars2( $args, $tax_slug, $orig_args ) {
    // We only want to affect these for one taxonomy, so return early if its not that one
    if ( 'explora' !== $tax_slug ) {
        return $args;
    }

    // Add in our capabilities setting
    $args['capabilities'] = [
        'manage_terms' => 'manage_' . $tax_slug,
        'edit_terms'   => 'edit_' . $tax_slug,
        'delete_terms' => 'delete' . $tax_slug,
        'assign_terms' => 'assign_' . $tax_slug,
    ];
    
    return $args;
}
add_action( 'cptui_pre_register_taxonomy', 'cptuisupport_override_explorars2', 10, 3 );


function add_noticias_manager_role(){
    add_role(
        'noticias_manager',
        'Noticias Manager',
        array(           
            'read_noticia' => true,
            'edit_noticia' => true,
            'delete_noticia' => true,
            'publish_noticia' => true,
            'read_private_noticia' => true,
            'read_conversas_digitais' => true,
            'edit_conversas_digitais' => true,
            'delete_conversas_digitais' => true,
            'publish_conversas_digitais' => true,
            'read_private_conversas_digitais' => true,
            'read_explorar' => true,
            'edit_explorar' => true,
            'delete_explorar' => true,
            'publish_explorar' => true,
            'read_private_explorar' => true,
            'upload_files' => true,
            'manage_categories' => true,
            'manage_noticias' => true,
            'manage_explora' => true,
            'assign_explora' => true,
            'assign_explora_terms' => true,
        )
    );
}
add_action( 'admin_init', 'add_noticias_manager_role', 4 );

function add_noticias_role_caps() {
    $roles = array('noticias_manager');
    foreach($roles as $the_role) {
        $role = get_role($the_role); 

        $role->add_cap( 'read_noticia' );
        $role->add_cap( 'read_noticias' );
        $role->add_cap( 'read_private_noticia' );
        $role->add_cap( 'read_private_noticias' );


        $role->add_cap( 'edit_noticia');
        $role->add_cap( 'edit_noticias');
        $role->add_cap( 'edit_private_noticia');
        $role->add_cap( 'edit_private_noticias');
        $role->add_cap( 'edit_published_noticias');
        $role->add_cap( 'edit_noticia_terms');
        $role->add_cap( 'edit_others_noticias');

        $role->add_cap( 'delete_noticia' );
        $role->add_cap( 'publish_noticia' );
        $role->add_cap( 'read_private_noticia' ); // assign_explorar_terms assign_explorars create_explorars delete_explorar_terms delete_explorars delete_private_explorars delete_published_explorars deleteexplorars edit_explorar_terms edit_explorars edit_others_explorars edit_private_explorars edit_published_explorars manage_explorar_terms publish_explorars read_private_explorars

        $role->add_cap( 'read_noticia' );
        $role->add_cap( 'read_noticias' );
        $role->add_cap( 'read_private_noticia' );
        $role->add_cap( 'read_private_noticias' );


        $role->add_cap( 'edit_conversas_digitais');
        $role->add_cap( 'edit_conversas_digitais');
        $role->add_cap( 'edit_private_conversas_digitais');
        $role->add_cap( 'edit_private_conversas_digitais');
        $role->add_cap( 'edit_published_conversas_digitais');
        $role->add_cap( 'edit_conversas_digitais_terms');
        $role->add_cap( 'edit_others_conversas_digitais');
        $role->add_cap( 'delete_conversas_digitais' );
        $role->add_cap( 'publish_conversas_digitais' );
        $role->add_cap( 'read_private_conversas_digitais' );
        $role->add_cap( 'manage_conversas_digitais' );


        $role->add_cap( 'read_explorar' );
        $role->add_cap( 'edit_explorar' );
        $role->add_cap( 'delete_explorar' );
        $role->add_cap( 'publish_explorar' );
        $role->add_cap( 'read_private_explorar' );

        $role->add_cap( 'manage_categories' );
        $role->add_cap( 'manage_noticias' );
        $role->add_cap( 'manage_explora' );
        $role->add_cap( 'assign_explora' );
        $role->add_cap( 'assign_explora_terms' );
        //$role->add_cap( 'assign_explora' );
        $role->add_cap( 'edit_explora' );
        $role->add_cap( 'edit_explora_terms' );
    }
}
add_action('admin_init', 'add_noticias_role_caps', 5 );



// Remove Categories and Tags
add_action('init', 'myprefix_remove_tax');
function myprefix_remove_tax() {
    if ( current_user_can('noticias_manager') ) { 
        register_taxonomy('category', array());
        register_taxonomy('post_tag', array());
    }
}

//Hide Categories and Tags
if ( current_user_can('noticias_manager') ) {
    function hide_post_page_options() {
        global $post;
        $hide_post_options = "<style type=\"text/css\"> .post-type-post.taxonomy-post_tag, .post-type-post.taxonomy-category { display: none; }</style>";
        print($hide_post_options);
    }
    //add_action( 'admin_head', 'hide_post_page_options'  );
}

// cursos_manager

// Remove Categories and Tags
add_action('init', 'cursos_manager_remove_tax');
function cursos_manager_remove_tax() {
    if ( current_user_can('cursos_manager') ) { 
        register_taxonomy('category', array());
        register_taxonomy('post_tag', array());
    }
}

function add_cursos_manager_role(){
    add_role(
        'cursos_manager',
        'Cursos Manager',
        array(           
            'read_curso' => true,
            'edit_curso' => true,
            'delete_curso' => true,
            'publish_curso' => true,
            'read_private_curso' => true,

            'upload_files' => true,

            'manage_categories' => true,
            'manage_cursos' => true,
            'assign_cursos' => true,
            'assign_curso_terms' => true,
        )
    );
}
add_action( 'admin_init', 'add_cursos_manager_role', 4 );


function add_cursos_manager_role_caps() {
    $roles = array('noticias_manager');
    foreach($roles as $the_role) {
        $role = get_role($the_role); 

        $role->add_cap( 'read_curso' );
        $role->add_cap( 'read_private_curso' );


        $role->add_cap( 'edit_curso');
        $role->add_cap( 'edit_private_curso');
        $role->add_cap( 'edit_published_curso');
        $role->add_cap( 'edit_others_curso');

        $role->add_cap( 'delete_curso' );
        $role->add_cap( 'publish_curso' );



        $role->add_cap( 'manage_categories' );
        $role->add_cap( 'manage_cursos' );

        $role->add_cap( 'assign_cursos' );
        $role->add_cap( 'assign_curso_terms' );

        $role->add_cap( 'edit_cursos' );
        $role->add_cap( 'edit_cursos_terms' );
    }
}
add_action('admin_init', 'add_cursos_manager_role_caps', 5 );

function cptuisupport_override_cursos( $args, $tax_slug, $orig_args ) {
    // We only want to affect these for one taxonomy, so return early if its not that one
    if ( 'cursos' !== $tax_slug ) {
        return $args;
    }

    // Add in our capabilities setting
    $args['capabilities'] = [
        'manage_terms' => 'manage_' . $tax_slug,
        'edit_terms'   => 'edit_' . $tax_slug,
        'delete_terms' => 'delete' . $tax_slug,
        'assign_terms' => 'assign_' . $tax_slug,
    ];
    
    return $args;
}
add_action( 'cptui_pre_register_taxonomy', 'cptuisupport_override_cursos', 10, 3 );
