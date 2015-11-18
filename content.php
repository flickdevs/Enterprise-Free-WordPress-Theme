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
            'before' => '<div class="page-links"> Page',
            'after' => '</div>',
        ));
        ?>
    <?php endif; ?>
</div>

<div class="block_info_1 type_1">
    <!-- Tag cloud here -->
    <div class="tags">
        <div class="title"><span>Tags Cloud</span></div>

        <?php
        $args = array(
            'smallest' => 8,
            'largest' => 22,
            'unit' => 'pt',
            'number' => 45,
            'format' => 'list',
            'orderby' => 'name',
            'order' => 'ASC',
            'link' => 'view',
            'taxonomy' => 'post_tag',
            'echo' => true
        );
        wp_tag_cloud($args);
        ?>
    </div>

</div>

<?php
// Author bio.
if (is_single() && get_the_author_meta('description')) :
    get_template_part('author-bio');
endif;
?>

<div class="line_1"></div>

<!-- Alsolike widget -->
<?php if (is_active_sidebar('bottom-post-sidebar')) : ?>
    <?php dynamic_sidebar('bottom-post-sidebar'); ?>
<?php endif; ?>
<!-- Comment -->
<?php
if (comments_open() || get_comments_number()) :
    comments_template();
endif;
?>