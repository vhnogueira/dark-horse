<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<section id="contact">

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper bg-dark text-light text-center" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info small">

						<small>© 2020 Dark Horse Ventures</small>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</section>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.min.js" integrity="sha256-CfyPGYLRQ4v1O+mZa5ocQglABXGuaZmmfe8awy8Fxis=" crossorigin="anonymous"></script>
<script>
//     var scroll = new SmoothScroll('a[href*="#"]',{
// // 		header: '#wrapper-navbar'
// 		header: '.navbar-brand'
// 	});
	
	 jQuery(function(){ 
     var navMain = jQuery(".navbar-collapse"); // avoid dependency on #id
     // "a:not([data-toggle])" - to avoid issues caused
     // when you have dropdown inside navbar
     navMain.on("click", "a:not([data-toggle])", null, function () {
         navMain.collapse('hide');
     });
 });
	
</script>

</body>

</html>