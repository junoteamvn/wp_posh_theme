<?php
	
    $post_query_args = array(
		'post_type'      => array( 'gallery' ),
	);
	
	$post_query = new WP_Query( $post_query_args );

?>
<section id="gallery" class="gallery">
	<div class="owl-carousel owl-theme">
		<?php 
			if ( $post_query->have_posts() ) : while ( $post_query->have_posts() ) : $post_query->the_post(); 
			if ( get_post_thumbnail_id() ) { 
			    echo '<div class="item" style="background-image: url('.wp_get_attachment_url( get_post_thumbnail_id() ).');">
					<div class="container">
						<div class="gallery-content wow fadeIn" data-wow-duration="0.5s">
							<div class="content-left">
								<h3 class="date">'.get_the_time('M d').'</h3>';
				if( function_exists('dot_irecommendthis') ){
					dot_irecommendthis();
				}
				echo '</div>
							<div class="content-right">
								<p>'.get_the_excerpt().'.</p>
							</div>
						</div>
					</div>
				</div>';
			} 
			endwhile; 
			endif;
			wp_reset_postdata();
		?>
	</div>
</section>