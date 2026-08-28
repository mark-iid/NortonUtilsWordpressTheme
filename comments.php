<?php
/**
 * Norton Simple — Comments Template
 *
 * Loaded by comments_template() from the single post and page partials.
 *
 * @package Norton_Simple
 */

defined( 'ABSPATH' ) || exit;

/*
 * Bail on password-protected posts whose password has not been entered —
 * comments on those should stay hidden along with the content.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$norton_comment_count = get_comments_number();
			printf(
				/* translators: %s: comment count. */
				esc_html( _n( '[%s COMMENT]', '[%s COMMENTS]', $norton_comment_count, 'norton-simple' ) ),
				esc_html( number_format_i18n( $norton_comment_count ) )
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size' => 32,
			) );
			?>
		</ol>

		<?php
		the_comments_navigation( array(
			'prev_text' => esc_html__( '[&larr; OLDER COMMENTS]', 'norton-simple' ),
			'next_text' => esc_html__( '[NEWER COMMENTS &rarr;]', 'norton-simple' ),
		) );
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( '[COMMENTS CLOSED]', 'norton-simple' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form( array(
		'title_reply'         => esc_html__( '[LEAVE A COMMENT]', 'norton-simple' ),
		'title_reply_to'      => esc_html__( '[REPLY TO %s]', 'norton-simple' ),
		'cancel_reply_link'   => esc_html__( '[CANCEL]', 'norton-simple' ),
		'label_submit'        => esc_html__( 'Transmit', 'norton-simple' ),
		'comment_field'       => sprintf(
			'<p class="comment-form-comment"><label for="comment">%1$s</label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>',
			esc_html__( 'Message', 'norton-simple' )
		),
	) );
	?>

</div>
