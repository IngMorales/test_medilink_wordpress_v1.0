<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Routine extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Routine', 'medilink-core' );
		$this->rt_base = 'rt-routine';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'medilink-core' ),
				'6'  => esc_html__( '2 Col', 'medilink-core' ),
				'4'  => esc_html__( '3 Col', 'medilink-core' ),
				'3'  => esc_html__( '4 Col', 'medilink-core' ),
				'2'  => esc_html__( '6 Col', 'medilink-core' ),
			),
		);

		parent::__construct( $data, $args );
	}

		
	public function sort_by_time_as_key( $a, $b ) {
		return ( strtotime( $a ) > strtotime( $b ) );
	}

	public function sort_by_end_time( $a, $b ) {
		return ( strtotime( $a['end_time'] ) > strtotime( $b['end_time'] ) );
	}


	public function print_routine( $routine, $link, $department_true ) {

		$prefix      = MEDILINK_CORE_THEME;
		$thumb_size  = "{$prefix}-size6";		    

		usort( $routine, array( $this, 'sort_by_end_time' ) );		

		?>

		<?php foreach ( $routine as $each_routine ):	
		$permalink = get_the_permalink( $each_routine['id'] );			

		 ?>	 
			<div class="schedule-item-wrapper">		
			    <div class="media">
			        <div class="item-img">
			            <?php echo get_the_post_thumbnail($each_routine['id'],'thumbnail',array( "class" => "img-fluid rounded-circle" ) ); ?>
			        </div>
			        <div class="media-body">
			            <h3 class="title"><?php echo esc_html( $each_routine['doctor'] );?></h3>
			            <div class="item-ctg"><a href="<?php echo esc_url( $each_routine['department_link']); ?>"><?php echo esc_html( $each_routine['department'] );?></a></div>
			        	<?php if ( $link == 'true' ) { ?>
			           		<a href="<?php echo esc_url( $permalink); ?>" class="item-btn btn-fill size-xs radius-4"><?php esc_html_e( 'View Profile', 'medilink-core' )?></a>
			       		<?php } ?>
			        </div>
			    </div>
				<?php 			
				if ( $department_true == 'true' ): ?>
					<div class="item-ctg"><a href="<?php echo esc_url( $each_routine['department_link']); ?>"><?php echo esc_html( $each_routine['department'] );?></a></div>
				<?php endif;?>
			    <div class="item-time"><span><?php echo esc_html( $each_routine['start_time'] );?></span>
				<?php if ( !empty( $each_routine['end_time'] ) ): ?>
					<span>- <?php echo esc_html( $each_routine['end_time'] );?></span>
				<?php endif;?></div>			  
			   <div class="item-team"><?php echo esc_html( $each_routine['doctor'] );?></div>
			</div>		
		<?php endforeach; ?>
		<?php
	}



	public function rt_fields(){

		$cpt = MEDILINK_CORE_CPT;

		$terms  = get_terms( array( 'taxonomy' => "{$cpt}_doctor_category", 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => __( 'All Categories', 'medilink-core' ) );
		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}

		$fields = array(
					array(
						'mode'    => 'section_start',
						'id'      => 'sec_general',
						'label'   => esc_html__( 'General', 'medilink-core' ),
					),
					array(
						'type'    => Controls_Manager::SELECT2,
						'id'      => 'style',
						'label'   => esc_html__( 'Style', 'medilink-core' ),
						'options' => array(
							'style1' => esc_html__( 'Style 1', 'medilink-core' ),
							'style2' => esc_html__( 'Style 2', 'medilink-core' ),						
							'style3' => esc_html__( 'Style 3 (New)', 'medilink-core' ),						
						),
						'default' => 'style1',
					),					
					array(
						'type'    => Controls_Manager::SELECT2,
						'id'      => 'cat',
						'label'   => esc_html__( 'Doctor Categories', 'medilink-core' ),
						'options' => $category_dropdown,
						'default' => '0',
					),				
					array(
						'type'    => Controls_Manager::SELECT2,
						'id'      => 'link',
						'label'   => esc_html__( 'Linkable', 'medilink-core' ),
						'options' => array(
							'true' => __( 'Enabled', 'medilink-core' ),
							'false' => __( 'Disabled', 'medilink-core' ),
						),

						'default' => 'true',
					),
					array(
						'type'    => Controls_Manager::SELECT2,
						'id'      => 'department_true',
						'label'   => esc_html__( 'Department Display', 'medilink-core' ),
						'options' => array(
							'true' => __( 'Enabled', 'medilink-core' ),
							'false' => __( 'Disabled', 'medilink-core' ),
						),
						'default' => 'true',
					),				
					array(
						'mode' => 'section_end',
					),
		);

		return $fields;
	}

	protected function render() {

		$data = $this->get_settings();				

			switch ($data['style'] ) {			
			case 'style2':
				$template = 'routine-2';
				break;
			case 'style3':
				$template = 'routine-3';
				break;			
			default:
				$template = 'routine';
				break;
		}

		return $this->rt_template( $template, $data );
	}
}

