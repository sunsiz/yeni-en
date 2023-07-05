<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Yeni
 * @subpackage Yeni
 * @since Yeni 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {?>
		<p class="nocomments">Only members can see this content, please sign in.</p>
	<?php return;
}
?>
<div class="card mb-2">
	<div>
			<?php
					$comments_number = get_comments_number();
					if ( 0 == ! $comments_number ) { ?>
		<h5 class="card-header bg-primary text-white text-center z-depth-2">
						<?php if ( 1 === $comments_number ) {
							/* translators: %s: post title */
							_x( 'One comment', 'comments title', 'Yeni' );
						} else {
							printf(
								/* translators: 1: number of comments, 2: post title */
								_nx(
									'%1$s Comment',
									'%1$s Comments',
									$comments_number,
									'comments title',
									'Yeni'
								),
								number_format_i18n( $comments_number )
							);
						} ?>
		</h5>
					<?php }?>
	</div>
	<div class="cancel-comment-reply">
		<p class="text-danger"><?php cancel_comment_reply_link(); ?></p>
	</div>
	<div class="card-body">
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>For commenting please  <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">sign in</a> first. </p>
	<?php else : ?>

		<form class="form" style="padding:0 12px;" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<?php if ( $user_ID ) : ?>
				<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">Hello <?php echo $user_identity; ?></a> <br /><a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log Out">Sign Out</a></p>
			<?php else : ?>

			<div class="form-group md-form">
				<i class="fa fa-user prefix"></i>
				<label  for="author">Full Name:</label>
				<input class="form-control validate" type="text" name="author" id="author" value="<?php echo $comment_author; ?>"  tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
				<!--<label for="author" data-error="wrong" data-success="right">Do not forget the name</label>-->
			</div>

			<div class="form-group md-form">
				<i class="fa fa-envelope prefix"></i>
				<label for="email">EMail:</label>
				<input class="form-control validate" type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
				<!--<label for="email" data-error="wrong" data-success="right">Do not forget the email</label>-->
			</div>

			<?php endif; ?>
			
			<div class="form-group md-form">
				<i class="fa fa-pencil prefix"></i>
				<label for="comment">Content:</label>
				<textarea type="text" class="md-textarea" rows="7" name="comment" id="comment" tabindex="4"></textarea>
				<!--<label for="comment" data-error="wrong" data-success="right">Do not forget the comments</label>-->
			</div>

			<p><input name="submit" type="submit" id="submit" tabindex="5" class="btn btn-primary z-depth-1" value="Submit" />
				<?php comment_id_fields(); ?>
			</p>
			<?php do_action('comment_form', $post->ID); ?>

		</form>
	<?php endif; // Eğer üyelik gerekliyse ve giriş yapılmamışsa ?>
	</div>
</div>
<hr>
<?php if ( have_comments() ) : ?>
	<div class="card mb-2">
		<div class="card-body">

					<div class="commentlist">
					<?php 
						wp_list_comments( array(
					'avatar_size' => 70,
					'style'       => 'div',
					'short_ping'  => true,
					'per_page' => 100,
					'reply_text'  => __( 'Reply', 'Yeni' ),
				) );
						//wp_list_comments(); 
						?>
					</div>

				<?php //mdb_pagination(); ?><hr>
			<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( '« Previous', 'Yeni' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next »', 'Yeni' ) . '</span>' ,
		) ); ?>

		</div>
	</div>
<?php endif; ?>