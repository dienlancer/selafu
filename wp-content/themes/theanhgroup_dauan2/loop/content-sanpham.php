<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="thumb-sanpham">
		<?php theanhgroup_thumbnail('full');?>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="mota-sanpham">
		<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="info_detail_sp">
		<div class="thanhphan">
			<strong><?php _e('Thành phần:','theanhgroup' )?></strong> <?php the_field('thanh_phan'); ?>
		</div>
		<div class="huongdan">
			<strong><?php _e('Chỉ tiêu chất lượng chủ yếu:','theanhgroup' )?> </strong><br><?php the_field('chi_tieu_chat_luong'); ?>
		</div>
		<div class="chitiet">
			<?php if(get_field('thong_tin_chi_tiet')): ?>
			<table class="table table-condensed">
		<thead>
		  <tr>
			<th><?php _e('Thông tin dinh dưỡng:','theanhgroup' )?></th>
			<th><?php _e('Hàm lượng trung bình trong mỗi khẩu phần (14g):','theanhgroup' )?></th>
			<th><?php _e('Hàm lượng trung bình trong 100g:','theanhgroup' )?></th>
		  </tr>
		</thead>
		<tbody>
		<?php while(has_sub_field('thong_tin_chi_tiet')): ?>
			<tr>
				<td><?php the_sub_field('thong_tin_dinh_duong'); ?></td>
				<td><?php the_sub_field('nang_luong_trung_binh'); ?></td>
				<td><?php the_sub_field('ham_luong_trung_binh'); ?></td>
			</tr>
		<?php endwhile; ?>
		</tbody>
	</table>
			<?php endif; ?>
		</div>
		<div class="huongdan">
			<strong><?php _e('Hướng dẩn sử dụng:','theanhgroup' )?> </strong><br><?php the_field('huong_dan_su_dung'); ?>
		</div>
		<div class="baoquan">
			<strong><?php _e('Bảo quản:','theanhgroup' )?> </strong><br><?php the_field('bao_quan'); ?>
		</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="size imgage_other">
			<?php if( have_rows('size') ): ?>
				<ul>
				<?php while( have_rows('size') ): the_row(); 
					// vars
					$image = get_sub_field('size_img');
					$content = get_sub_field('chu_thich');
					?>
					<li>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
						</br>
						<?php echo $content; ?>
					</li>
				<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="relate-post row">
			<div class="col-xs-12 col-md-4">
				<strong><?php _e('Sản phẩm tương tự:','theanhgroup' )?> </strong>
			</div>
			<div class="col-xs-12 col-md-8">
			<ul>
			<?php
				$terms = get_the_terms( $post->ID , 'chuyen_muc_san_pham', 'string');
				$term_ids = wp_list_pluck($terms,'term_id');
				$second_query = new WP_Query( array(
					'post_type' => 'san_pham',
					'tax_query' => array(
						array(
							'taxonomy' => 'chuyen_muc_san_pham',
							'field' => 'id',
							'terms' => $term_ids,
							'operator'=> 'IN' //Or 'AND' or 'NOT IN'
						 )),
						'posts_per_page' => 2,
						'ignore_sticky_posts' => 1,
						 'post__not_in'=>array($post->ID)
					) );
				//Loop show san pham tuong tu
				if($second_query->have_posts()) {	
					while ($second_query->have_posts() ) : $second_query->the_post(); ?>
						<li>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
						</li>
					<?php endwhile;
					wp_reset_query();
					}
					else {get_template_part('content', 'none');}
				?>
			</ul>
			</div>
		</div>
	</div>
</div>
