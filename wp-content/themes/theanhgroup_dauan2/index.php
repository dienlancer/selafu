<?php get_header(); ?>
<section>
	<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1280px; height: 500px; overflow: hidden; visibility: hidden;">
		<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
		<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
		<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
		</div>
		<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1280px; height: 500px; overflow: hidden;">
			<?php 
				$images = get_field('slider_images','option');
				if( $images ): ?>					
				<?php $i = 0; foreach( $images as $image ): $i++?>
					<div data-p="225.00" <?php if($i >1 ) echo 'style="display: none;"';?>>
						<img src="<?php echo $image['url']; ?>" alt = "<?php echo $image['alt']; ?>">
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="clearfix"></div>
	<div id="main-content">
		<div class="container">
			<div class="col-md-8 san-pham-chinh">
				<div class="title_home_block"><?php the_field('tieu_de_sp_chinh','option')?></div>
				<div class="content_home_block">
				<?php the_field('noi_dung_sanpham','option')?>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row sp-noibat">
			<div id="owl-sp" class="owl-carousel owl-theme">
			<?php
			$args = array('post_type' => 'san_pham',
					'meta_query' => array(
						array(
							'key' => 'san_pham_chinh',
							'compare' => '==',
							'value' => '1'
						)
					)
				);
			$loop = new WP_Query($args);
			if($loop->have_posts()) {
				while($loop->have_posts()) : $loop->the_post();
			?>	
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
				<?php endwhile;
				wp_reset_query();
			}
			?>
			</div>
			<div class="customNavigation">
			  <a class="btn prev"></a>
			  <a class="btn next"></a>
			</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="box-chuyen-muc">
			<?php
				$custom_terms = get_terms('chuyen_muc_bua_ngon');
				foreach($custom_terms as $custom_term) {
					$term_link = get_term_link( $custom_term );
					$image = get_field('images', 'chuyen_muc_bua_ngon_'.$custom_term->term_id);?>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pd_0">
						<div class="box-item">
						<a href="<?php echo esc_url( $term_link )?>">
							<img src="<?php echo $image['url']?>">
							<div class="box-info">
								<div class="box-info-in">
									<div class="box-title">
										<span><?php echo $custom_term->name;?></span>
									</div>
									<div class="box-mota"><?php echo $custom_term->description;?></div>
									<div class="box-xem">
										<a href="<?php echo esc_url( $term_link )?>"><span><?php _e('Đọc thêm','theanhgroup');?></span></a>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
			<?php }?>
		</div>
		<div class="box-co-so-san-xuat">
			<?php 
			//$bando = get_field('ban_do', 'option');
			$coso = get_field('hinh_anh', 'option');
			$link = get_field('url_san_xuat', 'option');
			?>
			<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="bandogoogle">
						<div class="border_map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d15681.787527385039!2d106.67461146756273!3d10.699973362684709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zIMSQxrDhu51uZyBC4budIFTDonksIHjDoyBQaMaw4bubYyBM4buZYywgaHV54buHbiBOaMOgIELDqCBUcC4gSOG7kyBDaMOtIE1pbmg!5e0!3m2!1sen!2s!4v1527271717425" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<div class="xemthem_g">
							<a href="<?php echo esc_url( get_permalink(49) ); ?>"><span><?php _e('Xem thêm','theanhgroup')?></span></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="title_home_block"><?php the_field('tieu_de','option');?></div>
					<div class="mota_gt"><?php the_field('noi_dung','option');?></div>
					<a href="<?php echo $link?>"><img src="<?php echo $coso['url'];?>" class="img-responsive"></a>
				</div>
			</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php 
				$news_img = get_field('anh_nen_news', 'option');
		?>
		<div class="box-tin-tuc" style="background:url('<?php echo $news_img['url'];?>');background-size:100% 100%">
			<div class="container">
				<div class="box-news">
					<div class="title_home_block"><?php _e('Tin tức & Khuyến mãi','theanhgroup')?></div>
					<div class="box-news-content">
					<div id="owl-news" class="owl-carousel owl-theme">
					<?php
					$args = array('post_type' => 'post',
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => 'chuong-trinh-khuyen-mai',
							),
						),
						'posts_per_page' => 5
					);
					$loop = new WP_Query($args);
					if($loop->have_posts()) {
					while($loop->have_posts()) : $loop->the_post();
					?>
						<div class="item">
							<h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $num_words = 15, $more = null);?></a></h3>
							<span class="entry-date"><i class="glyphicon glyphicon-time" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
							<a href="<?php the_permalink(); ?>"><div class="nd">
								<?php echo wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);?>
							</div></a>
							<a class="xemchitiet" href="<?php the_permalink(); ?>"><?php _e('Xem chi tiết','theanhgroup')?></a>
						</div>
					<?php endwhile;wp_reset_query();
					}?>
					</div>
						<div class="customNavigation">
						  <a class="btn prev"></a>
						  <a class="btn next"></a>
						</div>
					</div>			
				</div>
			</div>
		</div>
</section>
<?php get_footer(); ?>