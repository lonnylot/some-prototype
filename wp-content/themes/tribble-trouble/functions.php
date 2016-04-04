<?php

/**
 * Tribble Trouble functions and definitions
 *
 * @package Tribble Trouble
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tribble_trouble_setup() {
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_image_size( 'edin-thumbnail-landscape', 314, 228, true );
    add_image_size( 'edin-thumbnail-square', 314, 314, true );
    add_image_size( 'edin-featured-image', 772, 9999 );
    add_image_size( 'edin-hero', 1230, 1230 );

    /*
     * Unregister nav menu.
     */
    unregister_nav_menu( 'secondary' );

}
add_action( 'after_setup_theme', 'tribble_trouble_setup', 11 );

/**
 * Enqueue scripts and styles.
 */
function tribble_trouble_scripts() {

    wp_dequeue_script( 'edin-script' );

    wp_dequeue_script( 'edin-navigation' );

    wp_enqueue_script( 'tribble-trouble-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140807', true );

    wp_enqueue_script( 'tribble-trouble-script', get_stylesheet_directory_uri() . '/js/tribble-trouble.js', array( 'jquery' ), '20140807', true );

    wp_enqueue_style( 'edin-styles', get_template_directory_uri() . '/style.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'tribble_trouble_scripts', 11 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tribble_trouble_body_classes( $classes ) {
    $classes[] = 'tribble-trouble';

    return $classes;
}
add_filter( 'body_class', 'tribble_trouble_body_classes' );

/**
 * Display portfolio.
 */
function tribble_trouble_portfolios() {
    $portfolios = new WP_Query([
        'posts_per_page' => 3,
        'post_type' => 'ttcw-portfolio'
    ]);

    if ( !$portfolios->have_posts() ) {
        return;
    }
    ?>

    <div id="quaternary" class="featured-page-area">
        <div class="featured-page-wrapper clear">
            <h2 id="featured-work">Featured Work</h2>
                <?php
                if ( $portfolios->have_posts() ) : // Check if a featured page has been set in the customizer ?>

                        <?php while ( $portfolios->have_posts() ) : $portfolios->the_post(); ?>
                          <div class="featured-page">

                            <?php get_template_part( 'content', 'portfolio' ); ?>

                          </div><!-- .featured-page -->

                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                <?php endif; ?>

        </div><!-- .featured-page-wrapper -->
    </div><!-- #quaternary -->

<?php
}
