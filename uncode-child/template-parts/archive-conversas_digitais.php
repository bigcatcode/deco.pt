<?php


$args_t = [
	'taxonomy'      => [ 'category' ], // noticias
	'orderby'       => 'id',
	'order'         => 'ASC',
	'hide_empty'    => false,
];

$terms = get_terms( $args_t );

if ( isset($_GET['category']) ) {
	$cat = $_GET['category'];
	$showall = '';
} else {
	$showall = 'active';	
}

$page = 1;
$itemsPerPage = 12;

$args = array(
  'post_type'      => 'conversas_digitais',  // divulgar
  'post_status' => 'publish',
  'order'       => 'DESC',
  'orderby'     => 'date',
  'posts_per_page' => $itemsPerPage,
  'paged'	=> $page,
);

$the_query = new WP_Query( $args );

$total = $the_query->found_posts;

if ( $total < $itemsPerPage ) {
	$pagination_hide = 'pagination_hide';
} else {
	$pagination_hide = '';
}

?>



<div data-parent="true" class="vc_row style-color-lxmt-bg row-container" id="row-unique-0" data-section="0">
	<div class="row single-top-padding double-bottom-padding single-h-padding limit-width row-parent" data-imgready="true">
		<div class="wpb_row row-inner">
			<div class="wpb_column pos-top pos-center align_left column_parent col-lg-12 single-internal-gutter">
				<div class="uncol style-light">
					<div class="uncoltable">
						<div class="uncell no-block-padding">
							<div class="uncont">
								<div id="index-15588655905" class="isotope-system isotope-general-light grid-general-light isotope-processed">
									<div class="isotope-filters grid-filters menu-container has-cat-filters menu-animated half-gutter submenu-light  text-uppercase menu-light">
										<div class="menu-horizontal text-center text-mobile-center filter-alignment-center ">
																							
																							
											<ul class="menu-smart sm text-uppercase menu-smart--filter-cats " data-smartmenus-id="16913235874376055">
												
												<li class="filter-show-all">
													<span>
														<a href="<?php echo home_url( '/conversas_digitais/'); ?>" data-id="" class="<?php echo $showall; ?> isotope-nav-link grid-nav-link">Mostrar todas</a>
													</span>
												</li>
																				
												<?php foreach( $terms as $term ) : ?>

													<?php 
														if ($term->term_id == $cat ) {
															$active = 'active';
														} else {
															$active = '';
														}
													?>

													<li class="filter-cat-<?php echo $term->term_id; ?> filter-cat">
														<span>
															<a href="<?php echo home_url( '/conversas_digitais?category='.$term->term_id); ?>" data-id="<?php echo $term->term_id; ?>" class="<?php echo $active; ?> conversas_digitais-filter-link isotope-nav-link grid-nav-link"><?php echo $term->name; ?></a>
														</span>
													</li>
																																
												<?php endforeach; ?>
											</ul>

											<div id="divulgar_result">
												
													<div class="post-content un-no-sidebar-layout noticias-block-2">
														<div data-parent="true" class="vc_row row-container" id="row-unique-999" data-section="0">
															<div class="row limit-width row-parent" data-imgready="true">
																<div class="wpb_row row-inner">
																	<div class="wpb_column pos-top pos-center align_left column_parent col-lg-3/5 half-internal-gutter">
																		


																		<div class="row noticas-wraper">

																			<div id="noticas_result" class="ajax_search_result">

																				<?php 

																					while ( $the_query->have_posts() ) : $the_query->the_post();

																						get_template_part('template-parts/loop', 'divulgar');

																					endwhile;

																				?>

																				<div id="services-loader" class="spinner-border" role="status">
																					<span class="sr-only">Loading...</span>
																				</div>
															
																				<article class="col-xs-12 col-lg-12 pagination_wrap">
																					<div class="resource-nav-pagination-filter <?php echo $pagination_hide; ?> tui-pagination" id="resource-nav-pagination-filter"></div>
																				</article> 
															

																			</div>

																		</div>

																	</div>
																</div>
															</div>
														</div>
													</div>

													<script>
														jQuery(document).ready(function($) {

															//var page = e.page;

													         window['resource_nav_pagination-filter'] = new tui.Pagination(document.getElementById('resource-nav-pagination-filter'), {
													              totalItems: <?php echo $total; ?>,
													              itemsPerPage: <?php echo $itemsPerPage; ?>,
													              visiblePages: 12,
													              centerAlign: true,
													              page: <?php echo $page; ?>,
													            template: {
													                page: '<a href="#" class="tui-page-btn locate-anything-page-nav" data-page="{{page}}">{{page}}</a>',
													                currentPage: '<strong class="tui-page-btn tui-is-selected locate-anything-page-nav" data-page="{{page}}">{{page}}</strong>',
													                moveButton:
													                    '<a href="#" class="tui-page-btn tui-{{type}} custom-class-{{type}}">' +
													                        '<span class="tui-ico-{{type}}">{{type}}</span>' +
													                    '</a>',
													                disabledMoveButton:
													                    '<span class="tui-page-btn tui-is-disabled tui-{{type}} custom-class-{{type}}">' +
													                        '<span class="tui-ico-{{type}}">{{type}}</span>' +
													                    '</span>',
													                moreButton:
													                    '<a href="#" class="tui-page-btn tui-{{type}}-is-ellip custom-class-{{type}}">' +
													                        '<span class="tui-ico-ellip">...</span>' +
													                    '</a>'
													            }              
													          });

													        window['resource_nav_pagination-filter'].on('beforeMove', function(e) {
													            var page = e.page;
													            
													            if ( page ) {
													              console.log( parseInt(page) );



													                $('#noticas_result').css({
													                    'opacity': 0.3
													                });
													                $('#services-loader').show();

													                 $.ajax({
													                        type    : "POST",
													                        url     : js_url.ajaxurl,
													                        dataType: "json",
													                        data    : "action=get_conversas_digitais-filter&page="+page+"",
													                        success : function (a) {
													                            console.log(a);

													                            $('#noticas_result').html(a.content).css({
													                                'opacity': '1'
													                            });
													                            $('#services-loader').hide();


													                            var destination = $('#noticas_result').offset().top - 150;
													                            $('body,html').animate({scrollTop: destination}, 400);

													              
													                        }

													                }); //end ajax   




													            }    
													          }); 

													    });
													</script>

											</div>

										</div>
									</div>	
								</div>							
							</div>
						</div>	
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>	
							
					
								
