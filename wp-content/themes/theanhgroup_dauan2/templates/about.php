<?php
	/* Template Name: About */
?>
<?php get_header(); ?>
<?php 
	$image = get_field('about', 'option');
?>
<section>
	<div class="archive-title" style="background:url('<?php if( !empty($image) ): ?><?php echo $image['url']; ?><?php endif; ?>')">
		<span><?php the_title(); ?></span>
	</div>
	<div id="main-content">
		<div class="container">
			<div class="conten_about">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab1"><?php _e('Cơ sở sản xuất','theanhgroup');?></a></li>
					<li><a data-toggle="tab" href="#tab2"><?php _e('Sứ mệnh thành lập','theanhgroup');?></a></li>
				</ul>
				<div class="tab-content">
					<div id="tab1" class="tab-pane fade in active">
					  <?php the_field('co_so_san_xuat');?>
					</div>
					<div id="tab2" class="tab-pane fade">
					  <?php the_field('su_menh_thanh_lap');?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
