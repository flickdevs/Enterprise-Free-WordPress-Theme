<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="inner">
    <div class="block_404">
        <h1>404</h1>

        <h2>We are sorry, but the page you are looking for can not be found.</h2>

        <p>You can try searching our site or visit the homepage.</p>

        <div class="block_search_404">
            <form action="#">
                <div class="field"><input type="text" class="w_def_text" title="Search"></div>
                <div class="button"><input type="submit" value=""></div>
            </form>
        </div>
    </div>

</div>
</div>

<?php get_footer(); ?>
