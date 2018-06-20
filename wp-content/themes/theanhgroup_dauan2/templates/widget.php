<?php
$custom_terms = get_terms('chuyen_muc_bua_ngon');
foreach($custom_terms as $custom_term) {
	wp_reset_query();
	$args = array('post_type' => 'bua_ngon',
		'tax_query' => array(
			array(
			'taxonomy' => 'chuyen_muc_bua_ngon',
			'field' => 'slug',
			'terms' => $custom_term->slug,
			),
		),
	);
	$loop = new WP_Query($args);
	if($loop->have_posts()) {
		echo '<div class="head_widget">'.$custom_term->name.'</div>';
		echo '<ul>';
		while($loop->have_posts()) : $loop->the_post();
	?>	
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endwhile;wp_reset_query();
		echo '</ul>';
	}
}
?>