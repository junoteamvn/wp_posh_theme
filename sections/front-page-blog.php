<?php
	/* SHOW DATA */
	$categories =  get_categories(array(
			    'orderby' => 'name',
			    'order'   => 'DESC'
			) 
		);

	$postsPerPage = 6;
	$post_query_args = array(
		'post_type'      => array( 'post' ),
		'posts_per_page' => $postsPerPage,
	);

	$post_query = new WP_Query( $post_query_args );

	$blog_title = get_theme_mod( 'blog_title' , 'Latest Blog' );
	$blog_button_label = get_theme_mod( 'blog_button_label' , 'See More' );
	$blog_button_url = get_theme_mod( 'blog_button_url' , 'http://junoteam.com/blog/' );
?>
<section id="blog" class="blog">
	<div class="container">
		<?php 
			if ( $blog_title ) {
				echo '<h2 class="heading-title wow fadeIn" data-wow-duration="0.5s" >'.$blog_title.'</h2>';
			}
		?>
		<div class="blog-category icon-angle-down wow fadeInUp" data-wow-duration="0.5s" >
			<ul class="nav nav-pills">
				<li class="active"><button class="item-menu" data-filter="*">all<span class="all-cate"> categories</span></button></li>
				<?php
				    foreach ($categories as $category){
						echo '<li><button class="item-menu" data-filter=".'.$category->slug.'">'.$category->name.'</button></li>';
					}
				?>
			</ul>
		</div>
		<div class="row">
			<div class="grid">
				<div class="grid-sizer"></div>
				<?php 
					if ( $post_query->have_posts() ) : while ( $post_query->have_posts() ) : $post_query->the_post(); 
						if ( get_post_thumbnail_id() ) { 
							$categories =  get_the_category();
							$cate_name ='';
						    foreach ($categories as $category) {
						    	$cate_name.=$category->slug.' ';
						    }
						    echo '<div class="grid-item '.$cate_name.'">
									<div class="item-bg"></div>
									<a class="item-cover-link" href="'.get_post_meta( get_the_ID(), 'blog_url', true).'" target="_blank">
										<div class="item-cover" style="background-image: url('.wp_get_attachment_url( get_post_thumbnail_id() ).');"></div>
									</a>
									<a href="'.get_post_meta( get_the_ID(), 'blog_url', true).'" class="item-title" target="_blank">'.get_the_title().'</a>
									<span class="item-date">'.get_the_author().' / '.get_the_time('M d').'</span>
								</div>';
						} 
					endwhile; 
					endif;
					wp_reset_postdata();
				?>
			</div>
		</div>
		<?php 
			if ( $blog_button_label ) {
				echo '<a class="btn-see-more" href="'.$blog_button_url.'">'.$blog_button_label.'</a>';
			}
		?>
	</div>
</section>	