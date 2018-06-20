<?php get_header(); ?>
<?php 
	$image = get_field('bua_ngon', 'option');
?>
<section>
	<div class="archive-title" style="background:url('<?php if( !empty($image) ): ?><?php echo $image['url']; ?><?php endif; ?>')">
		<span>
		<?php $post = get_queried_object();
				$postType = get_post_type_object(get_post_type($post));
				if ($postType) {
					echo esc_html($postType->labels->singular_name);
				}
				?>
		</span>
	</div>
	<div id="main-content">
		<div class="container">
			<div class="col-xs-12 col-sm-8 col-lg-8">
				<div class="detail_post">
				<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

					<?php get_template_part('loop/content', 'buangon-detail'); ?>

				<?php endwhile ?>
				<?php else: ?>
					<?php get_template_part('content', 'none'); ?>
				<?php endif; ?>
				</div>
			</div>
			<div id="sidebar" class="col-xs-12 col-sm-4 col-lg-4">
				<?php get_template_part('templates/widget'); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>