<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * 
 * 
 * @link https://www.musulmanlar.com/
 *
 * @package Yeni
 * @subpackage Yeni
 * @since Yeni 1.0
 */
get_header(); ?>

<main>
<!--Main layout-->
<div class="container">
    <div class="row" style="display: inline-flex!important;direction: ltr!important;width: inherit;margin:0;">
        <!--Main column-->
        <div class="col-md-9 alignleft">
            <?php
            if ( have_posts() ) {
            while ( have_posts() ) {
            the_post();
            ?>
            <!--Post-->
			<?php get_template_part('content', 'index'); ?>
			<!--/.Post-->
            <hr>
            <?php
            } // end while
            } // end if
            ?>
			<?php mdb_pagination();  ?>
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
<!--/.Main layout-->
</main>
            
<?php get_footer(); ?>