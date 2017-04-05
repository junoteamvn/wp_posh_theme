<?php 
	$primary_color = get_theme_mod( 'header_color' , '#d6a862' );
?>
<style type="text/css">
	.navigation .bot-nav .nav-primary a:hover,.navigation .bot-nav .nav-primary a:focus {
		border-top: 2px solid <?php echo $primary_color; ?>;
		color: #fff;
		outline: none;
	}
	#header .heading-title span ,#footer .footer-menu a:hover,#footer .footer-socials a:hover,#footer a.back-top:hover,#gallery .gallery-content .content-left a,#contact .contact-content a:hover  {
		color: <?php echo $primary_color; ?>;
	}
	#footer a.back-top:hover svg {
		fill: <?php echo $primary_color; ?>;
	}
	#header .header-button .btn-left:hover,#header .header-button .btn-right, #channel .button-video:hover,#blog .btn-see-more:hover{
		border: 1px solid <?php echo $primary_color; ?>;
    	background: <?php echo $primary_color; ?>;
	}
	#header .owl-dots .active span,#header .owl-dots .owl-dot:hover span{
		background-color: <?php echo $primary_color; ?>;
	}
	#service .service-post .post-img .img-cover:before , #blog .grid .grid-item:hover .item-bg {
		background-color: <?php echo $primary_color; ?>;
	}
	#service .service-post .post-content .post-link , #blog .blog-category ul li.active button,#blog .blog-category ul button:hover,#blog .grid .grid-item .item-title:hover{
		color: <?php echo $primary_color; ?>;
	}
	.cls-arrow{
		margin-left: 15px;
	}
	.cls-arrow *{
		fill: <?php echo $primary_color; ?> !important;
	}
	#service .service-category svg * {
		fill: #6f6f6f;
	}
	#gallery .owl-nav .owl-prev:hover svg * , #gallery .owl-nav .owl-next:hover svg *{
      	fill: <?php echo $primary_color; ?>; 
  	}
	#contact .cls-1{
		fill: <?php echo $primary_color; ?>;
        fill-rule: evenodd;
	}
	#contact .cls-2 {
        fill: #6f6f6f;
        fill-rule: evenodd;
  	}
</style>