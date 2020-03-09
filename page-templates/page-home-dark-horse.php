<?php
/**
 * Template Name: Home - Dark Horse Ventures
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php 
    $image = get_field('intro_background_image');
    if( !empty( $image ) ): ?>
        <style>
        #home {
            background: url(<?php echo esc_url($image['url']); ?>);
            background-size:cover; 
            background-position: center;
        }
        </style>
<?php endif; ?>

<div class="py-5 min-vh-100 d-flex align-items-center"  id="<?php the_field('home_id')?>">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <?php the_field('intro_title') ?>
                    <?php the_field('intro_text') ?>
                </div>
            </div>
        </div>
    </div>

    <p>

    <section>
        <div class="py-5 d-flex min-vh-100 align-items-center" id="<?php the_field('portfolio_id')?>">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                    <?php the_field('investments_title') ?>
                        <br>

                        <div class="row investment-logos justify-content-center">

                            <?php

                                // check if the repeater field has rows of data
                                if( have_rows('investments_logos') ):

                                    $i = 0;

                                    // loop through the rows of data
                                    while ( have_rows('investments_logos') ) : the_row(); ?>
                                    
                                    <div class="col-lg-4 col-6 mb-5 px-md-5 align-self-center logo-container">

                                        <?php // display a sub field value
                                        $image = get_sub_field('logo');
                                        $link = get_sub_field('link');
                                        $paddingdesktop = get_sub_field('image_padding');
                                        $paddingmobile = get_sub_field('image_padding_mobile');

                                        
                                        if( !empty( $image ) ): ?>
                                            <div class="collapsed px-lg-<?php echo $paddingdesktop ?> px-sm-<?php echo $paddingmobile;?> px-2" data-toggle="collapse" data-target="#collapseCompany<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseCompany<?php echo $i; ?>">
                                                <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid mx-auto mb-3 px-lg-5" alt="<?php the_sub_field('name'); ?>"  />
                                            </div>
                                            
                                            <div class="collapse logo-collapse bg-light p-2" id="collapseCompany<?php echo $i; ?>">
                                                <?php 

                                                the_sub_field('description');
               
                                                    if( !empty( $link ) ):
                                                        echo '<a href="' . $link['url'] . '" target="_blank" class="btn btn-dark">';
                                                        echo the_sub_field('button_text');
                                                        echo '</a>';
                                                    endif; 
                                                    ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    <?php 

                                    $i++;

                                    endwhile;

                                endif;

                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="py-5 min-vh-100 d-flex align-items-center bg-light" id="<?php the_field('team_id')?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                    <?php the_field('team_title') ?>
                    </div>
                    <?php

                    // check if the repeater field has rows of data
                    if( have_rows('team') ):

                        // loop through the rows of data
                        while ( have_rows('team') ) : the_row(); ?>
                        
                        <div class="col-md-3 offset-md-3 mb-4 mb-md-0 align-self-center">

                            <?php // display a sub field value
                            $image = get_sub_field('image');
                            
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" class="mb-4 img-fluid mx-auto d-block mb-3 mb-md-2" alt="<?php the_sub_field('name'); ?>" />
                            <?php endif; ?>

                        </div>

                        <div class="col-md mb-4 mb-md-0 align-self-center">
                            <p class="h3 text-left "><?php the_sub_field('name'); ?></p>
                            <p class="h5 "><?php the_sub_field('role'); ?></p>
                            <p><?php the_sub_field('description'); ?></p>

                        </div>

                        <?php endwhile;

                    endif;

                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- <div id="contact" class="sticky-section"></div> -->

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body px-md-3 py-4">
                    <form>
                        <div class="form-group">
                            <!-- <label for="exampleInputEmail1">Email address</label> -->
                            <input type="email" class="form-control mb-4" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Email address">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <!-- <label for="exampleInputPassword1">Password</label> -->
                            <input type="password" class="form-control mb-4" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <!-- <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div> -->


                    </form>
                    <button onclick="jQuery('#alert-login').show()" class="btn btn-dark">Log in</button>

                    <div id="alert-login" class="alert alert-danger collapse mt-3" role="alert">
                        Incorrect credentials.
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <script>
    jQuery('#loginModal').on('hidden.bs.modal', function (e) {
        jQuery('#alert-login').hide();
    });
    
    jQuery(document).ready(function () {

        var h = jQuery('nav').height();
        jQuery('.min-vh-100').attr('style', 'min-height: calc(100vh - ' + h + 'px) !important');
        // jQuery(window).scroll(function() {
        //     var window_top = jQuery(window).scrollTop() + 50;
        //     // the "50" should equal the margin-top value for nav.stickydiv
        //     var div_top = jQuery('body').offset().top;
        //     if (window_top >= div_top) {
        //         // jQuery('#wrapper-navbar').addClass('fixed-top');
        //     } else {
        //         // jQuery('#wrapper-navbar').removeClass('fixed-top');
        //     }
        // });
        
        // jQuery('#<?php // the_field('home_id') ?>').css('margin-top', (jQuery('.navbar').height()));

        jQuery(document).on("scroll", onScroll);

        jQuery('a[href^="#"]').on('click', function (e) {
            // e.preventDefault();
            // jQuery(document).off("scroll");
            jQuery('.nav-link').each(function () {
                // jQuery(this).removeClass('active');
            })
            // jQuery(this).addClass('active');
            var target = this.hash,
                menu = target;
            $target = jQuery(target);
            // jQuery('html, body').stop().animate({
            //     'scrollTop': $target.offset().top+2
            // }, 600, 'swing', function () {
            //     window.location.hash = target;
            //     jQuery(document).on("scroll", onScroll);
            // });
        });
    });

    function onScroll(event) {
        var navbarHeight = jQuery("#wrapper-navbar").height();
        var scrollPos = jQuery(document).scrollTop() + navbarHeight + 10;
        console.log(scrollPos);
        jQuery('.nav-link').each(function () {
            var currLink = jQuery(this);
            var refElement = jQuery(currLink.attr("href"));
            if ( jQuery(document).height() - jQuery(document).scrollTop() - jQuery(window).height()- ( jQuery('#contact').height()/2 ) < 0 ) {
                jQuery('.nav-link').removeClass("active-underline");
                jQuery('#menu-item-138 a').addClass("active-underline");
            }
            else if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                jQuery('.nav-link').removeClass("active-underline");
                currLink.addClass("active-underline");
            } else {
                currLink.removeClass("active-underline");
                currLink.removeClass("menu-hover");
            }
        });
    };

    jQuery('.nav-link').on('mouseover', function () {
        jQuery(this).addClass('menu-hover');
    }).on('mouseout', function () {
        jQuery(this).removeClass('menu-hover');
    });



    jQuery(".logo-collapse").on('shown.bs.collapse', function () {
        jQuery('.logo-collapse').not(this).collapse('hide');
    });

    </script>

<?php get_footer();