<?php
/**
 * Template for displaying search forms in Theme
 *
 * @package Yeni
 * @subpackage Yeni
 * @since Yeni 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'Yeni' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search & help;', 'placeholder', 'Yeni' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'Yeni' ); ?></span></button>
</form>
