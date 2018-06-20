<?php get_header(); ?>
<?php 
	$image = get_field('bua_ngon', 'option');	
?>
<section>
	<div class="archive-title" style="background-image:url('<?php if( !empty($image) ): ?><?php echo $image['url']; ?><?php endif; ?>')">
		<span><?php post_type_archive_title(); ?></span>
	</div>
	<div id="main-content">
		<div class="container">
			<div class="row mg_0">
			<?php 
			$custom_terms = get_terms('chuyen_muc_bua_ngon');
			foreach($custom_terms as $custom_term) {
			$term_link = get_term_link( $custom_term );
			$image = get_field('images', 'chuyen_muc_bua_ngon_'.$custom_term->term_id);?>
				<div class="col-xs-12 col-sm-6 col-lg-6 category_post bua-ngon">
					<a href="<?php echo esc_url( $term_link )?>" title="<?php echo $custom_term->name;?>">
						<img src="<?php echo $image['url']?>" class="img_category_post">
					</a>
					<h3 class="entry-title"><a href="<?php echo esc_url( $term_link )?>" title="<?php echo $custom_term->name;?>"><?php echo $custom_term->name;?></a></h3>
					<div class="buangon-description">"<?php echo $custom_term->description;?></div>
				</div>
			<?php }?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>