<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		<?php
		if ( have_posts() ) : ?>

			<header class="card bg-primary mb-2 z-depth-2">
				<h5 class="card-header page-title text-center text-white py-2 my-0"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search results for the word «%s» are as below', 'Yeni' ), '<span>' . get_search_query() . '</span>' );
				?></h5>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			mdb_pagination();

		else :

			get_template_part( 'content', 'none' );

		endif; ?>
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