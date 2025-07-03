<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Utils;
use Elementor\Group_Control_Image_Size;


$btn = $attr = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if( $data['btn_icon'] == 'yes'){
	$icon_class = '<i class="fas fa-angle-right"></i>';
}else{
	$icon_class = '';
}

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="item-btn" ' . $attr . '>' . $data['buttontext']. $icon_class. '</a>';
}

$img = Group_Control_Image_Size::get_attachment_image_html( $data, 'sig_image_size', 'sig_image' );

?>

<div class="rt-el-twt-1 about-box-layout1-new">	
	<div class="item-content">
		<?php if($data['title_befour']){ ?>
			<span class="item-title-befour"><?php echo wp_kses_post( $data['title_befour'] );?></span>
		<?php } ?>
		<?php if($data['title']){ ?>
			<<?php echo esc_html( $data['title_tag'] );?> class="item-title move-color"> <?php echo wp_kses_post( $data['title'] );?> </<?php echo esc_html( $data['title_tag'] );?>>			
		<?php } ?>
		<?php if($data['subtitle']){ ?>
			<div class="sub-title"><?php echo wp_kses_post( $data['subtitle'] );?></div>
		<?php } ?>
		<span class="clear"></span>
		<?php if($data['content']){ ?>
			<div class="about-content">
				<?php echo wp_kses_post( $data['content'] );?>
			</div>
		<?php } ?>
		<span class="clear"></span>			
			<div class="media">
			   <?php echo wp_kses_post( $img );?>
			  <div class="media-body">
			    <h5 class="mt-0 sigtitle"><?php echo wp_kses_post( $data['sigtitle'] );?></h5>
			   <p class="sigsubtitle"><?php echo wp_kses_post( $data['sigsubtitle'] );?></p>
			  </div>
			</div>
		<span class="clear"></span>
		<?php if ( $btn ): ?>
			<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>		
		<?php endif; ?>
	</div>
</div>

