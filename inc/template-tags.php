<?php
/**
 * Custom template tags for Yeni
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * Custom list of comments for the theme.
 * 
 * @package Yeni
 * @since Yeni 1.0
 */
 
if ( ! function_exists( 'Yeni_comments_list' ) ) :
	function Yeni_comments_list( $comment, $args, $depth ) {
		?>
		<div <?php comment_class( empty( $args['has_children'] ) ? 'media' : 'parent media' ); ?>
				id="comment-<?php comment_ID(); ?>">
			<?php if ( $args['type'] != 'pings' ) : ?>
				<a class="pull-left" href="<?php echo esc_url( get_comment_author_url( $comment ) ); ?> ">
					<div class="comment-author avatar vcard">
						<?php
						if ( $args['avatar_size'] != 0 ) {
							echo get_avatar( $comment, 64 );
						}
?>
					</div>
				</a>
			<?php endif; ?>
			<div class="media-body">
				<h4 class="media-heading">
					<?php echo get_comment_author_link(); ?>
					<small>
						<?php
						printf(
							/* translators: %1$s is Date, %2$s is Time */
							esc_html__( '&#183; %1$s at %2$s', 'Yeni' ),
							get_comment_date(),
							get_comment_time()
						);
						edit_comment_link( esc_html__( '(Edit)', 'Yeni' ), '  ', '' );
						?>
					</small>
				</h4>
				<?php comment_text(); ?>
				<div class="media-footer">
					<?php
					echo get_comment_reply_link(
						array(
							'depth'      => $depth,
							'max_depth'  => $args['max_depth'],
							'reply_text' => sprintf( '<i class="fa fa-mail-reply"></i> %s', esc_html__( 'Reply', 'Yeni' ) ),
						),
						$comment->comment_ID,
						$comment->comment_post_ID
					);
					?>
				</div>
			</div>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'Yeni_comments_template' ) ) :
	function Yeni_comments_template() {
		if ( is_user_logged_in() ) {
			$current_user = get_avatar( wp_get_current_user(), 64 );
		} else {
			$current_user = '<img src="' . get_template_directory_uri() . '/img/placeholder.jpg" height="64" width="64"/>';
		}
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$args     = array(
			'class_form'         => 'form',
			'class_submit'       => 'btn btn-primary pull-right',
			'title_reply_before' => '<h3 class="Yeni-title text-center">',
			'title_reply_after'  => '</h3> <span class="pull-left author"> <div class="avatar">' . $current_user . '</div> </span> <div class="media-body">',
			'must_log_in'        => '<p class="must-log-in">' .
									sprintf(
										wp_kses(
											/* translators: %s is Link to login */
											__( 'You must be <a href="%s">logged in</a> to post a comment.', 'Yeni' ), array(
												'a' => array(
													'href' => array(),
												),
											)
										), esc_url( wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) )
									) . '</p> </div>',
			'fields'             => apply_filters(
				'comment_form_default_fields', array(
					'author' => '<div class="row"> <div class="col-md-4"> <div class="form-group label-floating is-empty"> <label class="control-label">' . esc_html__( 'Name', 'Yeni' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="author" name="author" class="form-control" type="text"' . $aria_req . ' /> <span class="Yeni-input"></span> </div> </div>',
					'email'  => '<div class="col-md-4"> <div class="form-group label-floating is-empty"> <label class="control-label">' . esc_html__( 'Email', 'Yeni' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="email" name="email" class="form-control" type="email"' . $aria_req . ' /> <span class="Yeni-input"></span> </div> </div>',
					'url'    => '<div class="col-md-4"> <div class="form-group label-floating is-empty"> <label class="control-label">' . esc_html__( 'Website', 'Yeni' ) . '</label><input id="url" name="url" class="form-control" type="url"' . $aria_req . ' /> <span class="Yeni-input"></span> </div> </div> </div>',
				)
			),
			'comment_field'      => '<div class="form-group label-floating is-empty"> <label class="control-label">' . esc_html__( 'What\'s on your mind?', 'Yeni' ) . '</label><textarea id="comment" name="comment" class="form-control" rows="6" aria-required="true"></textarea><span class="Yeni-input"></span> </div> </div>',
		);

		return $args;
	}
endif;

if ( ! function_exists( 'Yeni_comments_pagination' ) ) :
	/**
	 * Display a custom number page navigation for comments.
	 *
	 * @since Yeni 1.0
	 */
	function Yeni_comments_pagination() {
		$pages = paginate_comments_links(
			array(
				'echo' => false,
				'type' => 'array',
			)
		);
		if ( is_array( $pages ) ) {
			echo '<div class="text-center"><ul class="nav pagination pagination-primary">';
			foreach ( $pages as $page ) {
				echo '<li>' . $page . '</li>';
			}
			echo '</ul></div>';
		}
	}
endif;

if ( ! function_exists( 'Yeni_related_posts' ) ) :
	/**
	 * Related posts for single view.
	 *
	 * @since Yeni 1.0
	 */
	function Yeni_related_posts() {
		global $post;
		$cats         = wp_get_object_terms(
			$post->ID, 'category', array(
				'fields' => 'ids',
			)
		);
		$args         = array(
			'posts_per_page'      => 3,
			'cat'                 => $cats,
			'orderby'             => 'date',
			'ignore_sticky_posts' => true,
			'post__not_in'        => array( $post->ID ),
		);
		$allowed_html = array(
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'i'      => array(
				'class' => array(),
			),
			'span'   => array(),
		);

		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) :
			?>
			<div class="section related-posts">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="Yeni-title text-center"><?php esc_html_e( 'Related Posts', 'Yeni' ); ?></h2>
							<div class="row">
								<?php
								while ( $loop->have_posts() ) :
									$loop->the_post();
?>
									<div class="col-md-4">
										<div class="card card-blog">
											<?php if ( has_post_thumbnail() ) : ?>
												<div class="card-image">
													<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php the_post_thumbnail( 'Yeni-blog' ); ?>
													</a>
												</div>
											<?php endif; ?>
											<div class="content">
												<h6 class="category text-info"><?php Yeni_category(); ?></h6>
												<h4 class="card-title">
													<a class="blog-item-title-link" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
														<?php echo wp_kses( force_balance_tags( get_the_title() ), $allowed_html ); ?>
													</a>
												</h4>
												<p class="card-description"><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
endif;
?>