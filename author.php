<?php
/**
 * The template for displaying Author Archive.
 *
 * @package themeplace
 */

get_header();

global $themeplace_opt;

$vendor_earnings = !empty($themeplace_opt['vendor_earnings']) ? $themeplace_opt['vendor_earnings'] : '';
if (class_exists( 'EDD_Front_End_Submissions' )) {
    $vendor = new FES_Vendor(get_the_author_meta( 'ID' ));
}


if( isset($_GET['author-profile']) && $_GET['author-profile']=='true' ) { ?>

    <section class="themeplace-page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="author-profile-sidebar">
                        <div class="author-info">
                            <div class="author-pic">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ); ?>
                            </div>
                            <a href="<?php echo esc_url(add_query_arg( 'author-profile', 'true', get_author_posts_url($post->post_author) )); ?>"><?php the_author(); ?></a>
                            <h6><?php echo esc_html__( 'Vendor Since: ', 'themeplace' ).date_format(date_create($vendor->date_created),"d M Y"); ?></h6>
                            <?php echo themeplace_get_user_social_links() ?>                            
                            <?php if (class_exists( 'EDD_Front_End_Submissions' )) { ?>
                                <div class="author-contact-form">
                                <?php echo do_shortcode( '[fes_vendor_contact_form id="'.get_the_author_meta( 'ID' ).'"]' ) ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-<?php if ( true == $vendor_earnings ){echo '4';}else{echo '6';} ?>">
                            <div class="author-info-box">
                                <p><?php echo esc_html__( 'Total Items','themeplace' ) ?></p>
                                <h3>
                                <?php $total_items = count_user_posts( get_the_author_meta('ID'), 'download', false );
                                echo esc_html( $total_items ); ?></h3>
                            </div>
                        </div>

                        <?php if (class_exists( 'EDD_Front_End_Submissions' )) { ?>
                            <div class="col-md-<?php if ( true == $vendor_earnings ){echo '4';}else{echo '6';} ?>">
                                <div class="author-info-box">
                                    <p><?php echo esc_html__( 'Total downloads','themeplace' ) ?></p>
                                    <h3><?php echo esc_html( $vendor->sales_count ) ?></h3>
                                </div>
                            </div>

                                
                            <?php if ( true == $vendor_earnings ): ?>
                                <div class="col-md-4">
                                    <div class="author-info-box">
                                        <p><?php echo esc_html__( 'Total Earnings','themeplace' ) ?></p>
                                        <h3><?php echo edd_currency_filter( edd_format_amount( number_format( $vendor->sales_value, 0) ) ); ?></h3>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php } ?>
                    </div>

                    <div class="row">
                    <?php
                    $author = get_user_by( 'id', get_query_var( 'author' ) );
                    $temp = $wp_query; $wp_query = null; 
                    $wp_query = new WP_Query();
                    $wp_query->query( array( 
                        "author"=> $author->ID,
                        'post_type' => 'download',
                        'posts_per_page'=> -1
                    ));

                    if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();

                            get_template_part( 'template-parts/content', get_post_type() );

                        endwhile;

                    else :

                        get_template_part( 'template-parts/content', 'none' ); 

                    endif; ?>

                    </div>                    
                </div>
            </div>
        </div>
    </section>

<?php } else { ?>

    <section class="themeplace-page-section">
        <div class="container">
            <div class="row blog-post-list" >
                <div class="col-md-<?php if ( is_active_sidebar( 'sidebar' )){ echo '8';} else { echo '12'; } ?>">

                <?php 
                if ( have_posts() ) : while ( have_posts() ) : the_post(); 

                        get_template_part( 'template-parts/content', get_post_type() );

                    endwhile;

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>

                <div class="text-center">
                    <?php 
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => '<span>&leftarrow;</span>',
                            'next_text' => '<span>&rightarrow;</span>',
                        ) );
                    ?>
                </div>

                </div>
                <?php if (is_active_sidebar( 'sidebar' )): ?>
                    <div class="col-md-4">
                        <?php get_sidebar(); ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>