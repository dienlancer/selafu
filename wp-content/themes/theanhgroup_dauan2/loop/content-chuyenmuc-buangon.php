<div class="col-xs-12 col-sm-6 col-lg-6 category_post">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<img src="<?php if ( has_post_thumbnail() ) { echo the_post_thumbnail_url('full');}?>" class="img_category_post">
	</a>	
	<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
	<p class="info"> 
		Bởi <span class="entry-author"><?php echo get_the_author(); ?> -
			<?php $terms = get_the_terms( $post->ID , 'chuyen_muc_bua_ngon' );
				foreach ( $terms as $term ) {
				echo $term->name;
			}
			 ?>
		</span> 
		<span class="entry-date"><i class="glyphicon glyphicon-time" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
	</p>
</div>