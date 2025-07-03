<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

if( $data['theme']=="theme1"){ ?>
	<div class="rt-el-title section-heading heading-dark text-center heading-layout6 <?php echo esc_html( $data['style'] );?> <?php echo esc_html( $data['theme'] );?>">
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
		<?php if ($data['subtitle']) { ?>
				<p class="rtin-subtitle"><?php echo wp_kses_post( $data['subtitle'] );?></p>
			<?php } ?>
		</div>
<?php }elseif($data['theme']=="theme2"){ ?>
	<div class="rt-el-title section-heading heading-dark text-center heading-layout6 <?php echo esc_html( $data['style'] );?> <?php echo esc_html( $data['theme'] );?>">
		<?php if ($data['beforetitle']) { ?>
				<p class="rtin-subtitle"><?php echo wp_kses_post( $data['beforetitle'] );?></p>
			<?php } ?>
			<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>	
			<?php if ($data['subtitle']) { ?>
				<p class="rtin-subtitle"><?php echo wp_kses_post( $data['subtitle'] );?></p>
		<?php } ?>	
		</div>
	<?php }elseif($data['theme']=="theme3"){ ?>
	<div class="rt-el-title section-heading heading-dark text-center heading-layout6 <?php echo esc_html( $data['style'] );?> <?php echo esc_html( $data['theme'] );?>">
		<?php if ($data['beforetitle']) { ?>
				<p class="rtin-subtitle"><?php echo wp_kses_post( $data['beforetitle'] );?></p>
			<?php } ?>
			<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>	
			<?php if ($data['subtitle']) { ?>
				<p class="rtin-subtitle"><?php echo wp_kses_post( $data['subtitle'] );?></p>
		<?php } ?>	
		</div>
	<?php }else{ ?>
<div class="rt-el-title section-heading heading-dark text-center heading-layout6 <?php echo esc_html( $data['style'] );?> <?php echo esc_html( $data['theme'] );?>">
	<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
	<?php if ($data['subtitle']) { ?>
			<p class="rtin-subtitle"><?php echo wp_kses_post( $data['subtitle'] );?></p>
		<?php } ?>
	</div>
<?php } ?>





