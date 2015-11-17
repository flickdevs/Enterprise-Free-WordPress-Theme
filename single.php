<?php
/**
 * The Template for displaying all single posts.
 *
 * @package SKT I Am One
 */

get_header(); ?>

<div class="inner">
    <?php if ( is_single() ) : ?>
            <div class="block_general_title_2">
					<h1><?php the_title(); ?></h1>
					<h2>
                        <a href="#" class="tags"><?php the_category(' '); ?></a>&nbsp;&nbsp;/&nbsp;&nbsp;
                        <span class="author">by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>&nbsp;&nbsp;/&nbsp;&nbsp;
                        <span class="date"><?php the_time('F jS, Y') ?></span>
					</h2>
					<div class="stats">
						<div class="likes">15</div>
						<div class="comments">7</div>
					</div>
				</div>
        <?php endif; ?>
        <div class="main_content">
			<?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'single' ); ?>
<!--                --><?php
//                // If comments are open or we have at least one comment, load up the comment template
//                if ( comments_open() || '0' != get_comments_number() )
//                    comments_template();
//                ?>
            <?php endwhile; // end of the loop. ?>
        </div>

        <?php get_sidebar();?>
        <div class="clearboth"></div>

        </div>
    </div>
</div>
<?php get_footer(); ?>