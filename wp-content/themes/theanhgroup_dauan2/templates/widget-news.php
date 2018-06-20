<?php
$custom_terms = get_terms('category');
foreach($custom_terms as $custom_term) {
	wp_reset_query();
	$args = array('post_type' => 'post',
		'tax_query' => array(
			array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => $custom_term->slug,
			),
		),
		'posts_per_page' => 3
	);
	$loop = new WP_Query($args);
	if($loop->have_posts()) {?>
	<div class="head_widget"><?php _e('Tin tức khác','theanhgroup')?></div>
	<ul>
	<?php while($loop->have_posts()) : $loop->the_post();?>	
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endwhile;wp_reset_query();?>
	</ul>
	<?php
	}
}
?>