<?php
function custom_child_scripts() {

	if ( is_singular('curso') ) {

		// slider
		wp_enqueue_style(
			'swiper_min_style', 
			CORE_URL . '/js/swiper/swiper-bundle.min.css',
			array(),
			rand()
		);

		wp_enqueue_script(
		    'swiper_min_js',
		    CORE_URL . '/js/swiper/swiper-bundle.min.js',
	        array('jquery'), 
	        rand(),
	        true  
		);

		wp_enqueue_script(
		    'custom_curso_js',
		    CORE_URL . '/js/custom_curso.js',
	        array('jquery','swiper_min_js'), 
	        rand(),
	        true  
		);

		wp_enqueue_style(
			'custom_curso_style', 
			CORE_URL . '/css/custom_curso_style.css',
			array(),
			rand()
		);

	}


	wp_enqueue_style(
		'custom_core_style', 
		CORE_URL . '/css/custom_core_style.css',
		array(),
		rand()
	);

	wp_enqueue_style(
		'adaptive', 
		CORE_URL .  '/css/adaptive.css',
		array('custom_core_style'),
		rand()
	);

	wp_enqueue_script(
	    'custom_core',
	    CORE_URL . '/js/custom_core.js',
        array('jquery'), 
        rand(),
        true  
	);

	wp_localize_script( 'custom_script', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	
	if ( 	is_page_template('template-home.php') 
		||  is_page_template('template-noticia.php') 
		||  is_page_template('template-divulgar.php') 
		||  is_page_template('template-explorar.php')
		||  is_page_template('template-conversas_digitais.php')
		||  is_tax('explora')
	) {

		// slider
		wp_enqueue_style(
			'swiper_min_style', 
			CORE_URL . '/js/swiper/swiper-bundle.min.css',
			array(),
			rand()
		);

		wp_enqueue_script(
		    'swiper_min_js',
		    CORE_URL . '/js/swiper/swiper-bundle.min.js',
	        array('jquery'), 
	        rand(),
	        true  
		);

		// tui-pagination JS
		wp_enqueue_style(
			'tui_css', 
			CORE_URL . '/js/tui-pagination/tui-pagination.min.css',
			array(),
			rand()
		);

		
		wp_enqueue_script ( 
			"tui-pagination_js", 
			CORE_URL . '/js/tui-pagination/tui-pagination.min.js', 
			array ('jquery'), 
			rand(), 
			true 
		);

		// popup JS
		wp_enqueue_style(
			'magnific-popup_css', 
			CORE_URL . '/js/magnific-popup/magnific-popup.css',
			array(),
			rand()
		);

		
		wp_enqueue_script ( 
			"magnific-popup_js", 
			CORE_URL . '/js/magnific-popup/jquery.magnific-popup.min.js', 
			array ('jquery'), 
			rand(), 
			true 
		);

		// hoome all
		wp_enqueue_style(
			'custom_home_style', 
			CORE_URL . '/css/custom_home_style.css',
			array(),
			rand()
		);

		wp_enqueue_script(
		    'custom_home_js',
		    CORE_URL . '/js/custom_home.js',
	        array('jquery'), 
	        rand(),
	        true  
		);

		wp_localize_script( 'custom_home_js', 'js_url', 
            array( 
                'ajaxurl' => admin_url( 'admin-ajax.php' )
                 )
        );		
	}

	
	
}
add_action( 'wp_enqueue_scripts', 'custom_child_scripts' ); 

function custom_admin_theme_style() {
    wp_enqueue_style('custom-admin-style', CORE_URL .'/css/custom_admin_style.css', array(), rand());
    //wp_enqueue_script('custom_admin_script',  CORE_URL . '/js/custom_admin_js.js', array('jquery'), rand(), true );

}
//add_action('admin_enqueue_scripts', 'custom_admin_theme_style');