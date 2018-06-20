<?php
	/* Template Name: Contact */
?>
<?php get_header(); ?>
<?php 
	$image = get_field('lien_he', 'option');
?>
<section>
	<div class="archive-title" style="background:url('<?php if( !empty($image) ): ?><?php echo $image['url']; ?><?php endif; ?>')">
		<span><?php the_title(); ?></span>
	</div>
	<div id="main-content">
		<div class="container">
			<div class="panel map_block">
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d15681.787527385039!2d106.67461146756273!3d10.699973362684709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zIMSQxrDhu51uZyBC4budIFTDonksIHjDoyBQaMaw4bubYyBM4buZYywgaHV54buHbiBOaMOgIELDqCBUcC4gSOG7kyBDaMOtIE1pbmg!5e0!3m2!1sen!2s!4v1527271717425" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ct-info">
					<ol class="breadcrumb">
						<li><a href="<?php echo site_url(); ?>"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;<?php _e('Về Trang chủ','theanhgroup')?></a></li>
					</ol>
					<div class="info_contact">
						<?php the_field('thong_tin')?>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ct-form">
					<?php echo do_shortcode(''.get_field('form_contact').'')?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
