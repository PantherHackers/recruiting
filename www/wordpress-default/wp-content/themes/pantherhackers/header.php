<html>
	<head>
		<title><?php bloginfo('name'); ?></title>
		<meta charset="utf-8">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Alice|Montserrat|Gentium+Basic|Raleway:600|Work+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css" type="text/css"/>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/mobile.css" type="text/css"/>
	</head>
	<body>
		<?php if (is_home()): ?>
			<div class="overlay-group">
				<div class="overlay-top"></div>
		<?php endif; ?>
		
		<header class="top-page-header <?php if (is_home()){ echo "home-page-header"; }?>">
			<div class="<?php if (is_home()){ echo "overlay-bottom"; }?> wrapper clearfix">
				<div class="navigation-area">
					<?php 
					 wp_nav_menu(
						 array( 
							  'menu' => 'mainnav', 'menu_class' => 'navigation',
							  'menu_id' => 'navigation', 'container' => false,
							  'theme_location' => 'primary', 'show_home' => ''
							  )
					); 
					 ?>
				</div>
				
		         

				
				<a class="logo-area" href="index.html"> <img src="<?php bloginfo('template_directory');?>/img/logo.png" class="logo"></a>
				
				<div class="social-media-area">
					<ul>
						<li> <a href="#"><i class="fa fa-facebook"></i></a></li> 
						<li> <a href="#" <i class="fa fa-twitter"></i></a></li> 
						<li> <a href="#" <i class="fa fa-instagram"></i></a></li>
						<li> <a href="#" <i class="fa fa-vine"></i></a></li>
						<li> <a href="#" <i class="fa fa-youtube-play"></i></a></li>
						<li> <a href="#" <i class="fa fa-envelope-o"></i></a></li>
					</ul>
				</div>
				<div class="mobile-hamburger-area">
					<button class="btn"><i class="fa fa-bars"></i></button>
				</div>
				
				<?php if(is_home()): ?>
					<hgroup class="pitch-group">
						<h1>Awesome Panther Hackers pitch. Much inspiration.</h1>
						<h2>Lorem ipsum dolor sit amet, consectetur adipisicing.</h2>
					</hgroup>
					
					<div class="more-area">
						<a href="#main-content">
							<p>Learn More</p>
							<i class="fa fa-angle-down"></i>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</header>
		
		<?php if(is_home()): ?> 
			</div>
		<?php endif; ?>
		