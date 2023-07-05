<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the page header div.
 * 
 * @package Yeni
 * @subpackage Yeni
 * @since Yeni 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<title><?php if(is_home()){bloginfo('description');}else{bloginfo('name'); echo(" - "); the_title();} ?></title>
	<?php wp_head(); ?>
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
<!-- Clarity tracking code for  -->
<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#4285F4">
</head>

<body <?php body_class(); ?>>
	<span itemscope itemtype="https://schema.org/Article">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PNZDW5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
    <!--Navbar elegant-color-dark-->
    <nav class="navbar navbar-expand-lg navbar-dark light-blue accent-4">
        <div class="container">
            <a class="navbar-brand" href="/#"><span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
				<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject"><?php get_custom_logo();?><span itemprop="name" itemprop="publisher"><?php bloginfo('name');?></span></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--<ul class="navbar-nav mr-auto">-->
				  <?php
				  if ( has_nav_menu( 'navbar' ) ) {
					wp_nav_menu( array(
					'menu'              => 'navbar',
					'theme_location'    => 'navbar',
					'depth'             => 2,
					'menu_class'        => 'navbar-nav mr-auto',
					'fallback_cb'       => 'mdb_bootstrap_navwalker::fallback',
					'container'         => false,
					'walker'            => new MDBBootstrapNavMenuWalker())
					);
				  } else
				  echo "Please assign Navbar Menu in Wordpress Admin -> Appearance -> Menus -> Manage Locations";
				  ?> 
				<!--</ul>-->
                <form class="form-inline search-form mx-auto"  role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="form-row">
					<div class="col" ><label class="text-white sr-only" for="s">Search:</label></div>
                    <div class="col" ><input class="form-control rounded search-field bg-white text-primary p-2" type="text" placeholder="" aria-label="Search"  value="<?php echo get_search_query(); ?>" name="s" id="s" style="width:120px;"></div>
					<div class="col" ><button type="submit" class="btn btn-info mx-auto p-2 my-0">Search</button></div>
				</div>
                </form>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->
</header>
    