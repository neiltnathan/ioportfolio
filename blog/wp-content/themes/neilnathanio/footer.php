<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>


 <footer class="footer">



	<div class="footer-col-1">
			<p class=footer-col-1-text>I am an IT Specialist of 20+ years, with Front-End Web Developer experience</p>
			<p class=footer-col-1-text>
				My Front-End Web Developer skills include HTML5, CSS3, Javascript (ES6) & Saas CSS pre-processor.</p>
			<p class=footer-col-1-text>Neil Nathan - Front End Developer</p>

		</div>





<div class="footer-col-2 ">
	<ul class="nav-footer ">
		<li class="nav-footer__item ">
			<a href="https://twitter.com/NeilNathan " target="_blank " class="nav-footer__link ">
				<img src="http://www.neilnathan.io/img/twitter2.png " alt="image Twitter " class="social-media-icon ">
				<span class="nav-footer__link-text ">Twitter @neilnathan</span>
			</a>
		</li>
		<li class="nav-footer__item ">
			<a href="https://github.com " target="_blank " class="nav-footer__link ">
				<img src="http://www.neilnathan.io/img/github2.png " alt="image Github " class="social-media-icon ">
				<span class="nav-footer__link-text ">Github</span>
			</a>
		</li>
		<li class="nav-footer__item ">
			<a href="https://www.linkedin.com/in/neilnathan " target="_blank " class="nav-footer__link ">
				<img src="http://www.neilnathan.io/img/linkedin2.png " alt="image linkedin " class="social-media-icon ">
				<span class="nav-footer__link-text ">My Linked In profile</span>
			</a>
		</li>

	</ul>
</div>

<div class="footer-col-3 ">
	<ul class="nav-footer ">
		<li class="nav-footer__item ">
			<a href="about.html " class="nav-footer__link ">About</a>
			<p class='nav-footer__item-text'>Learn about Neil's skills</p>

		</li>

		<li class="nav-footer__item ">
			<a href="portfolio.html " class="nav-footer__link ">Portfolio</a>
			<p class='nav-footer__item-text'>See examples of sites developed by Neil</p>

		</li>

		<li class="nav-footer__item">
			<a href="testimonials.html" class="nav-footer__link">Testimonials </a>
			<p class='nav-footer__item-text'>Read the latest testimonials</p>

		</li>



<li class="nav-footer__item ">
			<a href="training.html " class="nav-footer__link ">Training </a>
			<p class='nav-footer__item-text'>Courses taken by Neil</p>
		</li>


		<li class="nav-footer__item ">
			<a href="contact-us.html " class="nav-footer__link ">Contact </a>
			<p class='nav-footer__item-text'>Send a general message</p>
		</li>



		 <li class="nav-footer__item">
                    <a href="blog.html" class="nav-footer__link">Blog</a>
                    <p class='nav-footer__item-text'>Keep up with the latest projects</p>
                </li>

	</ul>
</div>

<div class="footer-row-2 ">
	<p class="copyright ">
		&copy; Copyright 2018 Neil Nathan | All rights reserved.
	</p>
</div>

</footer>






</body>
</html>
