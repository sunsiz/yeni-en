<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Yeni
 * @subpackage Yeni
 * @since 1.0
 */

get_header(); ?>
<style>
	.row{
		text-align:center;
		margin: 5rem;
		direction:rtl;
		margin-bottom:0;
	}
	h2{
		margin: 2rem;
	}
</style>

<main class="container pt-3 text-xs-center">
		<div class="row">
			<h1 class="display-1">404</h1>
			<h2 class="display-4"> An Error Occured </h2>
			<h3>This page can not be found, it may no longer exist or temporarely unavailable.</h3><div class="row">
			<a href="<?php echo get_home_url(); ?>" class="btn btn-primary btn-lg"><?php _e( 'باش بەتكە قايتىش', 'Yeni' ); ?> </a></div>
		</div>
    </main>

<?php get_footer(); ?>