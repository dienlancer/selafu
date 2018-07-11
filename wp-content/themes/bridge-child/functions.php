<?php

// enqueue the child theme stylesheet

function wp_schools_enqueue_scripts() {
	/* begin fontawesome */
	wp_register_style( 'fontawesome', get_stylesheet_directory_uri() . '/web-fonts-with-css/css/fontawesome-all.min.css' ,array(),false,'all' );
	wp_enqueue_style( 'fontawesome' );
	/* end fontawesome */
	/* begin owlcarousel */
	wp_register_style( 'owlcarousel_css', get_stylesheet_directory_uri() . '/owlcarousel/assets/owl.carousel.min.css' ,array(),false,'all' );
	wp_enqueue_style( 'owlcarousel_css' );
	wp_register_script('owlcarousel_js',get_stylesheet_directory_uri() . '/owlcarousel/owl.carousel.min.js',array(),false,false);
	wp_enqueue_script('owlcarousel_js');
	/* end owlcarousel */
	/* begin bootstrap */
	wp_register_style( 'bootstrap_css', get_stylesheet_directory_uri() . '/css/bootstrap.css' ,array(),false,'all' );
	wp_enqueue_style( 'bootstrap_css' );
	wp_register_script('bootstrap_js',get_stylesheet_directory_uri() . '/js/bootstrap.js',array(),false,false);
	wp_enqueue_script('bootstrap_js');
	/* end bootstrap */
	/* begin elevatezoom */
	wp_register_script('elevatezoom',get_stylesheet_directory_uri() . '/js/jquery.elevatezoom-3.0.8.min.js',array(),false,false);
	wp_enqueue_script('elevatezoom');	
	/* end elevatezoom */
	/* begin youtube */	
	wp_register_script('jquery_modal_video',get_stylesheet_directory_uri() . '/youtube/jquery-modal-video.min.js',array(),false,false);
	wp_enqueue_script('jquery_modal_video');
	wp_register_script('modal_video_js',get_stylesheet_directory_uri() . '/youtube/modal-video.min.js',array(),false,false);
	wp_enqueue_script('modal_video_js');
	wp_register_style( 'modal_video_css', get_stylesheet_directory_uri() . '/youtube/modal-video.min.css' ,array(),false,'all'  );
	wp_enqueue_style( 'modal_video_css' );
	/* end youtube */
	/* begin fancybox */
	wp_register_script('fancybox_js',get_stylesheet_directory_uri() . '/fancybox/jquery.fancybox.min.js',array(),false,false);
	wp_enqueue_script('fancybox_js');
	wp_register_style( 'fancybox_css', get_stylesheet_directory_uri() . '/fancybox/jquery.fancybox.min.css' ,array(),false,'all'  );
	wp_enqueue_style( 'fancybox_css' );
	/* end fancybox */
	/* begin tab */
	wp_register_style( 'tab_css', get_stylesheet_directory_uri() . '/css/tab.css' ,array(),false,'all'  );
	wp_enqueue_style( 'tab_css' );
	/* end tab */	
	/* begin custom js */
	wp_register_script('customy_js',get_stylesheet_directory_uri() . '/js/custom.js',array(),false,false);
	wp_enqueue_script('customy_js');
	/* end custom js */
	/* begin style */
	wp_register_style( 'product', get_stylesheet_directory_uri() . '/css/product.css',array(),false,'all'   );
	wp_enqueue_style( 'product' );
	/* end style */	
	/* begin style */
	wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css',array(),false,'all'   );
	wp_enqueue_style( 'childstyle' );
	/* end style */	
}
function do_output_buffer(){
		ob_start();
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);
add_action('init', 'do_output_buffer');
/* begin menu */
add_action('init', 'zendvn_theme_register_menus');
function zendvn_theme_register_menus(){
	register_nav_menus(
		array(									
			'category-product-menu' 			=> __('CategoryProductMenu'),			
		)
	);
}
/* end menu */
/* begin ẩn menu */
function vnkings_admin_menus() {   
   remove_menu_page( 'edit.php?post_type=portfolio_page' ); 
   remove_menu_page( 'edit.php?post_type=testimonials' ); 
   remove_menu_page( 'edit.php?post_type=slides' ); 
   remove_menu_page( 'edit.php?post_type=carousels' ); 
   remove_menu_page( 'edit.php?post_type=masonry_gallery' ); 
   remove_menu_page( 'edit-comments.php' ); 
   remove_menu_page( 'tools.php' );     
   remove_menu_page( 'edit.php?post_type=acf' );   
   remove_menu_page( 'vc-general' );    
}
add_action( 'admin_menu', 'vnkings_admin_menus' );
/* end ẩn menu */
/* begin fanpage */
add_action('wp_footer', 'script_fanpage');
function script_fanpage(){
	$strScript='<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = \'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=206740246563578\';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, \'script\', \'facebook-jssdk\'));</script>';
	echo $strScript;
	$modal='<div class="modal fade modal-add-cart" id="modal-alert-add-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header relative">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
      </div>
      <div class="modal-body">

      </div>      
    </div>
  </div>
</div>  
';
	echo $modal;
	$tawk_to='<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src=\'https://embed.tawk.to/5b23257f61a2e64e5fb57e1f/default\';
s1.charset=\'UTF-8\';
s1.setAttribute(\'crossorigin\',\'*\');
s0.parentNode.insertBefore(s1,s0);
})();
</script>';
	echo $tawk_to;
}
/* end fanpage */

/* begin header-top */
add_shortcode('header_top','showHeaderTop');
function showHeaderTop(){
	require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "header-top.php";
}
/* end header-top */
/* begin banner */
add_shortcode('banner','loadBanner');
function loadBanner($attrs){	
	$slug=@$attrs['item'];               
	$name=@$attrs['name'];
	$source_slug=array($slug);
	$args = array(
		'post_type' => 'zabanner',  
		'orderby' => 'id',
		'order'   => 'DESC',                                                  
		'tax_query' => array(
			array(
				'taxonomy' => 'za_banner',
				'field'    => 'slug',
				'terms'    => $source_slug,                                  
			),
		),
	); 
	$the_query = new WP_Query( $args );
	if($the_query->have_posts()){
		?>
		<div class="margin-top-15 box-meal">
			<div>
				<script type="text/javascript" language="javascript">
					jQuery(document).ready(function(){
						jQuery(".banner").owlCarousel({
							autoplay:true,                    
							loop:true,
							margin:0,                        
							nav:false,            
							mouseDrag: true,
							touchDrag: true,                                
							responsiveClass:true,
							responsive:{
								0:{
									items:1
								},
								600:{
									items:1
								},
								1000:{
									items:1
								}
							}
						});

					});                
				</script>
				<div class="owl-carousel banner owl-theme">
					<?php      
					while ($the_query->have_posts()){
						$the_query->the_post();
						$post_id=$the_query->post->ID;  
						$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
						?>
						<div><img src="<?php echo $featured_img; ?>"></div>
						<?php
					}
					wp_reset_postdata();  
					?>
				</div>
			</div>  
			<?php 
			if(strcmp($slug, 'banner-home') != 0){
				
				?>
				<div class="single-cat-title"><?php echo @$name; ?></div>
				<?php
			}
			?>			
		</div>
		<?php
	}
}
/* end bannerhome */
/* begin san pham */
add_shortcode('product','loadProduct');
function loadProduct($attrs){
	global $zController,$zendvn_sp_settings;    
	$vHtml=new HtmlControl();
	$source_slug=explode(',', $attrs['item']);
	$args = array(
		'post_type' => 'zaproduct',  
		'orderby' => 'id',
		'order'   => 'DESC',                                                  
		'tax_query' => array(
			array(
				'taxonomy' => 'za_category',
				'field'    => 'slug',
				'terms'    => $source_slug,                                  
			),
		),
	); 
	$the_query=new WP_Query($args);				
	if($the_query->have_posts()){
		?>
		<div>
			<script type="text/javascript" language="javascript">
				jQuery(document).ready(function(){
					jQuery(".product").owlCarousel({
						autoplay:true,                    
						loop:true,
						margin:10,                        
						nav:false,            
						mouseDrag: true,
						touchDrag: true,                                
						responsiveClass:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:3
							},
							1000:{
								items:3
							}
						}
					});
					var chevron_left='<i class="fa fa-chevron-left"></i>';
					var chevron_right='<i class="fa fa-chevron-right"></i>';
					jQuery("div.product div.owl-prev").html(chevron_left);
					jQuery("div.product div.owl-next").html(chevron_right);
				});                
			</script>
			<div class="owl-carousel product owl-theme">
				<?php 
				while ($the_query->have_posts()){
					$the_query->the_post();
					$post_id=$the_query->post->ID;																		
					$permalink=get_the_permalink($post_id);
					$title=get_the_title($post_id);
					$featured_img=get_the_post_thumbnail_url($post_id, 'full');	
					$thumbnail=$vHtml->getSmallImage($featured_img);					
					$intro=get_post_meta($post_id,"intro",true);					
					?>
					<div>
						<div>
							<center><figure><a href="<?php echo @$permalink; ?>"><img src="<?php echo @$thumbnail; ?>" alt="<?php echo @$title; ?>"></a></figure></center>

						</div>						 
						<div class="box-product-title margin-top-5">
							<center>
								<a href="<?php echo @$permalink; ?>" title="<?php echo @$title; ?>" ><b><?php echo @$title; ?></b></a>	
							</center>
						</div>
						<div class="box-product-intro margin-top-5">
							<center><?php echo $intro; ?></center>
						</div>
					</div>
					<?php
				}
				wp_reset_postdata();  
				?>	
			</div>
		</div>
		<?php
	}
}
/* end san pham */
/* begin bua-ngon */
add_shortcode( 'bua_ngon', 'showMeal' );
function showMeal(){
	$terms = get_terms( array(
		'taxonomy' => 'za_meal',
		'hide_empty' => false, 
		'parent' => 0 ) );			
	if(count($terms) > 0){		
		?>
		<div class="box-real">
			<?php 
			foreach ($terms as $key => $value) {				
				$source_img = get_field('featured_img', $value);
				$term_link= get_term_link($value,'za_meal');		
				?>
				<div>
					<div class="box-meal">
						<figure><img src="<?php echo $source_img['url']; ?>"></figure>
						<div class="box-meal-intro">
							<div class="zimin">
								<div class="box-meal-title"><center><?php echo $value->name; ?></center></div>
								<div class="box-meal-description"><?php echo $value->description; ?></div>
								<div class="box-read-more">
									<div class="xem-them">
										<a href="<?php echo $term_link; ?>" >
											<div class="narit">
												<div >Xem thêm</div>
												<div class="margin-left-5"><i class="fas fa-arrow-circle-right"></i></div>											
											</div>								
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
				<?php
			}	
			?>	
		</div>
		<?php		
	}	
}
/* end bua-ngon */
/* begin google map */
add_shortcode( 'ggmap', 'showGoogleMap' );
function showGoogleMap(){
	global $zController,$zendvn_sp_settings;    
	$vHtml=new HtmlControl();
	?>
	<div class="map" >
		<iframe src="<?php echo @$zendvn_sp_settings['ban_do']; ?>" width="100%" height="362" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<?php
}
/* end google map */
/* begin tin tuc */
add_shortcode( 'news', 'showNews' );
function showNews($attrs){
	global $zController,$zendvn_sp_settings;    
	$vHtml=new HtmlControl();
	$source_slug=explode(',', $attrs['item']);
	$args = array(
		'post_type' => 'post',  
		'orderby' => 'id',
		'order'   => 'DESC',   
		'posts_per_page'=>8,                                               
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $source_slug,                                  
			),
		),
	); 
	$the_query=new WP_Query($args);				
	if($the_query->have_posts()){
		?>
		<div class="box-home-news">
			<script type="text/javascript" language="javascript">
				jQuery(document).ready(function(){
					jQuery(".news").owlCarousel({
						autoplay:true,                    
						loop:true,
						margin:15,                        
						nav:false,            
						mouseDrag: true,
						touchDrag: true,                                
						responsiveClass:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:1
							},
							1000:{
								items:4
							}
						}
					});
					var chevron_left='<i class="fa fa-chevron-left"></i>';
					var chevron_right='<i class="fa fa-chevron-right"></i>';
					jQuery("div.news div.owl-prev").html(chevron_left);
					jQuery("div.news div.owl-next").html(chevron_right);
				});                
			</script>
			<div class="owl-carousel news owl-theme">
				<?php 
				while ($the_query->have_posts()){
					$the_query->the_post();
					$post_id=$the_query->post->ID;																		
					$permalink=get_the_permalink($post_id);
					$title=get_the_title($post_id);
					$thumbnail=get_the_post_thumbnail_url($post_id, 'thumbnail');							
					$intro=get_post_meta($post_id,"intro",true);	
					$intro=mb_substr($intro, 0,100).'...';				
					?>
					<div>
						<div class="margin-top-15">
							<div>
								<center><a href="<?php echo @$permalink; ?>"><img src="<?php echo @$thumbnail; ?>" alt="<?php echo @$title; ?>"></a></center>

							</div>						 
							<div class="box-news-title margin-top-5">

								<a href="<?php echo @$permalink; ?>" title="<?php echo @$title; ?>" ><b><?php echo @$title; ?></b></a>	

							</div>
							<div class="box-news-intro margin-top-5">
								<?php echo $intro; ?>
							</div>
							<div class="product-readmore padding-bottom-15 padding-left-15 padding-right-15">
								<div class="xem-them">
									<a href="<?php echo $term_link; ?>" >
										<div class="narit">
											<div >Xem thêm</div>
											<div class="margin-left-5"><i class="fas fa-arrow-circle-right"></i></div>											
										</div>								
									</a>
								</div>
							</div>
						</div>								
					</div>
					<?php
				}
				wp_reset_postdata();  
				?>	
			</div>	
		</div>
		<?php
	}
}
/* end tin tuc */