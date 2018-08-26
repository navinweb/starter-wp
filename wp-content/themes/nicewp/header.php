<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title><?php wp_title(' ', true, 'right');?></title>

	<link rel="shortcut icon" href="<?=get_template_directory_uri()?>/assets/images/favicon/favicon.icon">
	<link rel="apple-touch-icon" href="/custom-icon.png">
	<meta name="title" content="<?php bloginfo('name');?>">
	<meta name="description" content="<?php bloginfo('description');?>">
	<link rel="canonical" href="<?= WP_SITEURL ?><?= $_SERVER['REQUEST_URI']; ?>">

	<!-- critical css -->
	<style></style>

	<?php if (has_post_thumbnail($post->ID)) {
		$social_thumbs = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		$social_thumb = $social_thumbs[0]; ?>
		<meta property="og:image" content="<?= $social_thumb ?>">
		<meta name="twitter:image" content="<?= $social_thumb ?>">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="537">
		<meta property="og:image:height" content="240">
	<?php } ?>

	<?php if (!is_single()) { ?>
		<meta property="og:title" content="<?php bloginfo('name');?>" />
		<meta name="twitter:title" content="<?php bloginfo('name');?>">
		<meta property="og:description" content="<?php bloginfo('description');?>" />
		<meta name="twitter:description" content="<?php bloginfo('description');?>">
	<?php } else { $title = get_the_title($post->ID); ?>
		<meta property="og:title" content="<?= $title ?>" />
		<meta name="twitter:title" content="<?= $title ?>">
	<?php
		$excerpt = pd_get_excerpt_from_content($post->post_content, 140);?>
		<meta property="og:description" content="<?= $excerpt ?>" />
		<meta name="twitter:description" content="<?= $excerpt ?>">
	<?php } ?>

	<meta property="og:url" content="<?= WP_SITEURL ?><?= $_SERVER['REQUEST_URI']; ?>" />
	<meta name="twitter:url" content="<?= WP_SITEURL ?><?= $_SERVER['REQUEST_URI']; ?>">

	<meta property="og:type" content="website">
	<meta name="twitter:card" content="summary">

	<meta property="og:site_name" content="<?php bloginfo('name');?>">
	<meta property="og:locale" content="<?=WP_LANG?>">

	<meta name="twitter:site" content="@site_account">
	<meta name="twitter:creator" content="@individual_account">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$nicewp_description = get_bloginfo( 'description', 'display' );
			if ( $nicewp_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $nicewp_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'nicewp' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav>
	</header>

	<div id="content" class="site-content">

		<div class="container">
			213
		</div>
