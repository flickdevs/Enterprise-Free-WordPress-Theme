<!--<div class="sidebar">-->
<!--	<aside>-->
<!--		<div class="sidebar_title_1">--><?php //_e('Categories'); ?><!--</div>-->
<!--		<ul >-->
<!--			--><?php //wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
<!--		</ul>-->
<!--	</aside>-->
<!--	<aside>-->
<!--		<div class="sidebar_title_1" >--><?php //_e('Archives'); ?><!--</div>-->
<!--		<ul >-->
<!--			--><?php //wp_get_archives('type=monthly'); ?>
<!--		</ul>-->
<!--	</aside>-->
<!--</div>-->


<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="sidebar" >
		<aside>
			<div class="sidebar_title_1">

			</div>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside>
	</div><!-- .widget-area -->
<?php endif; ?>