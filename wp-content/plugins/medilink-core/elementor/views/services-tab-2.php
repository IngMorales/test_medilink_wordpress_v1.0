<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use \WP_Query;
use radiustheme\Medilink\RDTheme;
use radiustheme\Medilink\Helper;

 $id = substr( $this->get_id_int(), 0, 3 );
 $header = '';
 $body = '';
 $first=0;foreach ($data['tab_items'] as $a){ $first++;
    
    $img1 = wp_get_attachment_image($a['tab_image1']['id'], 'full' );
    $img2 = wp_get_attachment_image($a['tab_image2']['id'], 'full' );

    if($first==1){
        $hclass="active";
        $cclass="active show";
    } else {
        $hclass= "";
        $cclass= ""; 
    }

    $header.= '
        <div class="nav-link">
        <a href="#" data-target="#'.$id.$first.'" data-toggle="tab" class="nav-link text-capitalize '.$hclass.'"><div class="why-choose-box-6"><div class="choose-icon-box"><div class="item-icon"><i class="'.$a['tab_icon']['value'].'" aria-hidden="true"></i></div><div class="item-content">'.$a['tab_title'].'</div></div></div></a>
        </div>
    ';

    $body.= '
        <div id="'.$id.$first.'" class="tab-pane fade '.$cclass.'">
          <div class="why-choose-box-7">
            <div class="row">
              <div class="col-md-6">
                <div class="item-img">
                    '.$img1.'
                </div>
              </div>
              <div class="col-md-6">
                <div class="item-img">
                    '.$img2.'
                </div>
              </div>
            </div>
            <div class="item-title">'.$a['tab_subtitle'].'</div>
            <p>'.$a['tab_content'].'</p>
          </div>
        </div>        
    ';

}

?>
<div class="services-tab2">
  <div class="row">
    <div class="col-xl-4 col-lg-5">
      <div class="clearfix ul-li">
         <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <?php echo wp_kses_post( $header );?>
        </div>
      </div>
    </div>
    <!-- /tab_button -->
    <div class="col-xl-8 col-lg-7">
      <div id="tabsContent" class="tab-content">
         <?php echo wp_kses_post( $body );?>
      </div>
    </div>
  </div>
</div>





    