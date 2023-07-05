<?php /* Template Name: Friendly Links */ 
get_header(); ?>

<main>
<!--Main layout-->
<div class="container">
    <div class="row" style="display: inline-flex!important;direction: ltr!important;">
        <!--Main column-->
        <div class="col-md-9 alignleft">
            <?php
            if ( have_posts() ) {  while ( have_posts() ) { the_post();  ?>
            <!--Links-->
			<div class="card mb-3">
					<?php wp_list_bookmarks('categorize=1&category_before=&category_after=&title_before=<h5 itemprop="headline" class="card-header text-center text-white bg-primary z-depth-2 mb-3">&title_after=</h5>'); ?>
			</div>
			<!--/.Links-->
            <?php
            } // end while
            } // end if
            ?>
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
<!--/.Main layout-->
</main>
            
<?php get_footer(); ?>