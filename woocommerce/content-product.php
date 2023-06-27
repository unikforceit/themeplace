<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}

global $themeplace_opt;

$themeplace_product_hover_button = !empty($themeplace_opt['themeplace_product_hover_button']) ? $themeplace_opt['themeplace_product_hover_button'] : '';
$download_tag = get_post_meta( get_the_ID(), 'product_tag', true );

?>
<li <?php wc_product_class( '', $product ); ?>>
    <div class="download-item">
        <div class="download-item-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('themeplace-1280x720', array('class' => 'img-fluid')); ?>
            </a>
            <span class="download-item-tag" style="background: <?php
            if ( $download_tag == 'Sale' ) {
                echo "#4caf50";
            } elseif ( $download_tag == 'Featured' ) {
                echo "#ffc000";
            }  elseif ( $download_tag == 'New' ) {
                echo "#c00";
            } elseif ( $download_tag == 'Pro' ) {
                echo "#f44336";
            } elseif ( $download_tag == 'Free' ) {
                echo "#3f51b5";
            } ?>
                    ;"><?php echo esc_html( $download_tag ) ?></span>
        </div>
        <div class="download-item-content">
            <a href="<?php the_permalink(); ?>">
                <?php the_title( '<h5>', '</h5>' ) ?>
            </a>
            <p><?php echo get_post_meta( get_the_ID(), 'subheading', true ) ?></p>

            <?php $download_terms = get_the_terms( get_the_ID() , 'product_cat' );
            foreach ( $download_terms as $download_term ) { ?>
                <a href="<?php echo get_term_link( $download_term->slug, 'product_cat' ); ?>" class="download-category"><?php echo esc_html( $download_term->name ); ?></a>
            <?php } ?>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <b>
                        <?php if ( $product->get_regular_price() == 0 ){ ?>
                            <span><?php echo esc_html__( 'Free', 'themeplace' ) ?></span>
                        <?php } else { ?>
                            <span><?php echo get_woocommerce_currency_symbol().$product->get_price(); ?></span>
                        <?php } ?>
                    </b>
                </li>
                <?php if ( class_exists( 'EDD_Reviews' ) ): ?>
                    <li class="list-inline-item float-right"><?php themeplace_edd_rating() ?></li>
                <?php endif ?>
            </ul>
            <?php if ( true == $themeplace_product_hover_button ): ?>
                <ul class="list-inline text-center download-item-button">
                    <li class="list-inline-item">
                        <a href="<?php the_permalink(); ?>"><i class="fa fa-info-circle"></i><?php echo esc_html__( 'Details' , 'themeplace' ) ?></a>
                    </li>
                    <?php if ( get_post_meta( get_the_ID(), 'type', true ) == 'theme' ): ?>
                        <li class="list-inline-item">
                            <a href="<?php echo get_post_meta( get_the_ID(), 'preview_url', true ); ?>"><i class="fa fa-eye"></i><?php echo esc_html__( 'Demo' , 'themeplace' ) ?></a>
                        </li>
                    <?php endif ?>
                    <li class="list-inline-item">
                        <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"><i class="fa fa-shopping-cart"></i><?php echo esc_html__( 'Download' , 'themeplace' ) ?></a>
                    </li>
                </ul>
            <?php endif ?>
        </div>
    </div>
</li>