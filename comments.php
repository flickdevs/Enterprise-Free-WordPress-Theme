<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Enterprise
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div class="block_comments_1">
    <h3>Comments <span><?php echo get_comments_number(); ?></span></h3>
    <?php if (have_comments()) : ?>
        <div class="comments">
            <?php
            $comments = wp_list_comments(array(
                'avatar_size' => 60,
                'callback' => 'enterprise_comment_list'
            ));
            ?>
        </div><!-- .comment-list -->

    <?php endif; // have_comments() ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'enterprise'); ?></p>
    <?php endif; ?>

    <?php

    $fields = apply_filters( 'comment_form_default_fields', array(
        'name' => '<div class="label">Name ' . ($req ? '<span class="required">*</span>' : '') . '</div>' .
            '<div class="field"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" ' . $aria_req . ' /></div>',
        'email' => '<div class="label">Email ' . ($req ? '<span class="required">*</span>' : '') . '</div>' .
            '<div class="field"><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" ' . $aria_req . ' /></div>',
    ));
//    $fields   =  array(
//        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
//            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
//        'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
//            '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
//        'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
//            '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
//    );

    $comments_args = array(
        'fields' => $fields
    );

    	enterprise_comment_form($comments_args);
//    comment_form($comments_args);
    ?>
</div>

