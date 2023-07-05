<!--Post-->
<div class="mb-3">
	<!--Post data-->
	<!--Card Narrower-->
		<div class="card card-cascade narrower" style="max-width: 45rem;">

			<!--Card image-->
				<div class="view overlay hm-white-slight z-depth-1-half">
					<?php the_post_thumbnail( 'full', array( 'class'=> 'img-fluid z-depth-2')); ?>
					<a href="<?php echo get_permalink(); ?>">
						<div class="mask"></div>
					</a>
				</div>
			<!--/.Card image-->
			<!--Card content-->
				<div class="card-body">
					<!--<h5 class="pink-text"><i class="fa fa-cinema"></i>Videos</h5>-->
					<!--Title-->
					<a href="<?php echo get_permalink(); ?>">
						<h5 itemprop="headline" class="card-title text-center text-primary"><?php the_title(); ?></h5>
					</a>
					<!--Text-->
					<h6 class="card-subtitle mb-2 text-muted">Author: <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>, Time: <?php echo get_the_date(); ?>
						<div id="sosyal" class="social-section btn-group" role="group">
							<a class=" btn-floating btn-small waves-effect waves-light" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="blank" title="Share"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
							<a class=" btn-floating btn-small waves-effect waves-light" href="https://twitter.com/home?status=<?php the_title() ?> <?php  esc_url( home_url() ); ?>/?p=<?php the_ID(); ?>&title=<?php the_title(); ?>" target="_blank" title="Share"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<div id="goruntuleme"><?php if(function_exists('the_views')) { the_views(); } ?></div>
						</div>
					</h6>
					<?php //if (!is_singular()){ the_excerpt(); } else { the_content(); } ?>
					<a class="btn btn-primary" href="<?php  echo get_permalink(); ?>">Read</a>
				</div>
			<!--/.Card content-->

		</div>
	<!--/.Card Narrower-->
</div>
<!--/.Post-->
