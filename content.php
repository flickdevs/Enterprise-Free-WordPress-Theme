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
</div>

<?php
// Author bio.
if ( is_single() && get_the_author_meta( 'description' ) ) :
    get_template_part( 'author-bio' );
endif;
?>

<div class="line_1"></div>

<!-- Alsolike widget -->
<!-- Comment -->
<?php
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
?>