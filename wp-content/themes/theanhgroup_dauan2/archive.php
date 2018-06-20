<?php get_header(); ?>
<?php 
	$image = get_field('tin_tuc', 'option');
?>
<section>
	<div class="archive-title" style="background-image:url('<?php if( !empty($image) ): ?><?php echo $image['url']; ?><?php endif; ?>')">
		<span><?php single_cat_title(); ?></span>
	</div>
	<div id="main-content" class="box-san-pham">
		<div class="container">
			<?php
			$custom_terms = get_terms('chuyen_muc_san_pham');
			$i=0;
			foreach($custom_terms as $custom_term) {
			$i++;
			$args = array('post_type' => 'san_pham',
				'tax_query' => array(
						array(
							'taxonomy' => 'chuyen_muc_san_pham',
							'field' => 'slug',
							'terms' => $custom_term->slug,
						),
				),
			);
			?>
			<?php
			$loop = new WP_Query($args);?>
			<script>
			$(document).ready(function() {
			var owl = $("#owl-sp-<?php echo $i?>");
			owl.owlCarousel({
					items : <?php echo $loop->post_count?>, //10 items above 1000px browser width
					itemsDesktop : [1000,3], //5 items between 1000px and 901px
					itemsDesktopSmall : [900,2], // betweem 900px and 601px
					itemsTablet: [600,1], //2 items between 600 and 0
					itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
				});
				$(".next-<?php echo $i?>").click(function(){
					owl.trigger('owl.next-<?php echo $i?>');
				})
				$(".prev-<?php echo $i?>").click(function(){
					owl.trigger('owl.prev-<?php echo $i?>');
				})
			});
			</script>
			<?php if($loop->have_posts()):?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 san-pham-chinh text-center">
				<div class="title_home_block"><?php echo $custom_term->name?></div>
			</div>
			<div class="clearfix"></div>
			<div class="row sp-noibat">
			<div id="owl-sp-<?php echo $i?>" class="owl-carousel owl-theme">
			<?php while($loop->have_posts()) : $loop->the_post();?>
				<div class="item">
					<div class="item_sanpham">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive">
							<div class="info">
								<span class="ten"><?php the_title(); ?></span>
								<span><?php the_excerpt(); ?></span>
							</div>
						</a>
					</div>
				</div>
			<?php endwhile;wp_reset_query();?>
			</div>
				<div class="customNavigation">
					<a class="btn prev prev-<?php echo $i?>"></a>
					<a class="btn next next-<?php echo $i?>"></a>
				</div>
			</div>
			<div class="clearfix"></div>
			<?php 
			endif;
			}?>
		</div>
	</div>
</section>
<?php get_footer(); ?>