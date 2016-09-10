
	<?php get_header(); ?>
	
	<div id="page-wrap">
		<?php 
			
			//this is the option on the page options
			$pegasus_container_choice = get_post_meta( get_the_ID(), 'pegasus-page-container-checkbox', true ); 
			//this is the option from the theme options for global fullwidth
			$full_container_chk_choice =  pegasus_theme_get_option('full_container_chk' ); 
			
			//$meta2 = get_post_meta($post->ID); 
			//echo "<pre>";  var_dump($meta2); echo "</pre><hr>";  
			//echo $pegasus_container_choice;
		?>
		
		<div class="<?php if($full_container_chk_choice === 'on') { 
										echo 'container-fluid'; 
									}elseif ($pegasus_container_choice === 'on') { 
										echo 'container-fluid'; 
									}else{
										echo 'container';
									}?>">
		<!-- Example row of columns -->
			<div class="row">
		
				<div class="inner-content">	
					<div class="content-no-sidebar clearfix">
						
						<?php 
							$cat_args = array(
								'orderby'                  => 'name',
								'order'                    => 'DESC',
								'parent'  => 0
							);
							
							$categories = get_categories( $cat_args ); 
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
												<?php /* ?>
												<time datetime="<?php the_date('c'); ?>"><?php print get_the_date( 'M' ); ?></time>
												<?php */ ?>
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
											
										</article><!-- cd-timeline-block -->
										
									<?php else: ?>
										<!-- even -->
										<article class="article-<?php the_ID(); ?> cd-timeline-block left">
											<div class="cd-timeline-img cd-picture">
												<?php /* ?>
												<time datetime="<?php the_date('c'); ?>"><?php print get_the_date( 'M' ); ?></time>
												<?php */ ?>
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
											
											
											
											
										</article><!-- cd-timeline-block -->
									
									<?php endif; ?>
									
								<?php endwhile;
								wp_reset_query();
								?>
							</section>
						<?php endforeach; ?>
							
							
							
							
							

							
							
							
							<!--<section id="2015" >
								<div class="container">
									<div class="row">
										<h1 class="year">2015</h1>
									</div>
									<div class="row">
									
										<div class="col-md-6">
											<h2>The Madness</h2>
											<p>This year was awesome at TomorrowWorld 2015, even though it rained on us like Music Midtown 2013. Sorry guys, I tried to make this as short as I could, but ithere are just too many good parts...<br>I bet you can't guess how many transitions are in this video (part 1 and 2)...</p>
											
											<ul>
											<li> <b>To the right</b> you will find a awesome video of how we use Shela at our festivals.</li>
											<li><b>Below</b> you will find a Shela's montage split up into two parts. </li>
											<li><b>And below that</b> you will find a picture with the unedited montage (part one and two).</li>
											</ul>
											
										</div>
									
										<div class="col-md-6">
											<h2>Shela dances with friends.</h2>
											<p>This video shows how we start the camera, attach her to the pole, and move with her in a crowd.</p>
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="youtube" src="https://www.youtube.com/embed/wxhcQM5iblg?rel=0" frameborder="0" allowfullscreen></iframe>
											</div>
										</div>
									
									</div>				
									<hr>
									<div class="row">
										
										<div class="col-md-6">
											<h2>Shela montage part 1.</h2>
											<p>This is a recording from my GoPro on top of our totem at TomorrowWorld 2015. It goes in chronilogical order. This is Thursday and Friday. </p>
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="youtube" src="https://www.youtube.com/embed/uoTyHunLM7s?rel=0" frameborder="0" allowfullscreen></iframe>
											</div>
										</div>
										
										<div class="col-md-6">
											<h2>Shela montage part 2.</h2>
											<p>&nbsp;<br>This is Thursday and Friday and Saturday. </p>
											
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="youtube" src="https://www.youtube.com/embed/n0bvuBx0M7Q?rel=0" frameborder="0" allowfullscreen></iframe>
											</div>
										</div>
										
									</div>
									<hr>
									<div class="row">
										
										<div class="col-md-6">
											<h2>Shela was spotted on a photo on the TomorrowWorld Facebook page.</h2>
											<img src="http://meowweretalkin.com/wp-content/themes/pegasus-child/images/ifoundher.jpg">
										</div>
										
										<div class="col-md-6">
											<h2>TomorrowWorld 2015 Montage Part 1 & 2</h2>
											
											<div align="center" class="embed-responsive embed-responsive-16by9">
												<video controls class="embed-responsive-item">
													<source src=http://meowweretalkin.com/wp-content/uploads/2015/10/tw-2015.mp4 type=video/mp4>
												</video>
											</div>
										</div>
										
									</div>
									
									
									
									
								</div>
							
							</section>
							
							<section id="2014">
								<div class="container">
									<div class="row">
										<h1 class="year">2014</h1>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h2>Shela at TomorrowWorld 2014</h2>
											<p>Hint: Fast forward to about 2 minutes in.</p>
											<div class="video-container">
												<div class="embed-responsive embed-responsive-16by9">
													<iframe class="youtube" src="https://www.youtube.com/embed/pOY-yMxl2CY?rel=0" frameborder="0" allowfullscreen></iframe>
												</div>
											</div>
										</div>
										<div class="col-md-6">
										
											<div class="video-container">
												<h2>Shelia's First Apearance</h2>
												<p>Does gloves dho..</p>
												<div class="embed-responsive embed-responsive-16by9">
														<iframe class="youtube" src="https://www.youtube.com/embed/gCWCl3EuuRc?rel=0" frameborder="0" allowfullscreen></iframe>
													</div>
											</div>
										
										</div>
									</div>
								</div>
							</section>		-->
						
					
					</div>
				</div><!--end inner content-->

			</div><!--end row -->
		</div><!-- end container -->
	</div><!-- end page wrap -->
    <?php get_footer(); ?>