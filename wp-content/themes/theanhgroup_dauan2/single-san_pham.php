<?php get_header(); ?>
<?php 
	$image = get_field('banner_san_pham', 'option');
?>
<section>
	<div class="archive-title" style="background:url('<?php if( !empty($image) ): ?><?php echo $image['url']; ?><?php endif; ?>')">
		<span>
		<?php the_title();?>
		</span>
	</div>
	<div id="main-content-sanpham">
		<div class="container">
			<div class="detail_post">
				<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$the_query = new WP_Query( 'cat=1&paged=' . $paged ); 
				?>
				<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

					<?php get_template_part('loop/content', 'sanpham'); ?>

				<?php endwhile ?>
				<div class="bnt_sanpham">
					<?php next_post_link('%link','<span class="arrowright"></span>',FALSE); ?>
					<?php previous_post_link('%link','<span class="arrowleft"></span>',FALSE); ?>
				</div>
				<?php else: ?>
					<?php get_template_part('content', 'none'); ?>
				<?php endif; ?>

					<a class="arrowleft"href="#"></a>
					<a class="arrowright"href="#"></a>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>