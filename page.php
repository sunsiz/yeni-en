<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yeni
 * @subpackage Yeni
 * @since 1.0.0
 */

get_header(); ?>

<main>
<!--Main layout-->
<div class="container">
    <div class="row" style="display: inline-flex!important;direction: ltr!important;width: inherit;">
        <!--Main column-->
        <div class="col-md-9 alignleft">
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'content' ); ?>
				<hr>
	            <?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop. ?>
			<?php mdb_pagination(); ?> 
		</div>
		<!--/Main column-->
		<!--Sidebar-->
		<div class="col-md-3 sidebar list-group alignright">
		    <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar' ); ?>
			<?php endif; ?>
		</div>
        <?php //get_sidebar(); ?>
        <!--/.Sidebar-->
    </div>
</div>
</main><!-- #main -->

<?php get_footer(); ?>