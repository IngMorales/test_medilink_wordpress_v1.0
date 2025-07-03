<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

?>

<?php 
if( $data['theme']=="theme1"){ ?>
	<div class="rt-el-title section-heading heading-dark text-center heading-layout1 <?php echo esc_html( $data['style'] );?> <?php echo esc_html( $data['theme'] );?>">
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
		<?php if ($data['subtitle']) { ?>
				<p class="rtin-subtitle"><?php echo wp_kses_post( $data['subtitle'] );?></p>
			<?php } ?>
	</div>
	<?php }else { ?>
		<div class="rt-el-title section-heading heading-dark text-center heading-layout1 <?php echo esc_html( $data['style'] );?> <?php echo esc_html( $data['theme'] );?>">		
			<?php if ($data['subtitle']) { ?>
				<p class="rtin-subtitle"><?php echo wp_kses_post( $data['subtitle'] );?></p>
			<?php } ?>
			<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
		</div>
<?php } ?>