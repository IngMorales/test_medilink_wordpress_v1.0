<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Paragraph_Title extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ){
            $this->rt_name = esc_html__( 'Paragraph With Title', 'medilink-core' );
            $this->rt_base = 'rt-paragraph-title';
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
                        'id'      => 'title_tag',
                        'label'   => esc_html__( 'Title HTML Tag', 'medilink-core' ),
                        'options' => array(
                            'h1' => 'H1',
                            'h2' => 'H2',
                            'h3' => 'H3',
                            'h4' => 'H4',
                            'h5' => 'H5',
                            'h6' => 'H6',
                            'div' => 'div',
                        ),

                        'default' => 'h2',
                    ),                       
                    array(
                        'type'    => Controls_Manager::TEXTAREA,
                        'id'      => 'title',
                        'label'   => esc_html__( 'Title', 'medilink-core' ),
                        'default' => 'Paragraph with title',
                    ),
                     array(
                        'type'    => Controls_Manager::TEXTAREA,
                        'id'      => 'subtitle',
                        'label'   => esc_html__( 'Title', 'medilink-core' ),
                        'default' => 'Paragraph with Sub Title',
                    ),
                    array(
                        'type'    => Controls_Manager::TEXTAREA,
                        'id'      => 'paragraph',
                        'label'   => esc_html__( 'Paragraph', 'medilink-core' ),
                        'default' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.',                            
                    ),  
                    array(
                        'mode' => 'section_end',
                    ),
            );

            return $fields;
    }

    protected function render() {

        $data = $this->get_settings();           

         $template = 'paragraph-title';           

        return $this->rt_template( $template, $data );

    }
}