	<?php get_header(); ?>
	
	<div id="page-wrap">
		<?php 
			$pegasus_container_choice = get_post_meta( get_the_ID(), 'pegasus-page-container-checkbox', true ); 
			$full_container_chk_choice = get_post_meta( get_the_ID(), 'full_container_chk', true ); 
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
				<div class="col-md-12">
					<div class="inner-content">	
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php 
								$page_header_choice =  pegasus_theme_get_option('page_header_chk' ); 
								if( $page_header_choice != 'on' ) {
							?>
								<div class="page-header">
									<h1><?php wp_title(); ?></h1>
									<p><em>						
										By <?php the_author(); ?> 
										on <?php echo the_time('l, F, jS, Y');?>
										in <?php the_category( ',' ); ?>.
										<a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>						
								</em></p>
								</div>
							<?php } ?>
							
							<?php the_content(); ?>
							<?php 
								$meta = get_post_meta($post->ID); 
								//cmb2_output_file_list( 'wiki_test_file_list', 'small' ); 
								$temp2 = get_images_src('full',false,$post->ID); 
								//4 accepted parameters : the 1st size (STRING) & the 2nd size (STRING) & thumbnail (BOOLEAN) & id (integer)
								
								//echo "<pre>";  var_dump($temp2); echo "</pre><hr>";
								
								//echo $temp2['image1'][0]; 
								
								foreach ($temp2 as $value) {
									
									echo '<img src=" ' . $value[0] . '" class="gallery-image" >'; 
									
								}
							?>
							
							<hr>
							
							<?php comments_template(); ?>
						
						<?php endwhile; else: ?>
							<?php /* kinda a 404 of sorts when not working */ ?>
							<div class="page-header">
								<h1>Oh no!</h1>
							</div>
							<p>No content is appearing for this page!</p>
						<?php endif; ?>
					</div><!--end inner content-->
				</div>
				<?php //get_sidebar(); ?>
       
			</div><!--end row -->
		</div><!-- end container -->
	</div><!-- end page wrap -->
      <?php get_footer(); ?>