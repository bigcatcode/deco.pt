<?php


$page = 1;
$itemsPerPage = 3;

$args = array(
  'post_type'      => 'conversas_digitais', // explorar // noticia // divulgar
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


<div class="post-content un-no-sidebar-layout noticias-block conversas_digitais-block">
	<div data-parent="true" class="vc_row row-container" id="row-unique-999" data-section="0">
		<div class="row limit-width row-parent" data-imgready="true">
			<div class="wpb_row row-inner">
				<div class="wpb_column pos-top pos-center align_left column_parent col-lg-3/5 half-internal-gutter">
					
					<div class="uncol style-light">
						<div class="uncoltable">
							<div class="uncell no-block-padding">
								<div class="uncont">
									<div class="vc_custom_heading_wrap ">
										<div class="heading-text el-text">
											<h2 class="h2 fontspace-210350 text-color-jevc-color">
												<span>CONVERSAS DIGITAIS</span>
											</h2>
										</div>
										<div class="clear"></div>
									</div>
									<div class="divider-wrapper ">
									    <hr class="border-color-jevc-color_ separator-no-padding">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row noticas-wraper">

						<div id="conversas_digitais_result" class="ajax_search_result">

							<?php 

								while ( $the_query->have_posts() ) : $the_query->the_post();

									get_template_part('template-parts/loop', 'divulgar');

								endwhile;

							?>

<!-- 							<div id="services-loader" class="spinner-border" role="status">
								<span class="sr-only">Loading...</span>
							</div> -->
		
							<article class="col-xs-12 col-lg-12 pagination_wrap">
								<div class="resource-nav-pagination-filter6 <?php echo $pagination_hide; ?> tui-pagination" id="resource-nav-pagination-filter6"></div>
							</article> 
							<div class="pagination_text">
								<a href="<?php echo home_url( '/conversas_digitais/' ); ?>">ver todos os destaques</a>
							</div>		

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

         window['resource_nav_pagination-filter6'] = new tui.Pagination(document.getElementById('resource-nav-pagination-filter6'), {
              totalItems: <?php echo $total; ?>,
              itemsPerPage: <?php echo $itemsPerPage; ?>,
              visiblePages: 3,
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

        window['resource_nav_pagination-filter6'].on('beforeMove', function(e) {
            var page = e.page;
            
            if ( page ) {
              console.log( parseInt(page) );



                $('#conversas_digitais_result').css({
                    'opacity': 0.3
                });
                //$('#services-loader').show();

                 $.ajax({
                        type    : "POST",
                        url     : js_url.ajaxurl,
                        dataType: "json",
                        data    : "action=get_conversas_digitais&page="+page+"",
                        success : function (a) {
                            console.log(a);

                            $('#conversas_digitais_result').html(a.content).css({
                                'opacity': '1'
                            });
                            //$('#services-loader').hide();


                            var destination = $('#conversas_digitais_result').offset().top - 150;
                            $('body,html').animate({scrollTop: destination}, 400);

              
                        }

                }); //end ajax   




            }    
          }); 

    });
</script>



