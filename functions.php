<?php
include __DIR__ . '/libs/Mobile_Detect.php';


function muhtah_setup()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'primary-menu'),
        'secondary' => __('Secondary Menu', 'secondary-menu'),
        'bottom' => __('Bottom Menu', 'bottom-menu'),
    ));
}

add_action('after_setup_theme', 'muhtah_setup');

function enterprise_inject_libraries() {
    $detect = new Mobile_Detect;
    $isMobile = $detect->isMobile();

    if(!$isMobile) {
    wp_enqueue_style( 'animation', get_template_directory_uri() . '/layout/plugins/cssanimation/animate.css', array(), null );
    wp_enqueue_style( 'animation', get_template_directory_uri() . '/layout/plugins/cssanimation/delays.css', array(), null );
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/layout/plugins/flexslider/animation_delays.css', array(), null );
    }

    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/layout/plugins/flexslider/flexslider.css', array(), null );
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/layout/plugins/flexslider/jquery.flexslider-min.js', array(), null );

    wp_enqueue_style( 'mediaelement', get_template_directory_uri() . '/layout/plugins/mediaelement/mediaelementplayer.css', array(), null );
    wp_enqueue_script( 'mediaelement', get_template_directory_uri() . '/layout/plugins/mediaelement/mediaelement-and-player.min.js', array(), null );
    wp_enqueue_script( 'mediaelement', get_template_directory_uri() . '/layout/plugins/mediaelement/custom.js', array(), null );


    wp_enqueue_script( 'jquerytool', get_template_directory_uri() . '/layout/plugins/tools/jquery.tools.min.js', array(), null );

    wp_enqueue_script( 'twitter', get_template_directory_uri() . '/layout/plugins/twitter/jquery.tweet.min.js', array(), null );

    wp_enqueue_script( 'sort', get_template_directory_uri() . '/layout/plugins/sort/jquery.sort.min.js', array(), null );

}
add_action( 'wp_enqueue_scripts', 'enterprise_inject_libraries' );


function muhtah_widgets_init()
{
    register_sidebar(array(
        'name' => __('Right Sidebar', 'enterprise'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'enterprise'),
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<div class="sidebar_title_1-title">',
        'after_title' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Bottom Post Sidebar', 'enterprise'),
        'id' => 'bottom-post-sidebar',
        'description' => __('Add widgets here to appear in your sidebar.', 'enterprise'),
        'before_widget' => '<div class="block_also_like_1">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
}

add_action('widgets_init', 'muhtah_widgets_init');

function muhtah_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2) + 1;

    global $paged;
    global $wp_query;

    if (empty($paged)) $paged = 1;

    if ($pages == '') {

        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class='block_pager_1'><ul>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages) echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li class='current'><a href='#'>" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        echo "</ul>";
        echo '<div class="info">Page ' . $paged . ' of ' . $wp_query->max_num_pages . '</div>';
        echo '<div class="clearboth"></div></div>';
    }
}


function enterprise_comment_form($args = array(), $post_id = null)
{
    if (null === $post_id)
        $post_id = get_the_ID();

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $args = wp_parse_args($args);
    if (!isset($args['format']))
        $args['format'] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';

    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');
    $html_req = ($req ? " required='required'" : '');
    $html5 = 'html5' === $args['format'];
    $fields = array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . $html_req . ' /></p>',
        'email' => '<p class="comment-form-email"><label for="email">' . __('Email') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
            '<input id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>',
        'url' => '<p class="comment-form-url"><label for="url">' . __('Website') . '</label> ' .
            '<input id="url" name="url" ' . ($html5 ? 'type="url"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
    );

    $required_text = sprintf(' ' . __('Required fields are marked %s'), '<span class="required">*</span>');

    /**
     * Filter the default comment form fields.
     *
     * @since 3.0.0
     *
     * @param array $fields The default comment fields.
     */
    $fields = apply_filters('comment_form_default_fields', $fields);
    $defaults = array(
        'fields' => $fields,
        'comment_field' => '<div class="oh"><div class="label">Message <span>*</span></div><div class="textarea"><textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></div></div>',
        /** This filter is documented in wp-includes/link-template.php */
        'must_log_in' => '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
        /** This filter is documented in wp-includes/link-template.php */
        'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'), get_edit_user_link(), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
        'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __('Your email address will not be published.') . '</span>' . ($req ? $required_text : '') . '</p>',
        'comment_notes_after' => '',
        'id_form' => 'commentform',
        'id_submit' => 'submit',
        'class_submit' => 'general_button_type_3 submit',
        'name_submit' => 'submit',
        'title_reply' => __('Leave a Reply'),
        'title_reply_to' => __('Leave a Reply to %s'),
        'cancel_reply_link' => __('Cancel reply'),
        'label_submit' => __('Submit your Comment'),
        'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'submit_field' => '<div class="button">%1$s %2$s</div>',
        'format' => 'xhtml',
    );

    /**
     * Filter the comment form default arguments.
     *
     * Use 'comment_form_default_fields' to filter the comment fields.
     *
     * @since 3.0.0
     *
     * @param array $defaults The default comment form arguments.
     */
    $args = wp_parse_args($args, apply_filters('comment_form_defaults', $defaults));

    // Ensure that the filtered args contain all required default values.
    $args = array_merge($defaults, $args);

    if (comments_open($post_id)) : ?>
        <?php
        /**
         * Fires before the comment form.
         *
         * @since 3.0.0
         */
        do_action('comment_form_before');
        ?>
        <div id="respond" class="block_leave_comment_1 type_1">
            <h3 id="reply-title"><?php comment_form_title($args['title_reply'], $args['title_reply_to']); ?>
                <small><?php cancel_comment_reply_link($args['cancel_reply_link']); ?></small>
            </h3>
            <div class="form">
                <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                    <?php echo $args['must_log_in']; ?>
                    <?php
                    /**
                     * Fires after the HTML-formatted 'must log in after' message in the comment form.
                     *
                     * @since 3.0.0
                     */
                    do_action('comment_form_must_log_in_after');
                    ?>
                <?php else : ?>
                    <form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post"
                          id="<?php echo esc_attr($args['id_form']); ?>"
                          class="comment-form"<?php echo $html5 ? ' novalidate' : ''; ?>>
                        <?php
                        /**
                         * Fires at the top of the comment form, inside the form tag.
                         *
                         * @since 3.0.0
                         */
                        do_action('comment_form_top');
                        ?>
                        <?php if (is_user_logged_in()) : ?>
                            <?php
                            /**
                             * Filter the 'logged in' message for the comment form for display.
                             *
                             * @since 3.0.0
                             *
                             * @param string $args_logged_in The logged-in-as HTML-formatted message.
                             * @param array $commenter An array containing the comment author's
                             *                               username, email, and URL.
                             * @param string $user_identity If the commenter is a registered user,
                             *                               the display name, blank otherwise.
                             */
                            echo apply_filters('comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity);
                            ?>
                            <?php
                            /**
                             * Fires after the is_user_logged_in() check in the comment form.
                             *
                             * @since 3.0.0
                             *
                             * @param array $commenter An array containing the comment author's
                             *                              username, email, and URL.
                             * @param string $user_identity If the commenter is a registered user,
                             *                              the display name, blank otherwise.
                             */
                            do_action('comment_form_logged_in_after', $commenter, $user_identity);
                            ?>
                        <?php else : ?>
                            <?php echo $args['comment_notes_before']; ?>
                            <?php
                            /**
                             * Fires before the comment fields in the comment form.
                             *
                             * @since 3.0.0
                             */
                            do_action('comment_form_before_fields');
                            foreach ((array)$args['fields'] as $name => $field) {
                                var_dump('NAYAYAYAYAYAYAYAY');
                                /**
                                 * Filter a comment form field for display.
                                 *
                                 * The dynamic portion of the filter hook, `$name`, refers to the name
                                 * of the comment form field. Such as 'author', 'email', or 'url'.
                                 *
                                 * @since 3.0.0
                                 *
                                 * @param string $field The HTML-formatted output of the comment form field.
                                 */
                                echo apply_filters("comment_form_field_{$name}", $field) . "\n";
                            }
                            /**
                             * Fires after the comment fields in the comment form.
                             *
                             * @since 3.0.0
                             */
                            do_action('comment_form_after_fields');
                            ?>
                        <?php endif; ?>
                        <?php
                        /**
                         * Filter the content of the comment textarea field for display.
                         *
                         * @since 3.0.0
                         *
                         * @param string $args_comment_field The content of the comment textarea field.
                         */
                        echo apply_filters('comment_form_field_comment', $args['comment_field']);
                        ?>
                        <?php echo $args['comment_notes_after']; ?>

                        <?php
                        $submit_button = sprintf(
                            $args['submit_button'],
                            esc_attr($args['name_submit']),
                            esc_attr($args['id_submit']),
                            esc_attr($args['class_submit']),
                            esc_attr($args['label_submit'])
                        );

                        /**
                         * Filter the submit button for the comment form to display.
                         *
                         * @since 4.2.0
                         *
                         * @param string $submit_button HTML markup for the submit button.
                         * @param array $args Arguments passed to `comment_form()`.
                         */
                        $submit_button = apply_filters('comment_form_submit_button', $submit_button, $args);

                        $submit_field = sprintf(
                            $args['submit_field'],
                            $submit_button,
                            get_comment_id_fields($post_id)
                        );

                        /**
                         * Filter the submit field for the comment form to display.
                         *
                         * The submit field includes the submit button, hidden fields for the
                         * comment form, and any wrapper markup.
                         *
                         * @since 4.2.0
                         *
                         * @param string $submit_field HTML markup for the submit field.
                         * @param array $args Arguments passed to comment_form().
                         */
                        echo apply_filters('comment_form_submit_field', $submit_field, $args);

                        /**
                         * Fires at the bottom of the comment form, inside the closing </form> tag.
                         *
                         * @since 1.5.0
                         *
                         * @param int $post_id The post ID.
                         */
                        do_action('comment_form', $post_id);
                        ?>
                    </form>
                <?php endif; ?>
            </div>
        </div><!-- #respond -->
        <?php
        /**
         * Fires after the comment form.
         *
         * @since 3.0.0
         */
        do_action('comment_form_after');
    else :
        /**
         * Fires after the comment form if comments are closed.
         *
         * @since 3.0.0
         */
        do_action('comment_form_comments_closed');
    endif;
}


function enterprise_comment_list($comment, $args, $depth)
{

    $GLOBALS['comment'] = $comment;
//    echo '<pre>' ;
//    var_dump($comment);
//    echo  '</pre>';
    echo
        '<div class="comment" id="comment-' . get_comment_ID() . '">
								<div class="inside">
									<div class="avatar"><a href="' . get_comment_author_link() . '">' . get_avatar(get_comment_author_email()) . '</a></div>
									<div class="content">
										<div class="author"><a href="#">' . get_comment_author() . '</a></div>
										<div class="info">' . get_comment_date() .
										get_comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) .
										'</div>
										<div class="text">' .
        get_comment_text() .
        '</div>
									</div>

									<div class="clearboth"></div>
								</div>
							</div>';

}

/**
 * Widget Class
 */
class Related_Post_Widget extends WP_Widget
{

    // widget constructor
    public function __construct()
    {
        parent::__construct(
            'related_post_widget',
            __('Related Post Widget', 'enterprise'),
            array(
                'classname' => 'related_post_widget',
                'description' => __('A slider show some related posts', 'enterprise')
            )
        );

        load_plugin_textdomain('enterprise', false, basename(dirname(__FILE__)) . '/languages');

    }

    public function widget($args, $instance)
    {
        // outputs the content of the widget
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $limit = $instance['limit'];

        echo $before_widget;

        ?>
        <div class="title"><?php echo $title; ?></div>

        <div id="slider" class="slider flexslider block_posts">
							<ul class="slides">
							<?php
							 // get list posts limit by $limit and loop through this list
							 ?>
								<li>
									<article class="post_type_4">
										<div class="feature">
											<div class="image">
												<a href="blog_post.html"><img src="images/pic_also_like_1_1.jpg" alt=""><span class="hover"></span></a>
											</div>
										</div>

										<div class="content">
											<div class="info">
												<div class="tags"><a href="#">LIFE</a></div>
												<div class="date">27, 2013</div>
												<div class="stats">
													<div class="likes">15</div>
													<div class="comments">7</div>
												</div>
											</div>

											<div class="title">
												<a href="blog_post.html">Quae ab illo inventore veritatis et quasi architecto.</a>
											</div>
										</div>
									</article>
								</li>
							</ul>
						</div>
        </div>

        <script type="text/javascript">
            jQuery(function () {
                init_slider_3('#slider');
            });
        </script>
        </div>
        <?php
    }

    public function form($instance)
    {
        // creates the back-end form
        $title = esc_attr($instance['title']);
        $limit = esc_attr($instance['limit']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Number of posts'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>"
                   name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo $limit; ?>"/>
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        // processes widget options on save
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['limit'] = intval($new_instance['limit']);

        return $instance;
    }

}

add_action('widgets_init', function () {
    register_widget('Related_Post_Widget');
});