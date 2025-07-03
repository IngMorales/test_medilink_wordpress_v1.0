<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;
use radiustheme\medilink\Helper;
use \WP_Query;
$medilink  = MEDILINK_THEME_PREFIX;
$cpt     = MEDILINK_THEME_CPT_PREFIX;    

wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'isotope-pkgd' );

$departments                = Helper::get_departments();  
$_our_pricing_plan_title    = get_post_meta( $id, "{$cpt}_our_pricing_plan_title", true );
$_department_services       = get_post_meta( $id, "{$cpt}_department_services", true );
$_doctors                   = get_post_meta( $id, "{$cpt}_doctor", true );
$_emergency_cases           = get_post_meta( $id, "{$cpt}_emergency_cases", true );   
$_opening_hour              = get_post_meta( $id, "{$cpt}_opening_hour", true );
$doctors                   =Helper::get_departments_doctor($_doctors);   
?>
    <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item rt-sidebar">
        <div class="widgets widget-department-info">
            <h3 class="section-title title-bar-primary"><?php echo esc_html__( 'All Departments', 'medilink' ); ?></h3>
            <ul class="nav tab-nav-list">
                <?php
                foreach ($departments as $key => $department) {
                    $current = get_permalink(get_the_ID()) == get_permalink($key) ? 'active' : ''; ?>
                    <li class="nav-item departments_info <?php echo esc_attr($current); ?>">
                        <a href="<?php echo esc_url(get_permalink($key)); ?>"><?php echo esc_html($department); ?></a>
                    </li>
                <?php
                } ?>
            </ul>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8 col-12 no-equal-item rt-content">   
        <div class="single-departments-box-layout1 sigle-department-data ">
         <div class="sigle-department-data">
                <div class="single-departments-img">
                   <?php 
                    if ( has_post_thumbnail() ){
                        the_post_thumbnail( 'full');
                    } ?>
                </div>
                <div class="item-content">
                    <div class="item-content-wrap">
                        <h3 class="item-title title-bar-primary5"><?php the_title();?></h3>
                        <?php the_content();?>
                    </div>
                    <?php  if(!empty($_department_services)){ ?> 
                        <div class="row">
                            <div class="col-12">
                                <div class="item-cost">
                                    <h3 class="item-title title-bar-primary7"><?php echo esc_html($_our_pricing_plan_title); ?></h3>
                                    <ul>
                                        <?php foreach ($_department_services as $services) {  ?> 
                                            <li><?php echo esc_html($services['services_name']); ?><span><?php echo esc_html($services['services_price']); ?></span></li>                                 
                                        <?php } ?>                               
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php  if(!empty($_doctors)){ ?>  
                        <div class="item-specialist-wrap">
                             <h3 class="item-title title-bar-primary7"><?php echo esc_html__( 'Meet Our Doctors', 'medilink' ); ?></h3>
                        </div>    
                        <div class="row"> 
                          <?php   foreach ( $doctors as $doctor ):
                            $thumb_size  =   "{$medilink}-size5";
                            $did             =$doctor->ID;
                            $_designation    = get_post_meta( $did, "{$cpt}_designation", true );
                            $_degree         = get_post_meta( $did, "{$cpt}_degree", true );
                            $_phone          = get_post_meta( $did, "{$cpt}_phone", true );                           
                            ?>                          
                            <div class="col-xl-6 col-lg-12 col-12">
                                <div class="item-specialist">
                                    <div class="media media-none--xs">
                                        <div class="item-img">
                                             <?php echo wp_get_attachment_image( $doctor->ID, $thumb_size, "", array( "class" => "img-fluid media-img-auto" ) ); ?>                                            
                                        </div>
                                        <div class="media-body">
                                            <h4 class="item-title"><a href="<?php echo the_permalink($did);?>"> <?php echo the_title($doctor->ID);?></a></h4>
                                            <span><?php echo esc_html($_degree); ?></span>
                                            <p><?php echo esc_html($_designation); ?></p>
                                            <a href="<?php echo the_permalink($did);?>" class="item-btn"><?php echo esc_html__( 'Make an Appointment', 'medilink' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                           <?php endforeach; ?>
                        </div>
                    <?php } ?>  
                <div class="row">
                    <div class="sidebar-widget-area sidebar-break-md col-xl-6 col-lg-6 col-12 no-equal-item">
                        <?php  if(!empty($_emergency_cases)){ ?>  
                            <div class="widgets widget-call-to-action-light">
                                <div class="media">
                                       <img width="44" height="48" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/figure6.png" alt="<?php the_title_attribute();?>">
                                    <div class="media-body space-sm">
                                        <h4><?php echo esc_html__( 'Emergency Cases', 'medilink' ); ?></h4>
                                        <span><?php echo esc_html($_emergency_cases); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                         <?php  if(!empty($_opening_hour)){ ?>                        
                            <div class="widgets widget-schedule">
                                <h3 class="section-title title-bar-primary"><?php echo esc_html__( 'Opening Hours', 'medilink' ); ?></h3>
                                    <ul>
                                        <?php foreach ($_opening_hour as $opening_hour) {  ?> 
                                            <li><?php echo esc_html($opening_hour['hours_label']); ?> <span><?php echo esc_html($opening_hour['hours']); ?></span></li>                                   
                                        <?php } ?>                               
                                    </ul>                    
                            </div>
                          <?php } ?>
                    </div>
                    <div class="sidebar-widget-area sidebar-break-md col-xl-6 col-lg-6 col-12 no-equal-item">
                        <div class="widgets widget-appointment">
                            <h3 class="section-title-light title-bar-light">Book Appointment</h3>
                            <form>
                                <div class="form-group">
                                    <select class="select2" data-error="Phone field is required" required>
                                        <option value="">Select Department *</option>
                                        <option value="1">Gynaecology</option>
                                        <option value="2">Cardiology</option>
                                        <option value="3">Orthopaedics</option>
                                        <option value="4">Medicine</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <select class="select2" data-error="Phone field is required" required>
                                        <option value="">Choose Doctor by Name *</option>
                                        <option value="1">Dr. Mou</option>
                                        <option value="2">Dr. Kalvin</option>
                                        <option value="3">Dr. Mark Willy</option>
                                        <option value="4">Dr. Zinia Zara</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Patient Name *" class="form-control" name="name" id="form-name"
                                        data-error="Name field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Phone *" class="form-control" name="Phone" id="form-phone"
                                        data-error="Phone field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="E-mail *" class="form-control" name="email" id="form-email"
                                        data-error="E-mail field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <i class="far fa-calendar-alt"></i>
                                    <input type="text" class="form-control rt-date" placeholder="Appointment Date *"
                                        name="date" id="form-date" data-error="Subject field is required" required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <i class="far fa-clock"></i>
                                    <input type="text" class="form-control rt-time" placeholder="Time *" name="time" id="form-time"
                                        data-error="Subject field is required" required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Type Appintment Note" class="textarea form-control" name="message"
                                        id="form-message" rows="5" cols="20" data-error="Message field is required"
                                        required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group text-center">
                                    <button class="item-btn">BOOK NOW<i class="fas fa-chevron-right"></i></button>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div> <!-- row -->  
            </div> <!-- item-content -->   
        </div>
    </div>
</div>