
	<?php get_header(); ?>
	
	<div id="page-wrap">
		<?php 
			
			//this is the option on the page options
			//$pegasus_container_choice = get_post_meta( get_the_ID(), 'pegasus-page-container-checkbox', true ); 
			//this is the option from the theme options for global fullwidth
			//$full_container_chk_choice =  pegasus_theme_get_option('full_container_chk' ); 
			
			//$meta2 = get_post_meta($post->ID); 
			//echo "<pre>";  var_dump($meta2); echo "</pre><hr>";  
			//echo $pegasus_container_choice;
		?>
		
		<div class="<?php /* if($full_container_chk_choice === 'on') { 
										echo 'container-fluid'; 
									}elseif ($pegasus_container_choice === 'on') { 
										echo 'container-fluid'; 
									}else{
										echo 'container';
									} */ ?> container">
		<!-- Example row of columns -->
			<div class="row">
				
				<div class="inner-content">	
					
					
					<div class="content-no-sidebar clearfix">
						
						<?php 
							
							
							$categories = get_the_category( $post->ID ); 
							foreach($categories as $cat) : 
						?>
							
							<?php 
								$query = new WP_Query(array( 
									'post_type' => array( 'post' ),
									//'tagportfolio'          => 'featured',
									//'term'=>$term->slug,
									'posts_per_page' => -1,
									//'order'                  => 'DESC',
									//'orderby'                => 'date'
									"category_name"	=>	$cat->slug,
								) );
								
								$posts_count = 1;
								//echo "<pre>";  var_dump($cat); echo "</pre><hr>";  
								$category_id = get_cat_ID( $cat->cat_name );

								// Get the URL of this category
								$category_link = get_category_link( $category_id );
								
							?>
							<h2 class="cat-year"><?php echo $cat->cat_name ?></h2>
							<section class="meow-we-talkin-timeline cd-timeline">
								
								<?php
									while ( $query->have_posts() ) : $query->the_post();
									++$posts_count;
								?>
									<?php
										if ( has_post_thumbnail() ) { 
											$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' ); 
										}/*else{
											$thumb_url = array( get_template_directory_uri() . "/images/banner.png", "1");
										}*/
									?>
									<?php 
										//conditional for even
										if($posts_count % 2): 
									?>
										<!--odd -->
										<article class="article-<?php the_ID(); ?> cd-timeline-block right">
											<div class="cd-timeline-img  cd-picture">
												<?php  ?>
												<time datetime="<?php the_date('c'); ?>">
													<span class="mth"><?php print get_the_date( 'M' ); ?></span>
													<span class="day"><?php print get_the_date( 'j' ); ?></span>
												</time>
												<?php  ?>
											</div> <!-- cd-timeline-img -->
											
											
										
											<div class="inside-content cd-timeline-content">
												
												<h2 class="featured-title"><?php the_title(); ?></h2>  
												<?php if($thumb_url) { ?>	
													<a href="<?php the_permalink(); ?>" class="image-container" style="background: url('<?php echo $thumb_url[0];?>') center center no-repeat;">
												
													</a>
												<?php } ?>
												<!-- output the excerpt, and if no excerpt then output content-->
												<div class="timeline-featured-content ">
													<?php  
														$octane_excerpt = get_the_excerpt(); 
														if(isset($octane_excerpt)) { ?>
															<p>
																<?php 
																	$temporary_excerpt = substr(strip_tags($octane_excerpt), 0, 130);
																	echo $temporary_excerpt; 
																?>
															</p>
														<?php }else{  
															$more = 0; 
															$octane_content = get_the_content(); 
															$temporary = substr(strip_tags($octane_content), 0, 130); ?>
															<p>
																<?php echo $temporary; ?>
															</p>
													<?php }	?>
												</div>
												<span class="cd-date"><?php print get_the_date( 'M j Y' ); ?></span>
												<div class="timeline-footer clearfix">
													<a href="<?php the_permalink(); ?>" class="cd-read-more">Read more</a>
												</div>
												
											</div><!--inside content -->
											
											<div class="inside-content cd-timeline-content timeline-featured-image left">
												
												<?php if($thumb_url) { ?>	
													<a href="<?php the_permalink(); ?>" class="image-container" style="background: url('<?php echo $thumb_url[0];?>') center center no-repeat;">
												
													</a>
												<?php } ?>
												
											</div><!--inside content -->
											
										</article><!-- cd-timeline-block -->
										
									<?php else: ?>
										<!-- even -->
										<article class="article-<?php the_ID(); ?> cd-timeline-block left">
											<div class="cd-timeline-img cd-picture">
												<?php  ?>
												<time datetime="<?php the_date('c'); ?>">
													<span class="mth"><?php print get_the_date( 'M' ); ?></span>
													<span class="day"><?php print get_the_date( 'j' ); ?></span>
												</time>
												<?php ?>
											</div> <!-- cd-timeline-img -->
											
											
										
											<div class="inside-content cd-timeline-content">
												
												<h2 class="featured-title"><?php the_title(); ?></h2>  
												<?php if($thumb_url) { ?>
													<a href="<?php the_permalink(); ?>" class="image-container" style="background: url('<?php echo $thumb_url[0];?>') center center no-repeat;">
												
													</a>
												<?php } ?>
												<!-- output the excerpt, and if no excerpt then output content-->
												<div class="timeline-featured-content ">
													<?php  
														$octane_excerpt = get_the_excerpt(); 
														if(isset($octane_excerpt)) { ?>
															<p>
																<?php 
																	$temporary_excerpt = substr(strip_tags($octane_excerpt), 0, 130);
																	echo $temporary_excerpt; 
																?>
															</p>
														<?php }else{  
															$more = 0; 
															$octane_content = get_the_content(); 
															$temporary = substr(strip_tags($octane_content), 0, 130); ?>
															<p>
																<?php echo $temporary; ?>
															</p>
													<?php }	?>
												</div>
												<span class="cd-date"><?php print get_the_date( 'M j Y' ); ?></span>
												<div class="timeline-footer clearfix">
													<a href="<?php the_permalink(); ?>" class="cd-read-more">Read more</a>
												</div>
												
											</div><!--inside content -->
											
											<div class="inside-content cd-timeline-content timeline-featured-image right">
												
												<?php if($thumb_url) { ?>	
													<a href="<?php the_permalink(); ?>" class="image-container" style="background: url('<?php echo $thumb_url[0];?>') center center no-repeat;">
												
													</a>
												<?php } ?>
												
											</div><!--inside content -->
											
											
										</article><!-- cd-timeline-block -->
									
									<?php endif; ?>
									
								<?php endwhile;
								wp_reset_query();
								?>
							</section>
						<?php endforeach; ?>
					
					</div>
				</div><!--end inner content-->

			</div><!--end row -->
		</div><!-- end container -->
	</div><!-- end page wrap -->
    <?php get_footer(); ?>