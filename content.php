<?php
/**
 * @package SKT I Am One
 */
?>
<div class="block_content" id="post-<?php the_ID(); ?>">

    <?php if (is_search() || !is_single()) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
            <p class="read-more"><a href="<?php the_permalink(); ?>">Read More &raquo;</a></p>
        </div><!-- .entry-summary -->
    <?php else : ?>
        <div class="pic"><?php the_post_thumbnail('large'); ?></div>
        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'skt-iamone'),
            'after' => '</div>',
        ));
        ?>
    <?php endif; ?>
</div>

<!--    <footer class="entry-meta" style="display:none;">-->
<!--        --><?php //if ('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
<!--            --><?php
//            /* translators: used between list items, there is a space after the comma */
//            $categories_list = get_the_category_list(__(', ', 'skt-iamone'));
//            if ($categories_list && skt_iamone_categorized_blog()) :
//                ?>
<!--                <span class="cat-links">-->
<!--                    --><?php //printf(__('Posted in %1$s', 'skt-iamone'), $categories_list); ?>
<!--                </span>-->
<!--            --><?php //endif; // End if categories ?>
<!---->
<!--            --><?php
//            /* translators: used between list items, there is a space after the comma */
//            $tags_list = get_the_tag_list('', __(', ', 'skt-iamone'));
//            if ($tags_list) :
//                ?>
<!--                <span class="tags-links">-->
<!--                    --><?php //printf(__('Tagged %1$s', 'skt-iamone'), $tags_list); ?>
<!--                </span>-->
<!--            --><?php //endif; // End if $tags_list ?>
<!--        --><?php //endif; // End if 'post' == get_post_type() ?>
<!---->
<!--        --><?php //if (!post_password_required() && (comments_open() || '0' != get_comments_number())) : ?>
<!--            <span-->
<!--                class="comments-link">--><?php //comments_popup_link(__('Leave a comment', 'skt-iamone'), __('1 Comment', 'skt-iamone'), __('% Comments', 'skt-iamone')); ?><!--</span>-->
<!--        --><?php //endif; ?>
<!---->
<!--        --><?php //edit_post_link(__('Edit', 'skt-iamone'), '<span class="edit-link">', '</span>'); ?>
<!--    </footer>-->
<!--    <!-- .entry-meta -->
<!--    <!-- #post-## -->
<!--    <div class="spacer20"></div>-->
<!--    <!-- blog-post-repeat -->