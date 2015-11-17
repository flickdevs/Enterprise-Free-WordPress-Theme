<!-- FOOTER BEGIN -->
<footer>
	<div id="footer">
		<section class="top">
			<div class="inner">
				<div class="block_footer_widgets">
					<div class="column">
						<div class="block_footer_categories">
							<h3>Posts Categories</h3>

							<ul>
								<li><a href="category_photography.html">PHOTOGRAPHY</a></li>
								<li><a href="category_design.html">DESIGN</a></li>
								<li><a href="category_fashion.html">FASHION</a></li>
								<li><a href="category_reviews.html">REVIEWS</a></li>
								<li><a href="category_music.html">MUSIC</a></li>
								<li><a href="category_technology.html">TECHNOLOGY</a></li>
								<li><a href="category_life.html">LIFE</a></li>
								<li><a href="category_travel.html">TRAVEL</a></li>
							</ul>
						</div>
					</div>

					<div class="column">
						<div class="block_footer_tags">
							<h3>Tags cloud</h3>

							<ul>
								<li><a href="#">Peoples</a></li>
								<li><a href="#">Design</a></li>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Music</a></li>
								<li><a href="#">Photography</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Creative</a></li>
								<li><a href="#">Apple</a></li>
								<li><a href="#">News</a></li>
								<li><a href="#">Development</a></li>
							</ul>
						</div>

						<div class="block_footer_twitter">
							<h3>Twitter Widget</h3>

							<div id="tweets"></div>

							<script type="text/javascript">
								jQuery(document).ready(function() {
									jQuery('#tweets').tweet({
										username : 'WebLionMedia',
										modpath : '/layout/plugins/twitter/',
										count : 1,
										loading_text : 'Loading twitter feed...',
										template : '{user} {text}{time}'
									});
								});
							</script>
						</div>
					</div>

					<div class="column">
						<div class="block_footer_pics">
							<h3>Instagram</h3>

							<ul>
								<li><a href="#"><img src="images/pic_footer_1.jpg" alt=""><span class="hover"></span></a></li>
								<li><a href="#"><img src="images/pic_footer_2.jpg" alt=""><span class="hover"></span></a></li>
								<li><a href="#"><img src="images/pic_footer_3.jpg" alt=""><span class="hover"></span></a></li>
								<li><a href="#"><img src="images/pic_footer_4.jpg" alt=""><span class="hover"></span></a></li>
								<li><a href="#"><img src="images/pic_footer_5.jpg" alt=""><span class="hover"></span></a></li>
								<li><a href="#"><img src="images/pic_footer_6.jpg" alt=""><span class="hover"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="middle">
			<div class="inner">
				<div class="block_bottom_menu">
					<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'bottom-menu', 'container' => 'nav')); ?>
				</div>
			</div>
		</section>

		<section class="bottom">
			<div class="inner">
				<div class="block_copyrights"><p>&copy; Copyright 2013 by WebLionMedia. All Rights Reserved.</p></div>
			</div>
		</section>
	</div>
</footer>
<!-- FOOTER END -->
<?php wp_footer(); ?>
</div>
</body>

</html>