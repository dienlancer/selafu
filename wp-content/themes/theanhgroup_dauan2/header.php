<!DOCTYPE html>
<html <?php language_attributes(); ?> />
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" />
	<link rel="profile" href="http://gmgp.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<div class="container">
			<div id="header">
				<div class="logo"><a href="<?php echo esc_url( home_url() );?>"><img style="height:150px" src="<?php echo get_template_directory_uri()?>/images/logo_selafu.png"></a></div>
			</div>
		</div>
	</header>
	<nav class="header-nav">
		<div class="container">
			<div class="menu">
				<a onclick="openNav();"><img src="<?php echo get_template_directory_uri()?>/images/menu-icon.png"></a>
			</div>
			<div id="mySidenav" class="sidenav">
				<div class="closebtn"><a href="javascript:void(0)" onclick="closeNav()">
				<img src="<?php echo get_template_directory_uri()?>/images/close.png"></a><span>Menu</span></div>
				<?php theanhgroup_menu('primary-menu');?>
			</div>
			<div class="hotline">
				<div class="language">Selafu sẵn sàng phục vụ:</div>
				<img src="<?php echo get_template_directory_uri()?>/images/hotline.jpg">
			</div>
		</div>
	</nav>