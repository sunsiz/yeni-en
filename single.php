<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php get_header(); ?>

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
            <?php get_template_part('content'); ?>
			<!--/.Post-->
            <hr>
            <?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
            } // end while
            } // end if
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