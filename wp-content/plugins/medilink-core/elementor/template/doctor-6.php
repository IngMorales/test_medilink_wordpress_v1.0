<?php 

namespace radiustheme\Medilink_Core;

use \WP_Query;
use radiustheme\Medilink\RDTheme;
use radiustheme\Medilink\Helper;
$thumb_size  = "medilink-size360";

while ( $query->have_posts() ) : $query->the_post();?>
    <?php
    $id            = get_the_id();
    $_appointmnet_schedules   = get_post_meta( $id, "{$cpt}_appointmnet_schedules", true );
    $_designation   = get_post_meta( $id, "{$cpt}_designation", true );
    $_degree   = get_post_meta( $id, "{$cpt}_degree", true );
    $content = Helper::get_current_post_content();
    $content = wp_trim_words( $content, $data['count'] );
    $content = "<p>$content</p>";

    ?>

<div class="<?php echo esc_attr( $col_class );?> animated fadeInUp">
  <div class="team-box-layout1 team-box-layout7">
    <?php if( !empty( $data['background_shape']['url'] ) ) : ?>
    <div class="background-shape">
        <?php echo wp_get_attachment_image( $data['background_shape']['id'], 'full' ); ?>
    </div>
    <?php endif; ?>
    <div class="media media-none-lg media-none-md media-none--xs">
      <?php
        if ( has_post_thumbnail() ){ ?> 
      <div class="item-img">
        <?php the_post_thumbnail( $thumb_size ); ?>
      </div>
      <?php } ?>
      <div class="media-body">
        <div class="item-content">
          <h3 class="item-title">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
          </h3>
          <?php if ( !empty( $data['designation_display'] ) ): ?>
          <div class="item-degree">
            <?php echo esc_html($_degree); ?>
          </div>
          <?php endif; ?>
           <?php echo wp_kses_post( $content );?>
          <ul class="item-btns">
            <li>
                <?php if ( !empty( $data['doctor_btn'] ) ): ?>
                <?php if ( $data['buttonlinktype'] == 'yes' ){ ?>
                    <a href="<?php the_permalink();?>" class="item-btn btn-fill"><?php echo esc_html($data['buttontext2']); ?></a>
                <?php }else{ ?>
                    <a href="<?php echo esc_url($data['buttonurl']['url']); ?>" class="item-btn btn-fill"><?php echo esc_html($data['buttontext']); ?></a>
                <?php } ?>
                <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>              
<?php endwhile;

