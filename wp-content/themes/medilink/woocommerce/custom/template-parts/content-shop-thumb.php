<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use radiustheme\Medilink\RDTheme;

?>
<div class="product-thumb-area shop-box-layout1">
	<div class="item-img">
	<?php
	global $product;
	woocommerce_show_product_loop_sale_flash();
	woocommerce_template_loop_product_thumbnail();
	?>	
		<ul class="shop-action-items">			
			<li><?php rdtheme_wc_add_to_cart_icon();?></li>
			<?php if ( function_exists( 'YITH_WCQV_Frontend' ) && RDTheme::$options['wc_quickview_icon'] ): ?>
				<li><a href="" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>"><i class="flaticon-search"></i></a></li>
			<?php endif; ?>
			<?php if ( class_exists( 'YITH_WCWL_Shortcode' ) && RDTheme::$options['wc_wishlist_icon'] ): ?>
				<?php
				$args = array(
					'browse_wishlist_text' => '<i class="fa fa-heart" aria-hidden="true"></i>',
					'already_in_wishslist_text' => '',
					'product_added_text' => '',
					'icon' => 'fa-heart-o',
					'label' => '',
					'link_classes' => 'add_to_wishlist single_add_to_wishlist alt wishlist-icon',
				);
				?>
				<li><?php echo YITH_WCWL_Shortcode::add_to_wishlist( $args );?></li>
			<?php endif; ?>
		</ul>
	</div>
</div>

