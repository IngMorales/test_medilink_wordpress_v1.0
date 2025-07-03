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

$prefix      = MEDILINK_CORE_THEME;
$cpt         = MEDILINK_CORE_CPT;
$thumb_size  = MEDILINK_CORE_THEME . '-size7';
$thumb_size2 = MEDILINK_CORE_THEME . '-size6';

$args = array(
    'post_type'      => "{$cpt}_services",
    'posts_per_page' => $data['number'],
    'orderby'        => $data['orderby'],
    'paged' => 1
);

if ( !empty( $data['cat'] ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => "{$cpt}_services_category",
            'field' => 'term_id',
            'terms' => $data['cat'],
        )
    );
}

switch ( $data['orderby'] ) {
    case 'title':
    case 'menu_order':
    $args['order'] = 'ASC';
    break;
}

$query = new WP_Query( $args );
$temp = Helper::wp_set_temp_query( $query );
$uniqueid = time() . rand( 1, 99 );

?>

<?php if ( $query->have_posts() ) :?>      
  <div class="services-tab1">
    <?php 
    $tabs = null;
    $content= null;      
    $tabCount = 0;       
    while ( $query->have_posts() ) : $query->the_post();?>
        <?php
            $id                         = get_the_id();   
            $_sub_title                 = get_post_meta( $id, "{$cpt}_sub_title", true );
            $_short_detail              = get_post_meta( $id, "{$cpt}_short_detail", true );
            $_services_info             = get_post_meta( $id, "{$cpt}_services_info", true );
            $_video_link                = get_post_meta( $id, "{$cpt}_video_link", true );
            $shortcontent               = Helper::get_current_post_content();
            $shortcontent               = wp_trim_words( $shortcontent, $data['count'] );   
            $_services_btn                = $data['services_btn'];
            $_buttontext                = $data['buttontext'];
            $_detail_link               = $data['buttonurl'];
            if ( $_detail_link  ){ 
              $buttonurl = $_detail_link;                           
            }else{                           
               $buttonurl = get_the_permalink();
            } 
            if ( $_sub_title  ){ 
              $_sub_title = $_sub_title;                           
            }else{                           
               $_sub_title = get_the_title();
            } 
            if ( $_short_detail  ){ 
              $_short_detail = $_short_detail;                           
            }else{                           
               $_short_detail =  $shortcontent;
            } 
            $tab_id_html       = '';
            $tab_id_html  .= "{$uniqueid}-{$id}";
            $is_activeTab = ($tabCount == 0) ? 'active' : '';                  
                $tabs .= '<a class="nav-item nav-link '. $is_activeTab .'"  data-toggle="tab" href="#'.$tab_id_html.'">'. get_the_title() .'</a>';
                $content .= ' <div class="tab-pane fade show '. $is_activeTab .'" id="'.$tab_id_html.'">
                            <div class="row no-gutter">';
                if(get_the_post_thumbnail()){
                $content .= '<div class="services-tab-content col-lg-5 col-md-12 col-sm-12 col-xs-12">';
                            }else{
                            $content .= '<div class="services-tab-content col-lg-12 col-xs-12">';
                                if(  $_video_link  ){                                              
                                         $content .= '<a class="play-btn popup-video popup-youtube non-img" href="'.esc_url( $_video_link).'"> <i class="fa fa-play" aria-hidden="true"></i></a>';                                   
                                }
                            }
                            $content .= '<h3 class="item-title">'.$_sub_title .'</h3>
                            <p>'. esc_html($_short_detail).'</p> ';
                                if ( $_services_info  ){ 
                                    $content .= '<ul class="list-info">';
                                    foreach ($_services_info as $services_info) { 
                                    $content .= '<li>'. esc_html($services_info['services_list']) .'</li>';
                                    } 
                                    $content .= '</ul>';
                                } 
                            if($_services_btn){
                                  $content .= '<a class="item-btn iconlight" href="'. esc_url($buttonurl).'"> '. esc_html($_buttontext).' <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </a>';
                            }
                             $content .= '</div>';
                                if(get_the_post_thumbnail()){
                                $content .= '<div class="item-img col-lg-7 col-md-12 col-sm-12 col-xs-12"> '.get_the_post_thumbnail( $id , $thumb_size, array( 'class' => 'services-img' ) );
                                     if(  $_video_link  ){
                                        $content .= '<div class="video-icon">
                                            <a class="play-btn popup-video popup-youtube" href="'.esc_url( $_video_link).'"><i class="fa fa-play" aria-hidden="true"></i></a>
                                        </div>';
                                    }
                                    $content .= '</div>'; 
                                }
                        $content .= '</div>                             
                        </div>';
                    $tabCount++;
            ?>
             <?php endwhile;?>
        <nav>
            <div class="nav nav-tabs nav-fill nav-wrap" id="nav-tab" role="tablist"><?php echo $tabs; ?></div>
        </nav>
           <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent"><?php echo $content; ?></div>
    <?php endif;?>
</div>
<?php Helper::wp_reset_temp_query( $temp );?>


    