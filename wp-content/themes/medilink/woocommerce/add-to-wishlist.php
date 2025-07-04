<?php
/**
 * Add to wishlist template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.0
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly

global $product;

$available_multi_wishlist = ( $exists && ! $available_multi_wishlist ) ? 'hide': 'show';
$available_multi_wishlist2 = ( $exists && ! $available_multi_wishlist ) ? 'none': 'block';

$available_multi_wishlist3 = ( $exists && ! $available_multi_wishlist ) ? 'show' : 'hide';
$available_multi_wishlist4 = ( $exists && ! $available_multi_wishlist ) ? 'block' : 'none';

?>

<div class="yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo esc_attr( $product_id );?>">
	<?php if( ! ( $disable_wishlist && ! is_user_logged_in() ) ): ?>
		<div class="yith-wcwl-add-button <?php echo esc_attr($available_multi_wishlist);?>" style="display:<?php echo esc_attr($available_multi_wishlist2);?>">

			<?php yith_wcwl_get_template( 'add-to-wishlist-' . $template_part . '.php', $atts ); ?>

		</div>

		<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
			<span class="feedback"><?php echo wp_kses_post( $product_added_text ); ?></span>
			<a title="<?php esc_attr_e( 'Already added in Wishlist. Click here to view Wishlist', 'medilink' );?>" href="<?php echo esc_url( $wishlist_url )?>" rel="nofollow">
				<?php echo apply_filters( 'yith-wcwl-browse-wishlist-label', $browse_wishlist_text )?>
			</a>
		</div>

		<div class="yith-wcwl-wishlistexistsbrowse <?php echo esc_attr($available_multi_wishlist3);?>" style="display:<?php echo esc_attr($available_multi_wishlist4);?>">
			<span class="feedback"><?php echo wp_kses_post( $already_in_wishslist_text );?></span>
			<a title="<?php esc_attr_e( 'Already added in Wishlist. Click here to view Wishlist', 'medilink' );?>" href="<?php echo esc_url( $wishlist_url ) ?>" rel="nofollow">
				<?php echo apply_filters( 'yith-wcwl-browse-wishlist-label', $browse_wishlist_text )?>
			</a>
		</div>

		<div style="clear:both"></div>
		<div class="yith-wcwl-wishlistaddresponse"></div>
	<?php else: ?>
		<a href="<?php echo esc_url( add_query_arg( array( 'wishlist_notice' => 'true', 'add_to_wishlist' => $product_id ), get_permalink( wc_get_page_id( 'myaccount' ) ) ) )?>" rel="nofollow" class="<?php echo str_replace( 'add_to_wishlist', '', $link_classes ) ?>" >
			<?php echo wp_kses_post( $icon );?>
			<?php echo wp_kses_post( $label );?>
		</a>
	<?php endif; ?>

</div>

<div class="clear"></div>