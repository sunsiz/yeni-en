<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yeni
 * @subpackage Yeni
 * @since 1.0.0
 */
?>

<!--Sidebar-->
      <div class="col-md-3 sidebar list-group">
		    <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar' ); ?>
			<?php endif; ?>
      </div>
<!--/.Sidebar-->
