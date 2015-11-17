<?php get_header(); ?>
<?php
//    //Protect against arbitrary paged values
//    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
//
//    $args = array(
//        'posts_per_page' => 2,
//        'paged' => $paged,
//    );
//
//    $the_query = new WP_Query( $args );
//?>
    <div class="inner">
        <?php if ( is_category() ) : ?>
            <div class="block_general_title_1">
                <h1><?php single_cat_title(); ?></h1>

                <h2><?php echo term_description() ?></h2>
            </div>
        <?php endif; ?>
        <div class="main_content">
            <?php if (have_posts()) : ?>
                <div class="block_posts type_3">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="post_type_4">
                            <div class="feature">
                                <div class="image">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><span
                                            class="hover"></span></a>
                                </div>
                            </div>

                            <div class="content">
                                <div class="info">
                                    <div class="tags"><?php the_category(' '); ?></div>
                                    <div class="date"><?php the_time('F jS, Y') ?></div>
                                    <div class="stats">
                                        <div class="likes">15</div>
                                        <div class="comments">7</div>
                                    </div>
                                </div>

                                <div class="title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>

                                <div class="line_1"></div>
                            </div>
                        </article>

                        <?php endwhile; ?>
                        </div>
                    <div class="separator" style="height:43px;"></div>
                    <?php muhtah_pagination(); ?>
<!--                    <div class="block_pager_1">-->
<!--                        <ul>-->
<!--                            <li class="current"><a href="#">1</a></li>-->
<!--                            <li><a href="#">2</a></li>-->
<!--                            <li><a href="#">3</a></li>-->
<!--                            <li class="skip">...</li>-->
<!--                            <li><a href="#">7</a></li>-->
<!--                            <li><a href="#" class="next">Next</a></li>-->
<!--                        </ul>-->
<!---->
<!--                        <div class="info">Page 1 of 7</div>-->
<!---->
<!--                        <div class="clearboth"></div>-->
<!--                    </div>-->
            <?php else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>

            <div class="clearboth"></div>

        </div>
    </div>
</div>
<?php get_footer(); ?>