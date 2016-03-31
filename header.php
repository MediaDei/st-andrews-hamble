<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset='<?php bloginfo('charset') ?>'>
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow">
	<?php }?>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/global.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" type="text/css">
	<link rel='stylesheet' href='https://api.tiles.mapbox.com/mapbox.js/v2.2.0/mapbox.css' type="text/css">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
	<link rel="shortcut icon" href="favicon.png">
	<meta property="og:site_name" content="St. Andrew's Church, Hamble" />		
	<meta property="og:url" content="http://standrewshamble.org/" />
	<meta property="og:title" content="St. Andrew's Church, Hamble" />
	<meta property="og:description" content="The Church in Hamble-le-Rice, Southampton. Come worship God this Sunday!" />
	<meta property="og:image" content="http://standrewshamble.org/wp-content/themes/standrewshamble_1/images/home--header.jpg" />
	
	<title>St. Andrew's, Hamble</title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="page-wrap">
		<header>
			<div class="title-wrapper">
			  <figure class="seal"><img src="<?php bloginfo('template_url'); ?>/images/header_seal.jpg"/></figure>
			  <h1 class="main-title"><a href="#">
			    <span>St. Andrew's</span> 
			    Church
			    <span>Hamble</span>
			  </a></h1>
			</div>

			<div class="social">
			  <a class="fa fa-facebook" href="https://www.facebook.com/standrewshamble/"></a>
			  <a class="fa fa-twitter" href="https://twitter.com/standrewshamble"></a>
			  <a class="fa fa-rss" href="/rss/"></a>
			  <a class="fa fa-envelope contact" href="#" onclick="return false;"></a>
			</div>

			<nav class="main-nav"><div class="container">
			  <a class="home" href="/">Home</a>
			  <a class="about" href="/about/">About</a>
			  <a class="whats-on" href="/whats-on/">What's On</a>
			  <a class="weddings-and-baptisms" href="/weddings-and-baptisms/">Weddings/Baptisms</a>
			  <a class="children" href="/children/">Children</a>
			  <a class="community" href="/community/">Community</a>
			</div></nav>

