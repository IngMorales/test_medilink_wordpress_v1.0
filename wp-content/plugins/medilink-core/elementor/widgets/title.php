<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use radiustheme\Roofit\Helper;


if ( ! defined( 'ABSPATH' ) ) exit;
class Title extends Custom_Widget_Base {
    public function __construct( $data = [], $args = null ){
            $this->rt_name = esc_html__( 'Section Title', 'medilink-core' );
            $this->rt_base = 'rt-title';
            parent::__construct( $data, $args );
    }
    public function rt_fields(){
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
                        'style3' => esc_html__( 'Style 3', 'medilink-core' ),
                        'style4' => esc_html__( 'Style 4', 'medilink-core' ),
                        'style5' => esc_html__( 'Style 5', 'medilink-core' ),
                        'style6' => esc_html__( 'Style 6', 'medilink-core' ),
                    ),
                    'default' => 'style1',
                ),
                array(
                    'type'    => Controls_Manager::CHOOSE,
                    'id'      => 'Alignment',
                    'label'   => esc_html__( 'Style', 'medilink-core' ),
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'htmega-addons' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'htmega-addons' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'htmega-addons' ),
                            'icon' => 'fa fa-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'htmega-addons' ),
                            'icon' => 'fa fa-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .heading-layout1' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .heading-layout4' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .heading-layout5' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .heading-layout6' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'left',
                ),  
                 array(
                    'type'    => Controls_Manager::SELECT2,
                    'id'      => 'theme',
                    'label'   => esc_html__( 'Theme', 'medilink-core' ),
                    'options' => array(
                        'theme1' => esc_html__( 'Theme 1', 'medilink-core' ),
                        'theme2' => esc_html__( 'Theme 2', 'medilink-core' ),
                        'theme3' => esc_html__( 'Theme 3', 'medilink-core' ),
                        'theme4' => esc_html__( 'Theme 4', 'medilink-core' ),
                        'theme5' => esc_html__( 'Theme 5', 'medilink-core' ),
                           
                    ),
                    'default' => 'theme1',
                    'condition'   => array( 'style' => array( 'style1', 'style6')),
                ),   
                 array(
                    'type'    => Controls_Manager::SELECT2,
                    'id'      => 'theme2',
                    'label'   => esc_html__( 'Theme', 'medilink-core' ),
                    'options' => array(
                        'light' => esc_html__( 'Light', 'medilink-core' ),
                        'dark' => esc_html__( 'Dark', 'medilink-core' ),       
                    ),
                    'default' => 'dark',
                    'condition'   => array( 'style' => array( 'style4')),
                ),	
                array(
                    'type'    => Controls_Manager::TEXT,
                    'id'      => 'beforetitle',
                    'label'   => esc_html__( 'Before Title', 'medilink-core' ),
                    'default' => 'Before Title',
                     'condition'   => array( 'style' => array( 'style5','style4','style6')),
                ),
                array(
                    'type'    => Controls_Manager::TEXT,
                    'id'      => 'title',
                    'label'   => esc_html__( 'Title', 'medilink-core' ),
                    'default' => 'Lorem Ipsum',
                ),
                array(
                    'type'    => Controls_Manager::TEXTAREA,
                    'id'      => 'subtitle',
                    'label'   => esc_html__( 'Subtitle', 'medilink-core' ),
                    'default' => 'Lorem Ipsum has been standard daand scrambled. Rimply dummy text of the printing and typesetting industry',
                    'condition'   => array( 'style' => array( 'style1','style2','style5','style4','style6')),
                ),                   
                array(
                    'mode' => 'section_end',
                ),

                    // Before Title style
                array(
                    'mode'    => 'section_start',
                    'id'      => 'sec_title_style',
                    'label'   => esc_html__( 'Title', 'medilink-core' ),
                    'tab'     => Controls_Manager::TAB_STYLE,
                ),         
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'title_color',
                    'label'   => esc_html__( 'Title Color', 'medilink-core' ),
                    'default' => '#111111',
                    'selectors' => array(
                        '{{WRAPPER}} .rtin-title' => 'color: {{VALUE}}',                                
                    ),
                     'condition'   => array( 'style' => array( 'style1', 'style2','style5','style6')),
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'subtitle_color',
                    'label'   => esc_html__( 'Subtitle Color', 'medilink-core' ),
                    'default' => '',
                    'selectors' => array( '{{WRAPPER}} .rtin-subtitle' => 'color: {{VALUE}}' ),
                    'condition'   => array( 'style' => array( 'style1','style2','style5','style6')),
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'title_after_color',
                    'label'   => esc_html__( 'Title After  Color', 'medilink-core' ),
                    'default' => '',
                    'selectors' => array(                                
                        '{{WRAPPER}} .section-heading:after' => 'background: {{VALUE}}'
                    ),
                     'condition'   => array( 'style' => array( 'style1','style2','style5','style6')),
                ),
                array( 
                    'mode'      => 'group',
                    'type'      => Group_Control_Typography::get_type(),
                    'name'      => 'titles_font_size',                
                    'label'     => esc_html__( 'Typography', 'medilink-core' ),
                    'selector'  => '{{WRAPPER}} .rtin-title',
                ),
                array( 
                    'mode'      => 'group',
                    'type'      => Group_Control_Typography::get_type(),
                    'name'      => 'subtitle_font_size',                
                    'label'     => esc_html__( 'Sub Title Typography', 'medilink-core' ),
                    'selector'  => '{{WRAPPER}} .rtin-beforetitle',
                    'condition'   => array( 'style' => array( 'style4' )),
                ),
                array(
                    'type'    => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'id'      => 'title_padding',
                     'mode'          => 'responsive',
                    'label'   => __( 'Padding', 'medilink-core' ),
                    'selectors' => array(
                        '{{WRAPPER}} .rtin-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                   
                    ),
                    'separator' => 'before',
                ),  
                array(
                    'type'    => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                     'mode'          => 'responsive',
                    'id'      => 'title_margin',
                    'label'   => __( 'Margin', 'medilink-core' ),                 
                    'selectors' => array(
                        '{{WRAPPER}} .rtin-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
                    ),
                    'separator' => 'before',
                ),
                array(
                'type'          => Controls_Manager::SLIDER,
                'mode'          => 'responsive',
                'id'            => 'content_width',
                'label'         => esc_html__( 'Content Width', 'medilink-core' ),                       
                'size_units' => array( 'px', '%', 'em' ),
                'default' => array(
                'unit' => '%',
                'size' => '',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .section-heading p' => 'width: {{SIZE}}{{UNIT}};',
                )
            ),  
                array(
                    'mode' => 'section_end',
                ), 
            );

            return $fields;
    }
    protected function render() {
        $data = $this->get_settings();
            switch ( $data['style'] ) {
            case 'style2':
                $template = 'title-2';
            break;
            case 'style3':
                $template = 'title-3';
            break;       
            case 'style4':
                $template = 'title-4';
            break;
            case 'style5':
                $template = 'title-5';
            break;
            case 'style6':
                $template = 'title-6';
            break;
            default:
                $template = 'title-1';
            break;
        }
        return $this->rt_template( $template, $data );
    }
}