<?php


$terms = get_terms( [
	'taxonomy' => 'category', // explorar
	'hide_empty' => true,
] );
//var_dump( count($terms) /2);
?>


<div class="post-content un-no-sidebar-layout explorar-block">
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
												<span>EXPLORAR</span>
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

						<article class="col-lg-6">

							<div class="uncode-accordion wpb_accordion wpb_content_element" data-collapsible="no" data-target="" data-active-tab="1">
									<div class="panel-group wpb_wrapper wpb_accordion_wrapper" id="accordion_867865580" role="tablist" aria-multiselectable="true">


										<?php foreach ($terms as $key => $term) : ?>

											<?php if ( $key < round(count($terms)/2) ): ?>
												<div class="panel panel-default wpb_accordion_section group">
													<div class="panel-heading wpb_accordion_header ui-accordion-header termcolor-<?php echo $key; ?>" role="tab">
														<p class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion_867865580" href="#term-<?php echo $term->term_id;?>" class="">
																<span><?php echo $term->name; ?></span>
															</a>
														</p>
													</div>
													<div id="term-<?php echo $term->term_id; ?>" class="panel-collapse collapse" role="tabpanel" style="height: 0px;">
														<div class="panel-body wpb_accordion_content ui-accordion-content half-internal-gutter single-block-padding">
															<?php 

																$args = array(
																  'post_type'      => 'post', // explorar 
																  'post_status' => 'publish',
																  'order'       => 'DESC',
																  'orderby'     => 'date',
																  'posts_per_page' => 6,
																  'tax_query' => array(
																        [
																            'taxonomy' => 'category', // explorar 
																            'terms' => $term->term_id,
																        ],
																   ),
																);

																$the_query = new WP_Query( $args );

																	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

																		<div class="post-wraper <?php echo $post->ID; ?>">
																			<a href="<?php echo get_the_permalink( $post->ID); ?>">
																				<?php echo $post->post_title; ?>
																			</a>
																		</div>

																	<?php
																	endwhile;

																wp_reset_postdata();
																wp_reset_query();
															?>
														</div>
													</div>
												</div>
											<?php endif; ?>

										<?php endforeach; ?>

									</div>
								</div>


						</article>

						<article class="col-lg-6">
							<div class="uncode-accordion wpb_accordion wpb_content_element" data-collapsible="no" data-target="" data-active-tab="1">
									<div class="panel-group wpb_wrapper wpb_accordion_wrapper" id="accordion_867865580_" role="tablist" aria-multiselectable="true">


										<?php foreach ($terms as $key => $term) : ?>

											<?php if ( $key >= round(count($terms)/2) ): ?>
												<div class="panel panel-default wpb_accordion_section group">
													<div class="panel-heading wpb_accordion_header ui-accordion-header termcolor-<?php echo $key; ?>" role="tab">
														<p class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion_867865580_" href="#term-<?php echo $term->term_id;?>" class="">
																<span><?php echo $term->name; ?></span>
															</a>
														</p>
													</div>
													<div id="term-<?php echo $term->term_id; ?>" class="panel-collapse collapse" role="tabpanel" style="height: 0px;">
														<div class="panel-body wpb_accordion_content ui-accordion-content half-internal-gutter single-block-padding">
															<?php 

																$args = array(
																  'post_type'      => 'post', // explorar 
																  'post_status' => 'publish',
																  'order'       => 'DESC',
																  'orderby'     => 'date',
																  'posts_per_page' => 6,
																  'tax_query' => array(
																        [
																            'taxonomy' => 'category', // explorar 
																            'terms' => $term->term_id,
																        ],
																   ),
																);

																$the_query = new WP_Query( $args );

																	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

																		<div class="post-wraper <?php echo $post->ID; ?>">
																			<a href="<?php echo get_the_permalink( $post->ID); ?>">
																				<?php echo $post->post_title; ?>
																			</a>
																		</div>

																	<?php
																	endwhile;

																wp_reset_postdata();
																wp_reset_query();
															?>
														</div>
													</div>
												</div>
											<?php endif; ?>

										<?php endforeach; ?>

									</div>
								</div>							
						</article>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>





