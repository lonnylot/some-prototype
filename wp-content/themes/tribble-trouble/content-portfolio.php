<?php
/**
 * The template used for displaying featured page content in page-templates/front-page.php
 *
 * @package Edin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="post-thumbnail" href="<?php echo $post->ttcw_portfolio_website_url; ?>">
        <?php
        if ( is_page_template( 'page-templates/front-page.php' ) || is_page_template( 'page-templates/grid-page.php' ) ) {
            $ratio = get_theme_mod( 'edin_thumbnail_style' );
            switch ( $ratio ) {
                case 'square':
                    the_post_thumbnail( 'edin-thumbnail-square' );
                    break;
                default :
                    the_post_thumbnail( 'edin-thumbnail-landscape' );
            }
        } else {
            the_post_thumbnail( 'edin-featured-image' );
        }
        ?>
    </a>

    <?php edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
