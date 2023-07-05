<?php
/**
 * @package Yeni
 * @subpackage Yeni
 * @since Yeni 1.0
 */

/*
Template Name: Audio & Video
*/
?>

<?php get_header(); ?>

<main>
<!--Main layout-->
<div class="container">
    <div class="row" style="display: inline-flex!important;direction: ltr!important;width: inherit;">
        <!--Main column-->
        <div class="card-columns col-md-9 alignleft">
            <?php
            if ( have_posts() ) :

						while ( have_posts() ) :
							the_post();
								get_template_part( 'content', 'gallery' );
						endwhile;
						the_posts_pagination();
					else :
						get_template_part( 'content', 'none' );
					endif;
            ?>
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