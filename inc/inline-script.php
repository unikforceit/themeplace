<?php 
//inline style
function themeplace_inline_style() {
    ob_start();
    global $themeplace_opt;
    $primary_color = !empty($themeplace_opt['primary_color']) ? $themeplace_opt['primary_color'] : '#0674ec'; ?>
    
    .badge-author,
    .preloader span,
    .themeplace-button,
    .download-item-button a:hover,
    .mejs-controls .mejs-time-rail .mejs-time-current,
    .affiliate_btn,
    .fes-table thead,
    #add-customer-message,
    .edd-message-fields input[type=submit],
    .fes-product-list-td a:hover,
    div.fes-form .fes-submit input[type=submit],
    .page-numbers.current,
    .page-numbers:active, 
    .page-numbers:hover,
    .menu-item.menu-login-url>a:hover,
	.menu-item.menu-logout-url>a:hover,
	.menu-cart>a:hover,
    .edd_cart_remove_item_btn,
    #edd_checkout_cart .edd_cart_header_row th,
    .edd-free-downloads-mobile button,
    #edd-purchase-button, .edd-submit, [type=submit].edd-submit,
    .themeplace_edd_form,
    #edd_user_history th,
	#edd_purchase_receipt_products th,
	#edd_purchase_receipt th,
    .banner ul.banner-button li a:hover,
    .menu-bar .desktop-menu .navigation>li>ul>li:hover,
    .menu-bar .desktop-menu .navigation>li>ul>li>ul>li:hover,
    .menu-bar .desktop-menu .navigation>li>ul>li>ul>li.current-menu-item,
    .menu-bar .desktop-menu .navigation>li>ul>li.current-menu-parent,
    .menu-bar .desktop-menu .navigation>li>ul>li.current-menu-item,
	.bbp-submit-wrapper button,
	#bbpress-forums #bbp-your-profile fieldset.submit button, div.bbp-submit-wrapper button,
    #bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a,
    .bbp-pagination-links a:hover, 
    .bbp-pagination-links span.current,
    #bbpress-forums li.bbp-header, 
    #bbpress-forums li.bbp-footer,
    .themeplace-btn,
    .themeplace-btn.bordered:hover,
	.comment-navigation .nav-previous a,
	.comment-navigation .nav-next a,
	.themeplace-pagination .prev a,
	.themeplace-pagination .next a,
	.themeplace-download-filters .filter-by a.active,
	.themeplace-download-filters .filter-by a:hover,
	.post-password-form p input[type=submit],
	a.prev.page-numbers,
	a.next.page-numbers,
	.fes-view-comment-link,
	.tagcloud a:hover,
	.pagination .prev,
	.pagination .next,
	.page-links .current,
	.comment-form button,
	.menu-cart-total a,
	.fes-pagination .page-numbers:hover,
	.fes-pagination .page-numbers.current,
	table#fes-comments-table .fes-cmt-submit-form:hover,
	table#fes-comments-table .fes-ignore:hover,
	.banner ul.banner-button li:first-child a,
	.download-filter ul li.select-cat,
	.newest-filter ul li.select-cat,
	.themeplace-pricing-table.recommended:after,
	.themeplace-pricing-table .themeplace-buy-button,
	.footer-widget .mc4wp-form-fields input[type=submit],
	.edd-reviews-form input[type=submit],
    .single-download-nav li a.active,
    .widget-themeplace-tags ul li a:hover,
	.widget.widget-themeplace-price .download-sale:after,
	.edd-submit.button.blue,
	.edd-submit.button.blue.active,
	.edd-submit.button.blue:focus,
	.edd-submit.button.blue:hover {
		background: <?php echo esc_attr( $primary_color ) ?>!important;
	}
	
	
	.themeplace-login-footer a,	
    .fes-vendor-menu ul li.active a,
	#fes-vendor-store-link a,
	.themeplace-register-footer a,
	.banner ul.banner-button li a,
	.mobile-menu .navigation li:hover > a,
	.menu-bar .desktop-menu li.current-menu-parent > a,
	.menu-bar .desktop-menu li.current-menu-item > a,
	.menu-bar .desktop-menu .navigation>li>a:hover,
	.navbar .current-menu-item a,
	.navbar-expand-lg .navbar-nav .nav-link:hover,
	.themeplace-team a:hover,
	.themeplace-btn.bordered,
	.menu-cart-product-item a:last-child,	
	.author-profile-sidebar .author-info ul li a:hover,
	#backtotop,	
	.page-links a,
	.fes-product-name a,
	.edd_cart_remove_item_btn:hover,
	.widget-themeplace-author .author-info span a ,
	.themeplace-download-filters .filter-by a,
	.search-result-title span,
	.widget.widget-themeplace-price .edd-cart-added-alert {
		color: <?php echo esc_attr( $primary_color ) ?>;
	}
	
	
	.edd_cart_remove_item_btn,
	#fes-vendor-store-link,
	.download-item-button a,
	.menu-item.menu-login-url>a,
	.menu-item.menu-logout-url>a,
	table#fes-comments-table .fes-cmt-submit-form,
	table#fes-comments-table .fes-ignore,
	.menu-cart>a,
	.edd_cart_remove_item_btn:hover,
	.banner ul.banner-button li a,
	#bbpress-forums li.bbp-body ul.forum,
	.service-item:hover i,
	.themeplace-btn.bordered,
	.fes-order-list-td .view-order-fes,
	.contact-form .form-group input:focus,
	.contact-form .form-group textarea:focus,
	.widget-area .widget-title,
	.previous-timeline:hover a,
	.next-timeline:hover a,
	.widget-themeplace-author .author-info span,
	.themeplace-download-filters .filter-by a,
	.breadcrumb-content .themeplace-product-search-form,
	.search-result-title,
	.breadcrumb-content .sub-heading,
	.themeplace-pricing-table>span,
	.footer-widget .mc4wp-form-fields input[type=email],
	.single-download-nav li a,
	.widget-themeplace-tags ul li a,
	.widget.widget-themeplace-price .download-sale,
	.widget.widget-themeplace-price .download-comments,
	.menu-cart-product-item a:first-child img,
	table#fes-comments-table input[type=text], table#fes-comments-table textarea,
	.fes-product-list-td a,
	.fes-fields .fes-feat-image-upload a.fes-feat-image-btn,
	.modal-footer,
	.tagcloud a,	
	.page-links a,
	.sticky {
		border-color: <?php echo esc_attr( $primary_color ) ?>;
	}
	
<?php
return ob_get_clean();
}