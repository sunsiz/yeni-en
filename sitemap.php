<?php
/*
Template Name: Sitemap
*/
get_header();?>

<main>
	<div class="container">
		<div class="row" style="display: inline-flex!important;direction: ltr!important;width: inherit;">
			<!--Main column-->
			<div class="col-md-9 alignleft">
				<div class="card mb-3">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h5 class="text-center card-header bg-primary z-depth-2 text-white"><?php the_title(''); ?></h5>
						<div class="card-body">
							<div id="cevap" style="margin:35px 0 0 0"><?php the_content(''); ?></div>
						<?php echo ddsg_create_sitemap(); ?>
						<?php //comments_template(); ?>
					   <hr>
						<?php endwhile; else: ?>
						<?php endif; ?>
					<?php mdb_pagination(); ?> 
				</div>
				</div>
			</div>
			<!--/Main column-->
			<!--Sidebar-->
			<div class="col-md-3 sidebar alignright">
				<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar' ); ?>
				<?php endif; ?>
			</div>
			<!--/.Sidebar-->
		</div>
	</div>
</main>

<?php get_footer(); ?>