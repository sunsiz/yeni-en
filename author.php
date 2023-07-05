<?php get_header(); ?>
<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
<div class="container my-4 px-4" id="author">
<div class="card mb-3">
	<header>
		<a href="<?php echo $curauth->user_url; ?>">
			<h5 class="card-header text-center text-white bg-primary z-depth-2">Author: <?php echo $curauth->display_name; ?></h5>
		</a>
	</header>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4 offset-md-1 mt-2 mx-2 p-0">
				<div class="view overlay z-depth-1-half">
					<img src="https://www.musulmanlar.com/wp-content/uploads/2019/09/2.png" alt="<?php echo $curauth->name; ?>" style="max-width: 100%!important;">
					<a href="<?php echo $curauth->user_url; ?>"><div class="mask waves-effect waves-light"></div></a>
				</div>
			</div>
				<div class="col-md-7 mr-3 mt-2 p-0">
						<ul>
							<li><span class="feature">Full Name:</span>
								<span><?php echo $curauth->first_name."   ".$curauth->last_name; ?></span>
							</li>
							<li><span class="feature">Nick Name:</span>
								<span><?php echo $curauth->nickname; ?></span>
							</li>
							<li><span class="feature">Web Site: </span>
								<span><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></span>
							</li>
							<li><span class="feature">EMail:</span>
								<span><?php echo $curauth->user_email; ?></span>
							</li>
							<li><span class="feature">About Me:</span>
								<span><?php echo $curauth->description; ?></span>
							</li>
    					</ul>
				</div>
		</div>
	</div>
</div>
<div class="card">
	<h5 class="card-header text-center text-white bg-primary z-depth-2">
		<?php echo $curauth->display_name; ?> Posts:
	</h5>
</div>	
</div>
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