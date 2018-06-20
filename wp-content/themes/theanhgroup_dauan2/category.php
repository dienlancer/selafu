<?php get_header(); ?>
<?php 
	$image = get_field('tin_tuc', 'option');
?>
<section>
	<div class="archive-title" style="background-image:url('<?php if( !empty($image) ): ?><?php echo $image['url']; ?><?php endif; ?>')">
		<span><?php single_cat_title(); ?></span>
	</div>
	<div id="main-content">
		<div class="container">
			<div class="row">
			<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<?php get_template_part('content'); ?>

			<?php endwhile ?>
			<?php else: ?>
				<?php get_template_part('content', 'none'); ?>
			<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>