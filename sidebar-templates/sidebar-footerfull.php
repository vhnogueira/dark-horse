<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper bg-dark text-light" id="wrapper-footer-full">

		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">
        	

			<div class="row">
            
            <div class="col-md-12">
            	<p class="h3 text-center mb-5 text-uppercase font-weight-normal" style="letter-spacing: 5px;">
					Dark Horse <span style="font-weight: 100;">Ventures</span>
				</p>
            </div>

				<?php dynamic_sidebar( 'footerfull' ); ?>
                
            <div class="col-md-12 text-center mt-2">
            	<a href="mailto:info@darkhorse.mx" class="h5 text-light text-center text-underline" style="text-decoration: underline;">
                	info@darkhorse.mx
                </a>
            </div>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

<?php endif; ?>