<div class="list_new">
<ul>
	<li>
		<a href="<?php echo the_permalink( get_the_ID() )?>">
			<?php theanhgroup_thumbnail(array(210,160)); ?>
		</a>
		<?php theanhgroup_entry_header(); ?>
		<div class="margin-bottom">
			<?php theanhgroup_entry_meta(); ?>
		</div>
		<?php theanhgroup_entry_content(); ?>
		<div class="text-right"><a class="read-more" href="<?php echo the_permalink( get_the_ID() )?>"><?php _e('Xem chi tiết', 'theanhgroup')?></a></div>	
	</li>
<ul>
</div>