<?php
function muhtah_setup()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'primary-menu'),
        'secondary' => __('Secondary Menu', 'secondary-menu'),
        'bottom' => __('Bottom Menu', 'bottom-menu'),
    ));
}

add_action('after_setup_theme', 'muhtah_setup');


function muhtah_widgets_init()
{
    register_sidebar(array(
        'name' => __('Widget Area', 'muhtah'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentyfifteen'),
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<div class="sidebar_title_1-title">',
        'after_title' => '</div>',
    ));
}

add_action('widgets_init', 'muhtah_widgets_init');

function muhtah_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2)+1;

    global $paged;
    global $wp_query;

    if(empty($paged)) $paged = 1;

    if($pages == '')
    {

        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class='block_pager_1'><ul>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class='current'><a href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
        echo "</ul>";
        echo '<div class="info">Page ' . $paged . ' of ' . $wp_query->max_num_pages . '</div>';
        echo '<div class="clearboth"></div></div>';
    }
}