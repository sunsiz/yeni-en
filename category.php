<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yeni
 * @subpackage Yeni
 * @since 1.0
 */

get_header(); ?>

<main>
<!--Main layout-->
<div class="container">
    <div class="row" style="display: inline-flex!important;direction: ltr!important;width: inherit;">
        <!--Main column-->
        <div class="col-md-9 alignleft">
			<div class="card text-white mb-3">
				<?php if (is_category())  { ?>
				<h5 itemprop="headline" class="card-header text-center text-white bg-primary z-depth-2"><?php single_cat_title(); ?></h5>
				<?php } ?>
				<ul class="list-group list-group-flush" style="padding: 10px;">
					<?php while (have_posts()) : the_post(); ?>
						<li class="list-group-item  list-group-item-action"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"> - <?php the_title() ?></a></li>
					<?php endwhile; ?>
				</ul><?php mdb_pagination(); ?> 
			</div>
        </div>
        <!--Sidebar-->
		<div class="col-md-3 sidebar list-group alignright">
		    <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar' ); ?>
			<?php endif; ?>
		</div>
        <!--/Sidebar-->
    </div>
</div>
<!--/.Main layout-->
</main>

<?php get_footer(); ?>