<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Intensiv
 */
global $intensiv_options;
$custom_logo = $intensiv_options['intensiv-logo']['url'];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if(is_front_page()){  ?>

	<section>
		<div class="home-slider-box">
			<div class="slider">
				<ul class="slides">
					<li>
						<figure style="position:relative; min-height:631px; background: url('<?php echo get_template_directory_uri(); ?>/images/slider-1.jpg'); background-size:cover;">

							<figcaption>
								<div class="caption"><p class="cap-title">Contrary to popular belief
										<span>LIpsum is not simply text</span></p><div class="slider-ship"><img src="<?php echo get_template_directory_uri(); ?>/images/slider-ship.png" alt="">
									</div>
								</div>
							</figcaption>
						</figure>
					</li>
					<li>
						<figure style="position:relative; min-height:631px; background: url('<?php echo get_template_directory_uri(); ?>/images/slider-1.jpg'); background-size:cover;">

							<figcaption style="position:absolute; top:0;left:0; width:100%;">
								<div class="caption"><p class="cap-title">Contrary to popular belief
										<span>LIpsum is not simply text</span></p><div class="slider-ship"><img src="<?php echo get_template_directory_uri(); ?>/images/slider-ship.png" alt="">
									</div>
								</div>
							</figcaption>
						</figure>
					</li>
				</ul>
			</div>

		</div>



		<header class="home" style="position: absolute; top:0;left:0; width:100%;">

			<div class="container">
				<div class="line-top">
					<div class="wither-w">
						<span class="cloud"><img src="<?php echo get_template_directory_uri() ?>/images/cloud.png" alt="" /></span>
						<span>18°c</span>
						<div class="city-wrap"><a href="javascript:void(0)" class="w-select">London <i class="fa fa-angle-down"></i></a>
							<div class="city-drop">
								<a href="#">Paris</a>
								<a href="#">Kopengagen</a>
								<a href="#">Berlin</a>
							</div>
						</div>
					</div>
					<div class="logo">
						<a href="<?php echo home_url("/"); ?>"><?php if($custom_logo){ ?>
								<img src="<?php echo esc_url($custom_logo); ?>" alt="" />
							<?php } ?></a>
					</div>
					<div class="contacts">
						<?php if($intensiv_options['header-phone']) { ?><span><i class="fa fa-mobile"></i><?php echo esc_attr($intensiv_options['header-phone']); ?></span><?php } ?>
						<?php if($intensiv_options['header-email']) { ?><span><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr($intensiv_options['header-email']); ?>"><?php echo esc_attr($intensiv_options['header-email']); ?></a></span><?php } ?>
					</div>
				</div>
				<nav class="main-nav in">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class' => 'nav-menu',
						'container' => 'ul'
					) );
					?>
					<div class="search">
						<form method="GET" action="<?php echo home_url("/"); ?>" class="search-form">
							<input type="text" name="s" id="search-input" placeholder="Keywords"/>
							<button class="btn-search"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</nav>
			</div>
		</header>
	</section>

	<div class="q-search">
		<div class="container">
			<div class="q-search-wrap">
				<form method="POST" action="<?php echo home_url("/deals"); ?>">
				<?php $current_location = get_terms('location');?>
				<select id="location" name="location">
					<?php foreach($current_location as $location){?>
						<option><?php echo $location->name; ?></option>
					<?php } ?>
				</select>
				<?php $current_type = get_terms('type');?>
				<select id="type" name="type">
					<?php foreach($current_type as $type){?>
						<option><?php echo $type->name; ?></option>
					<?php } ?>
				</select>
				<?php $current_price = get_terms('price');?>
				<select id="coast" name="price">
					<?php foreach($current_price as $price){?>
						<option><?php echo $price->name; ?></option>
					<?php } ?>
				</select>
					<button class="btn btn-yellow">quick Search</button>
				</form>
			</div>
		</div>
	</div>

<?php } else { ?>
<section>

	<header class="inner">
		<div class="container">
			<div class="line-top">
				<div class="wither-w">
					<span class="cloud"><img src="<?php echo get_template_directory_uri() ?>/images/cloud.png" alt="" /></span>
					<span>18°c</span>
					<div class="city-wrap"><a href="javascript:void(0)" class="w-select">London <i class="fa fa-angle-down"></i></a>
						<div class="city-drop">
							<a href="#">Paris</a>
							<a href="#">Kopengagen</a>
							<a href="#">Berlin</a>
						</div>
					</div>
				</div>
				<div class="logo">
					<a href="<?php echo home_url("/"); ?>"><?php if($custom_logo){ ?>
							<img src="<?php echo esc_url($custom_logo); ?>" alt="" />
						<?php } ?></a>
				</div>
				<div class="contacts">
					<?php if($intensiv_options['header-phone']) { ?><span><i class="fa fa-mobile"></i><?php echo esc_attr($intensiv_options['header-phone']); ?></span><?php } ?>
					<?php if($intensiv_options['header-email']) { ?><span><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr($intensiv_options['header-email']); ?>"><?php echo esc_attr($intensiv_options['header-email']); ?></a></span><?php } ?>
				</div>
			</div>
			<nav class="main-nav in">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class' => 'nav-menu',
					'container' => 'ul'
				) );
				?>
				<div class="search">
					<form method="GET" action="<?php echo home_url("/"); ?>" class="search-form">
						<input type="text" name="s" id="search-input" placeholder="Keywords"/>
						<button class="btn-search"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</nav>
		</div>

	</header>

</section>

<?php } ?>

