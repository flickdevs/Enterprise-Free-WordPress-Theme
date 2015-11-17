<div class="block_about_author_post">
    <div class="photo">
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
        </a>
    </div>

    <div class="content">
        <div class="name">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
        </div>

        <div class="description">
            <?php the_author_meta( 'description' ); ?>
        </div>
    </div>
</div>