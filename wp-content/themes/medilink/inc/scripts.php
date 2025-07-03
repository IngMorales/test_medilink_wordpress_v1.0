<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */

namespace radiustheme\Medilink;
use \WP_Query;
use Elementor\Plugin;
class Scripts {
	public $medilink  = MEDILINK_THEME_PREFIX;
	public $version = MEDILINK_THEME_VERSION;	
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 12 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );
		add_action( 'wp_ajax_rt_single_department', array( $this, 'rt_single_department' ));
		add_action( 'wp_ajax_noprive_rt_single_department', array( $this, 'rt_single_department' ) );
		add_action( 'admin_enqueue_scripts',array( $this, 'admin_conditional_scripts' ), 1 );	

	}
	public function register_scripts(){
		/* Deregister */
		wp_deregister_style( 'font-awesome' );
		wp_deregister_style( 'yith-wcwl-font-awesome' );		
		/*CSS*/
		// Owl carousel
		wp_register_style( 'owl-carousel',              		Helper::get_css( 'owl.carousel.min' ), array(), $this->version );
		wp_register_style( 'owl-theme-default',         		Helper::get_css( 'owl.theme.default.min' ), array(), $this->version );
		wp_register_style( 'animate',                   		Helper::get_css( 'animate.min' ), array(), $this->version );
		// Slider			
		wp_register_style( 'magnific-popup',            		Helper::maybe_rtl( 'magnific-popup' ), array(), $this->version );	
		/*JS*/
		// Owl Carousel
		wp_register_script( 'owl-carousel',             		Helper::get_js( 'owl.carousel.min' ), array( 'jquery' ), $this->version, true );		
		// Isotope
		wp_register_script( 'isotope-pkgd',             		Helper::get_js( 'isotope.pkgd.min' ), array( 'jquery' ), $this->version, true );			
		 // Counter
        wp_register_script( 'waypoints',                		Helper::get_js( 'waypoints.min' ), array( 'jquery' ), $this->version, true );
        wp_register_script( 'jquery-counterup',                	Helper::get_js( 'jquery.counterup.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'jquery-magnific-popup',           	Helper::get_js( 'jquery.magnific-popup.min' ), array( 'jquery' ), $this->version );
		wp_register_style(  'slick',           					Helper::get_css( 'slick' ), array(), $this->version );	
		wp_register_style(  'slick-theme',     					Helper::get_css( 'slick-theme' ), array(), $this->version );
		wp_register_script( 'slick',           					Helper::get_js( 'slick.min' ), array( 'jquery' ), $this->version );
		wp_register_style(  'select2',            				Helper::get_css( 'select2.min' ), array(), $this->version );   
		wp_register_script( 'select2',           				Helper::get_js( 'select2.min' ), array( 'jquery' ), $this->version );
		wp_register_script( 'paroller-min',           			Helper::get_js( 'jquery.paroller.min' ), array( 'jquery' ), $this->version );

	}  
     
	public function enqueue_scripts() {
		/*CSS*/
		// Bootstrap		
		wp_enqueue_style( 'bootstrap',                   Helper::maybe_rtl( 'bootstrap.min' ), array(), $this->version );	
		// Font-awesome
		wp_enqueue_style( 'font-awesome',               Helper::get_css( 'font-awesome.min' ), array(), $this->version );		
		
		wp_enqueue_style( 'flaticon',                	Helper::get_fonts_css( 'flaticon' ), array(), $this->version );		
		wp_enqueue_style(  'animate');
		// Elementor Scripts in preview mode
		$this->elementor_scripts();
		// Conditional Scripts
		$this->conditional_scripts();
            wp_enqueue_style(  'select2');
            wp_enqueue_script( 'select2' );            
		// Style
		wp_enqueue_style( $this->medilink . '-style',      Helper::maybe_rtl( 'style' ), array(), $this->version );
		// Elementor
		wp_enqueue_style( $this->medilink . '-elementor',  Helper::maybe_rtl( 'elementor' ), array(), $this->version );
		// Dynamic style
		$this->dynamic_style();
		/*JS*/
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// popper js
		wp_enqueue_script( 'popper',                   	 	Helper::get_js( 'popper' ), array(), $this->version );
		// bootstrap js
		wp_enqueue_script( 'bootstrap',                  Helper::get_js( 'bootstrap.min' ), array( 'jquery' ), $this->version, true );
		// Nav smooth scroll
		wp_enqueue_script( 'jquery-nav',                 Helper::get_js( 'jquery.nav.min' ), array( 'jquery' ), $this->version, true );
		// Cookie js
		wp_enqueue_script( 'js-cookie',                  Helper::get_js( 'js.cookie.min' ), array( 'jquery' ), $this->version, true );		
		// sticky-sidebar js
		wp_enqueue_script( 'resizeSensor',            	Helper::get_js( 'ResizeSensor.min' ), array( 'jquery' ), $this->version, true );			
		wp_enqueue_script( 'theia-sticky-sidebar',      Helper::get_js( 'theia-sticky-sidebar.min' ), array( 'jquery' ), $this->version, true );
		//Tween Js		
		wp_enqueue_script( 'tween-max',      Helper::get_js( 'tween-max' ), array( 'jquery' ), $this->version, true );		
		// Main js
		wp_enqueue_script( 'slick' );
		
		wp_enqueue_script( $this->medilink . '-main',      Helper::get_js( 'main' ), array( 'jquery' ), $this->version, true );
		 
		// Localization
		$rdtheme_logo  	= empty( RDTheme::$options['logo']['url'] ) ? Helper::get_img( 'logo-dark.png' ) : RDTheme::$options['logo']['url'];
		$adminajax 		= esc_url( admin_url('admin-ajax.php') );
		$localize_data  = array(
			'ajaxurl'	   => $adminajax, 
			'hasAdminBar'  => is_admin_bar_showing() ? 1 : 0,
			'headerStyle'  => RDTheme::$header_style,
			'meanWidth'    => RDTheme::$options['resmenu_width'],
			'primaryColor' => RDTheme::$options['primary_color'],
			'seconderyColor' => RDTheme::$options['secondery_color'],
			'day'	         => esc_html__('Day' , 'medilink'),
			'hour'	         => esc_html__('Hour' , 'medilink'),
			'minute'         => esc_html__('Minute' , 'medilink'),
			'second'         => esc_html__('Second' , 'medilink'),
			'extraOffset'    => RDTheme::$options['sticky_menu'] ? 75 : 0,
			'extraOffsetMobile' => RDTheme::$options['sticky_menu'] ? 52 : 0,		
			'rtl'            => is_rtl() ? 'yes' : 'no', //@rtl	
		);
		wp_localize_script( $this->medilink . '-main', 'medilinkObj', $localize_data );		

		// RTL
		if ( is_rtl() ) {	
			wp_enqueue_style( 'medilink-rtl',                Helper::get_css( 'rtl' ), array(), $this->version );		
		}	

	}

	public function fonts_url(){
		$fonts_url = '';
		if ( 'off' !== _x( 'on', 'Google fonts - Roboto : on or off', 'medilink' ) ) {
			$fonts_url = add_query_arg( 'family', urlencode( 'Raleway:400,500,600,700|Roboto:400,500,&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );				
		}
		return $fonts_url;
	}
	private function conditional_scripts(){
		$cpt = MEDILINK_THEME_CPT_PREFIX;

		if ( !class_exists( 'Redux' ) ) {
			wp_enqueue_style( $this->medilink . '-gfonts',     $this->fonts_url(), array(), $this->version ); // Google fonts
		}
				
	}		
	public function admin_conditional_scripts(){
		$cpt = MEDILINK_THEME_CPT_PREFIX;
			wp_enqueue_style( $this->medilink . '-gfonts',     $this->fonts_url(), array(), $this->version ); // admin Google fonts		
				
	}
	public function elementor_scripts() {
		if ( !did_action( 'elementor/loaded' ) ) {
			return;
		}
		if ( Plugin::$instance->preview->is_preview_mode() ) {
			wp_enqueue_style(  'owl-carousel');
			wp_enqueue_style(  'owl-theme-default');
			wp_enqueue_script( 'owl-carousel' );
			wp_enqueue_style(  'bootstrap');
			wp_enqueue_script( 'bootstrap' );			
			wp_enqueue_style(  'animate');
			wp_enqueue_style(  'magnific-popup');			
			wp_enqueue_script( 'jquery-magnific-popup' );
			wp_enqueue_script( 'isotope-pkgd' );	
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_script( 'jquery-counterup' );
			wp_enqueue_script( 'imagesloaded' );
			wp_enqueue_script( 'popper' );	
			wp_enqueue_style(  'select2');
			wp_enqueue_script( 'select2' );	
			wp_enqueue_style(  'slick' );
			wp_enqueue_style(  'slick-theme' );
			wp_enqueue_script( 'slick' );
			wp_enqueue_script( 'paroller-min' );

		}
	}

		
	private function dynamic_style(){
		$dynamic_css  = $this->template_style();
		ob_start();
		Helper::requires( 'dynamic-style.php' );
		Helper::requires( 'dynamic-style-elementor.php' );
		$dynamic_css .= ob_get_clean();
		$dynamic_css  = $this->minified_css( $dynamic_css );
		wp_register_style( $this->medilink . '-dynamic', false );
		wp_enqueue_style( $this->medilink . '-dynamic' );
		wp_add_inline_style( $this->medilink . '-dynamic', $dynamic_css );
	}

	private function minified_css( $css ) {
		/* remove comments */
		$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
		/* remove tabs, spaces, newlines, etc. */
		$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $css );
		return $css;
	}

	private function template_style(){
		$style = '';

		if ( RDTheme::$bgtype == 'bgcolor' ) {
			$style .= '.entry-banner{background-color: ' . RDTheme::$bgcolor . '}';
		}
		else {
			$style .= '.entry-banner{background-image: url(' . RDTheme::$bgimg . ')}';
		}


		if ( RDTheme::$padding_top == '0px') {
			$style .= '.content-area {padding-top:'. RDTheme::$padding_top . ';}';
		}else {
			$style .= '.content-area {padding-top:'. RDTheme::$padding_top . 'px;}
			@media all and (max-width: 1199px) {.content-area {padding-top:100px;}}
			@media all and (max-width: 991px) {.content-area {padding-top:100px;}}';
		}
		
		if ( RDTheme::$padding_bottom == '0px') {
			$style .= '.content-area {padding-bottom:'. RDTheme::$padding_bottom . ';}';
		}else {
			$style .= '.content-area {padding-bottom:'. RDTheme::$padding_bottom . 'px;}
			@media all and (max-width: 1199px) {.content-area {padding-bottom:100px;}}
			@media all and (max-width: 991px) {.content-area {padding-bottom:100px;}}';
		}
		if ( RDTheme::$inner_padding_top) {
			$style .= '.entry-banner .inner-page-banner {padding-top:'. RDTheme::$inner_padding_top . 'px;}';

		}
		if ( RDTheme::$inner_padding_bottom) {
			$style .= '.entry-banner .inner-page-banner {padding-bottom:'. RDTheme::$inner_padding_bottom . 'px;}';
		}

		
		return $style;
	}


	
	/* single department  */
	public function rt_single_department() {
		$html 		= null;
		$medilink  	= MEDILINK_THEME_PREFIX;
		$cpt     	= MEDILINK_THEME_CPT_PREFIX; 	
        $thumb_size = MEDILINK_THEME_CPT_PREFIX . '-size980';

		$id = !empty($_POST['id']) ? absint($_POST['id']) : 0;		
		if($id){
			$args = array(
				'post_type'      	=> "{$cpt}_departments",
				'post_status' 		=> 'publish',
				'p'         		=> $id, 		
				);				
				$query = new WP_Query( $args );
				$temp = Helper::wp_set_temp_query( $query );		
				if ( $query->have_posts() ) :				
				ob_start();  ?>
					<?php 
					while ( $query->have_posts() ) : $query->the_post();?>
					<?php
					$id            = get_the_id();   
					$_department_services                   = get_post_meta( $id, "{$cpt}_department_services", true );
					$_department_investigations             = get_post_meta( $id, "{$cpt}_department_investigations", true );
					$departments                = Helper::get_departments();  
				    $_our_pricing_plan_title    = get_post_meta( $id, "{$cpt}_our_pricing_plan_title", true );  
				    $_doctors                   = get_post_meta( $id, "{$cpt}_doctor", true );
				    $_emergency_cases           = get_post_meta( $id, "{$cpt}_emergency_cases", true );   
				    $_opening_hour              = get_post_meta( $id, "{$cpt}_opening_hour", true );
				    $doctors                    = Helper::get_departments_doctor($_doctors); 
					?>			
				<div class="loading"></div>       
				<div class="sigle-department-data animated fadeIn">	
                <div class="single-departments-img">
                   <?php 
                    if ( has_post_thumbnail() ){
                          the_post_thumbnail($thumb_size);
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
                        <div class="row  margin-b-20"> 
                          <?php  foreach ( $doctors as $doctor ):
                            $thumb_size      = "{$medilink}-size6";
                            $did             = $doctor->ID;
                            $_designation    = get_post_meta( $did, "{$cpt}_designation", true );
                            $_degree         = get_post_meta( $did, "{$cpt}_degree", true );
                            $_phone          = get_post_meta( $did, "{$cpt}_phone", true );                           
                            $img            = get_the_post_thumbnail_url( $did, $thumb_size );                                       
                            ?>                          
                            <div class="col-xl-6 col-lg-12 col-12">
                                <div class="item-specialist aj-departments">
                                    <div class="media media-none--xs">
                                        <div class="item-img">
                                            <img src="<?php echo esc_url($img);?>" alt="<?php echo esc_html( the_title_attribute());?>">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="item-title"><a href="<?php echo esc_url(get_the_permalink($did));?>"> <?php echo esc_html(get_the_title( $did));?></a></h4>
                                            <span class="degree"><?php echo esc_html($_degree); ?></span>
                                            <p class="designation"><?php echo esc_html($_designation); ?></p>
                                            <a href="<?php echo the_permalink($did);?>" class="item-btn-txt"><?php echo esc_html__( 'Make an Appointment', 'medilink' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                           <?php endforeach; ?>
                        </div>
                    <?php } ?>  
                     <div class="item-specialist-wrap">
                        <h3 class="item-title title-bar-primary7"><?php echo esc_html__( 'Opening Hours', 'medilink' ); ?></h3>
                    </div>   
                    <div class="row">                
                         <?php  if(!empty($_opening_hour)){ ?>                        
                         <div class="sidebar-widget-area sidebar-break-md col-xl-6 col-lg-6 col-12 no-equal-item">                   
                            <div class="widgets widget-schedule">                            
                                    <ul>
                                        <?php foreach ($_opening_hour as $opening_hour) {  ?> 
                                            <li><span class="bold5"><?php echo esc_html($opening_hour['hours_label']); ?> </span><?php echo esc_html($opening_hour['hours']); ?></li>
                                        <?php } ?>                               
                                    </ul>                    
                            </div>
                        </div>        
                          <?php } ?>
                        <?php  if(!empty($_emergency_cases)){ ?>  
                        <div class="sidebar-widget-area sidebar-break-md col-xl-6 col-lg-6 col-12 no-equal-item">
                            <div class="widgets widget-call-to-action-light">
                                <div class="media">
                                       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/figure6.png" alt="<?php the_title_attribute();?>">
                                    <div class="media-body space-sm">
                                        <h4><?php echo esc_html__( 'Emergency Cases', 'medilink' ); ?></h4>
                                        <span><?php echo esc_html($_emergency_cases); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>        
                        <?php } ?>                     
                </div> <!-- row -->  
            </div> <!-- item-content --> 
			<?php endwhile; ?>
			<?php 
			else:
				$remaining = false;		
			endif;
			$html = ob_get_clean();

		}else{
			
		}	
			   
		wp_send_json( compact('html'));
	}
}

new Scripts;