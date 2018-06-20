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
			<div class="row">
				<div class="col-lg-12"><div class="category-title"><div class="title_home_block"><center><?php single_cat_title(); ?></center></div></div></div>
			</div>
			<?php 
			$the_query=$wp_query;	
			$k=0;		
			if($the_query->have_posts()){								
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$post_id=$the_query->post->ID;
					$permalink=get_the_permalink($post_id);
					$title=get_the_title($post_id);
					$featured_img=get_the_post_thumbnail_url($post_id, 'full');       
					$excerpt=get_the_excerpt($post_id); 
					if($k%2 == 0){
                        echo '<div class="row">';
                    }          
					?>
					<div class="col-lg-6">
						<div class="item lica">
							<div class="item_sanpham">
								<a href="<?php echo $permalink; ?>">
									<img src="<?php echo $featured_img; ?>" class="img-responsive">
									<div class="info">
										<div class="ten"><?php echo $title; ?></div>
										<div><?php echo $excerpt; ?></div>
									</div>
								</a>
							</div>
						</div>
					</div>
					<?php
					$k++;
                    if($k%2==0 || $k == $the_query->post_count){
                        echo '</div>';
                    } 
				}
				wp_reset_postdata();    					
			}
			?>			
		</div>
	</div>
</section>
<?php get_footer(); ?>