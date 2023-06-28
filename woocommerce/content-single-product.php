<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

defined('ABSPATH') || exit;

global $product;


$preview_url = get_post_meta(get_the_ID(), 'preview_url', true);
$type = get_post_meta(get_the_ID(), 'type', true);
$video = get_post_meta(get_the_ID(), 'video', true);
$audio = get_post_meta(get_the_ID(), 'audio', true);
$psd = get_post_meta(get_the_ID(), 'psd', true);
$file_size = get_post_meta(get_the_ID(), 'file_size', true);
$affiliate_url = get_post_meta(get_the_ID(), 'affiliate_url', true);
$subheading = get_post_meta(get_the_ID(), 'subheading', true);
$version = get_post_meta(get_the_ID(), 'version', true);
$item_faq = get_post_meta(get_the_ID(), 'item_faq', true);
$documentation = get_post_meta(get_the_ID(), 'documentation', true);
$support = get_post_meta(get_the_ID(), 'support', true);
$themeplace_features_group = get_post_meta(get_the_ID(), 'themeplace_features_group', true);
?>

<section id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">

                <div class="single-download-thumbnail">
                    <?php if ($type == 'video'): ?>

                        <?php echo wp_video_shortcode(array(
                                'src' => $video,
                                'autoplay' => 'on',
                                'preload' => 'auto'
                            )
                        ) ?>
                        <a class="themeplace-button" href="<?php echo esc_url($video); ?>"
                           download><?php echo esc_html__('Download', 'themeplace'); ?></a>

                    <?php elseif ($type == 'audio'):

                        echo wp_audio_shortcode(array(
                                'src' => $audio,
                                'autoplay' => 'on',
                                'preload' => 'auto'
                            )
                        );

                    elseif ($type == 'psd'): ?>

                        <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>

                        <?php if ($psd): ?>
                            <div class="popup-gallery">
                                <?php themeplace_cmb2_output_file_list('psd') ?>
                            </div>
                        <?php endif ?>

                    <?php else: ?>

                        <?php the_post_thumbnail('full', array('class' => 'img-fluid'));

                        // Check if product has gallery images
                                if ($product->get_gallery_image_ids()) {
                                $image_ids = $product->get_gallery_image_ids();
                                ?>
                                <div class="product-gallery">
                                    <div class="slider">
                                        <?php
                                        // Loop through gallery images
                                        foreach ($image_ids as $image_id) {
                                            echo '<div>' . wp_get_attachment_image($image_id, [150]) . '</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>

                    <?php endif ?>
                </div>

                <div class="mobile widget-themeplace-price">
                    <?php
                    if ($product->get_regular_price() == 0) { ?>
                        <h2 class="price"><?php echo esc_html('Free') ?></h2>
                    <?php } else { ?>
                        <h2 class="price"><?php echo get_woocommerce_currency_symbol() . $product->get_price(); ?></h2>
                    <?php }

                    if ($affiliate_url) { ?>
                        <a class="affiliate_btn edd-submit" target="_blank"
                           href="<?php echo esc_url($affiliate_url) ?>"><?php echo esc_html__('Purchase', 'themeplace'); ?></a>
                    <?php } else { ?>
                        <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                           class="edd-submit"><?php echo esc_html__(get_woocommerce_currency_symbol() . $product->get_price() . ' - ' . 'Purchase', 'themeplace') ?></a>
                    <?php }

                    if ($preview_url) { ?>
                        <a class="themeplace-button live-button" href="<?php echo esc_url($preview_url); ?>"
                           target="_blank"><i
                                    class="fa fa-eye"></i><?php echo esc_html__('Live preview', 'themeplace'); ?>
                        </a>
                    <?php }

                    ?>
                    <?php if (wc_review_ratings_enabled() && $product->get_rating_count() > 0): ?>
                        <div class="download-rating">
                            <span><?php echo esc_html__('Item Rating', 'themeplace'); ?></span>
                            <?php woocommerce_template_single_rating(); ?>
                        </div>
                    <?php endif ?>
                    <div class="row">
                        <div class="col-sm-12 sales-and-comment">
                            <i class="fa fa-fw fa-2x fa-shopping-cart" aria-hidden="true"></i>
                            <span><?php echo $product->get_total_sales(); ?></span>
                            <i class="fa fa-fw fa-2x fa-comments" aria-hidden="true"></i>
                            <span><?php comments_number(0, 1, '%'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="single-download-nav-mobile">
                    <ul class="single-download-nav nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill"
                               href="#item-details"><?php echo esc_html__('Item Details', 'themeplace'); ?></a>
                        </li>
                        <?php if (comments_open() || get_comments_number()): ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill"
                                   href="#item-comments"><?php echo esc_html__('Comments', 'themeplace'); ?></a>
                            </li>
                        <?php endif ?>
                        <?php if (wc_review_ratings_enabled() && $product->get_rating_count() > 0): ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill"
                                   href="#item-reviews"><?php echo esc_html__('Reviews', 'themeplace'); ?></a>
                            </li>
                        <?php endif ?>
                        <?php if ($support) : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill"
                                   href="#item-support"><?php echo esc_html__('Support', 'themeplace'); ?></a>
                            </li>
                        <?php endif ?>
                        <?php if ($item_faq): ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill"
                                   href="#item-faq"><?php echo esc_html__('item FAQ', 'themeplace'); ?></a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>

                <div class="single-download-content">
                    <div class="tab-content">
                        <div id="item-details" class="container tab-pane active">
                            <?php the_content(); ?>
                            <br>
                            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                               class="edd-submit"><?php echo esc_html__(get_woocommerce_currency_symbol() . $product->get_price() . ' - ' . 'Purchase', 'themeplace') ?></a>
                        </div>
                        <?php if (comments_open() || get_comments_number()) { ?>
                            <div id="item-comments" class="container tab-pane fade">
                                <?php comments_template(); ?>
                            </div>
                        <?php } ?>
                        <?php if (wc_review_ratings_enabled() && $product->get_rating_count() > 0): ?>
                            <div id="item-reviews" class="container tab-pane fade">
                                <?php woocommerce_template_single_rating(); ?>
                            </div>
                        <?php endif ?>
                        <?php if ($support): ?>
                            <div id="item-support" class="container tab-pane fade">
                                <?php if ($support): ?>
                                    <?php foreach ($support as $key => $support_item): ?>
                                        <h5><?php echo esc_html($support_item['themeplace_support_title']); ?></h5>
                                        <ul class="<?php if ('Yes' == $support_item['support_include']) {
                                            echo 'item-support-includes';
                                        } elseif ('No' == $support_item['support_include']) {
                                            echo 'item-support-not-includes';
                                        } ?>">
                                            <?php $support_list = $support_item['support_list'];
                                            if ($support_list) {
                                                foreach ($support_list as $key => $support_list_item) { ?>
                                                    <li><?php echo esc_html($support_list_item); ?></li>
                                                <?php }
                                            } ?>
                                        </ul>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                        <?php if ($item_faq): ?>
                            <div id="item-faq" class="container tab-pane fade">
                                <div id="accordion-product" class="themeplace-accordion style-1">
                                    <?php foreach ($item_faq as $key => $faq): ?>
                                        <div class="themeplace-accordion-item">
                                            <h5 data-toggle="collapse"
                                                data-target="#collapse-<?php echo esc_attr($key . get_the_ID()) ?>"
                                                aria-expanded="false"
                                                aria-controls="collapse-<?php echo esc_attr($key . get_the_ID()) ?>">
                                                <?php echo esc_html($faq['themeplace_faq_title']); ?>
                                                <span class="fa fa-plus"></span>
                                                <span class="fa fa-minus"></span>
                                            </h5>

                                            <div id="collapse-<?php echo esc_attr($key . get_the_ID()) ?>"
                                                 class="collapse" data-parent="#accordion-product">
                                                <?php echo esc_html($faq['themeplace_faq_description']); ?>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>

                <div class="related-items">
                    <h4><?php echo esc_html__('Related items may you also like', 'themeplace') ?></h4>
                    <div class="row">
                        <?php
                        $related = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'post_type' => 'product', 'numberposts' => 3, 'post__not_in' => array($post->ID)));
                        if ($related) {
                            foreach ($related as $post) {
                                setup_postdata($post); ?>

                                <div class="col-md-4">
                                    <div class="related-item">
                                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail('full', array('class' => 'img-fluid')) ?>
                                            <span class="related-item-content">
                                    <h6><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></h6>
                                    <?php if (get_post_meta(get_the_ID(), 'subheading', true)): ?>
                                        <p><?php echo esc_html(get_post_meta(get_the_ID(), 'subheading', true)); ?></p>
                                    <?php endif ?>
                                </span>
                                        </a>
                                    </div>
                                </div>

                            <?php }
                            wp_reset_postdata();
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="single-download-sidebar">
                    <div class="widget widget-themeplace-price">
                        <div class="edd_download_purchase_form">
                            <?php if ($product->get_regular_price() == 0) { ?>
                                <h2 class="price"><?php echo esc_html__('Free', 'themeplace') ?></h2>
                            <?php } else { ?>
                                <h2 class="price"><?php echo get_woocommerce_currency_symbol() . $product->get_price(); ?></h2>
                            <?php }

                            if ($affiliate_url) { ?>
                                <a class="affiliate_btn edd-submit" target="_blank"
                                   href="<?php echo esc_url($affiliate_url) ?>"><?php echo esc_html__('Purchase', 'themeplace'); ?></a>
                            <?php } else {
                                ?>
                                <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                                   class="edd-submit"><?php echo esc_html__(get_woocommerce_currency_symbol() . $product->get_price() . ' - ' . 'Purchase', 'themeplace') ?></a>
                            <?php }

                            if ($preview_url) { ?>
                                <a class="themeplace-button live-button" href="<?php echo esc_url($preview_url); ?>"
                                   target="_blank"><i
                                            class="fa fa-eye"></i><?php echo esc_html__('Live preview', 'themeplace'); ?>
                                </a>
                            <?php }

                            ?>
                            <?php if (wc_review_ratings_enabled() && $product->get_rating_count() > 0): ?>
                                <div class="download-rating">
                                    <span><?php echo esc_html__('Item Rating', 'themeplace'); ?></span>
                                    <?php woocommerce_template_single_rating(); ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="download-sale">
                                    <i class="fa fa-fw fa-2x fa-shopping-cart" aria-hidden="true"></i>
                                    <span><?php echo $product->get_total_sales(); ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="download-comments">
                                    <i class="fa fa-fw fa-2x fa-comments" aria-hidden="true"></i>
                                    <span><?php comments_number(0, 1, '%'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-themeplace-author">
                        <h2 class="widget-title"><?php echo esc_html__('Author', 'themeplace'); ?></h2>

                        <div class="author-info">
                            <div class="author-pic">
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>?author-profile=true">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                                </a>
                            </div>
                            <span><a href="<?php echo esc_url(add_query_arg('author-profile', 'true', get_author_posts_url($post->post_author))); ?>"><?php the_author(); ?></a></span>
                            <ul class="list-inline author-product">
                                <?php
                                $authorProducts = get_posts(array(
                                    "post_type" => "product",
                                    "status" => "publish",
                                    "author" => get_the_author_meta('ID'),
                                    'showposts' => 3
                                ));

                                foreach ($authorProducts as $authorProduct) {

                                    $thumbnail = get_post_meta($authorProduct->ID, 'product_item_thumbnail', 1); ?>

                                    <li class="list-inline-item">
                                        <a href="<?php echo get_permalink($authorProduct); ?>">
                                            <img src="<?php if ($thumbnail) {
                                                echo esc_url($thumbnail);
                                            } else {
                                                echo get_the_post_thumbnail_url($authorProduct->ID, 'themeplace-80x80');
                                            } ?>" alt="<?php the_title_attribute(); ?>">
                                        </a>
                                    </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <div class="widget widget-themeplace-product-information">
                        <h2 class="widget-title"><?php echo esc_html__('Item Information', 'themeplace'); ?></h2>
                        <table>
                            <tbody>
                            <tr>
                                <td><?php echo esc_html__('Last Update:', 'themeplace'); ?></td>
                                <td><span><?php the_modified_date(); ?></span></td>
                            </tr>
                            <tr>
                                <td><?php echo esc_html__('Released:', 'themeplace'); ?></td>
                                <td><span><?php echo get_the_date(); ?></span></td>
                            </tr>
                            <?php if ($version): ?>
                                <tr>
                                    <td><?php echo esc_html__('Version:', 'themeplace'); ?></td>
                                    <td><span><?php echo esc_html($version); ?></span></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($file_size): ?>
                                <tr>
                                    <td><?php echo esc_html__('File Size:', 'themeplace'); ?></td>
                                    <td><span><?php echo esc_html($file_size); ?></span></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($documentation): ?>
                                <tr>
                                    <td><?php echo esc_html__('Documentation:', 'themeplace'); ?></td>
                                    <td><span><?php echo esc_html($documentation); ?></span></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($themeplace_features_group): ?>
                                <?php foreach ($themeplace_features_group as $key => $themeplace_feature_group): ?>
                                    <tr>
                                        <td><?php echo esc_html($themeplace_feature_group['themeplace_feature_name']); ?></td>
                                        <td>
                                            <?php $features_list = $themeplace_feature_group['themeplace_feature_list'];
                                            if ($features_list) {
                                                foreach ($features_list as $key => $feature) { ?>
                                                    <span><?php echo esc_html($feature); ?></span>
                                                <?php }
                                            } ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="widget widget-themeplace-tags">
                        <h2 class="widget-title"><?php echo esc_html__('Tags', 'themeplace'); ?></h2>
                        <?php echo get_the_term_list(get_the_ID(), 'product_tag', '<ul class="list-inline"><li class="list-inline-item">', '</li><li class="list-inline-item">', '</li></ul>'); ?>
                    </div>

                    <?php dynamic_sidebar('product-sidebar'); ?>
                </div>
            </div>
        </div>
    </div>
</section>