<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\Helper;
use \WP_Widget;
use \RT_Widget_Fields;
use \WP_Query;

class Recent_Posts_Widget extends WP_Widget {

		public function __construct() {
			$id = 'medilink_posts';
			parent::__construct(
	        $id, // Base ID
	        esc_html__( 'medilink: Recent Posts', 'medilink-core' ), // Name
	        array( 'description' => esc_html__( 'medilink: Recent Posts Widget', 'medilink-core' ) 
	        	) );
		}

		public function widget($args, $instance) {

			if (!isset($args['widget_id'])) {
				$args['widget_id'] = $this->id;
			}

			$args['before_title'] = '<div class="footer-header"><h3 class="widgettitle">';
			$args['after_title']  = '</h3></div>';
			$title                = (!empty($instance['title'])) ? $instance['title'] : esc_html__('Recent Posts', 'medilink-core');
			$title                = apply_filters('widget_title', $title, $instance, $this->id_base);
			$number               = (!empty($instance['number'])) ? absint($instance['number']) : 5;
			$content_limit        = (!empty($instance['content_limit'])) ? absint($instance['content_limit']) : 10;
			if (!$number) {
				$number = 5;
			}
			$show_img     = isset($instance['show_img']) ? $instance['show_img'] : false;
			$show_date    = isset($instance['show_date']) ? $instance['show_date'] : false;
			$show_content = isset($instance['show_content']) ? $instance['show_content'] : false;
			$thumb_size = MEDILINK_CORE_CPT . '-size8';
			$result_query = new WP_Query(apply_filters('widget_posts_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
			)));

			if ($result_query->have_posts()):
			?>
				<?php echo wp_kses_post($args['before_widget']); ?>
				<?php if ($title) {
						echo wp_kses_post($args['before_title']) . $title . wp_kses_post($args['after_title']);
					}?>
				<?php while ($result_query->have_posts()): $result_query->the_post();
					$content = Helper::get_current_post_content();
					$content = wp_trim_words( $content, $content_limit );
					$content = "<p>$content</p>";
				?>
	            <div class="media">
	            	<?php if ($show_img): ?> 
	                <a href="<?php the_permalink();?>" class="pull-left" title="<?php the_title_attribute();?>">
	                    <?php if (has_post_thumbnail()) {?>
	                        <?php the_post_thumbnail($thumb_size);?>
	                    <?php }?>
	                </a>
	                 <?php endif;?>
	                <div class="media-body">
	                <?php if ($show_date): ?>
	                	<p class="date"><?php the_time( get_option( 'date_format' ) );?></p>
	                <?php endif;?>	                	
	                    <p class="spost-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>	                        
                        <?php if ($show_content): ?>
                            <div class="w-post-content"><?php echo wp_kses_post( $content );?></div>
                    <?php endif;?>                   
                </div>
            </div>
		<?php endwhile;?>
		<?php echo wp_kses_post($args['after_widget']); ?>
		<?php
        wp_reset_postdata();
			endif;
		}

		public function update($new_instance, $old_instance) {
			$instance                  = $old_instance;
			$instance['title']         = sanitize_text_field($new_instance['title']);
			$instance['number']        = (int) $new_instance['number'];
			$instance['content_limit'] = (int) $new_instance['content_limit'];
			$instance['show_img']      = isset($new_instance['show_img']) ? (bool) $new_instance['show_img'] : false;
			$instance['show_date']     = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
			$instance['show_content']  = isset($new_instance['show_content']) ? (bool) $new_instance['show_content'] : false;
			return $instance;
		}

		public function form($instance) {

			$defaults = array(
				'title'         => esc_html__('Latest Post', 'medilink-core'),
				'number'        => '5',
				'show_img'     	=> true,
				'show_date'     => true,
				'show_content'  => true,
				'content_limit' => '10',
			);

			$instance = wp_parse_args((array) $instance, $defaults);

			$fields = array(
				'title'         => array(
					'label' => esc_html__('Title', 'medilink-core'),
					'type'  => 'text',
				),
				'number'        => array(
					'label' => esc_html__('Number of posts to show', 'medilink-core'),
					'type'  => 'number',				
				),
				'content_limit' => array(
					'label' => esc_html__('Content limit of posts to show', 'medilink-core'),
					'type'  => 'number',					
				),
				'show_img'  => array(
					'label' =>esc_html__('Display post Image ?', 'medilink-core'),
					'type'  => 'checkbox',
				),
				'show_content'  => array(
					'label' => esc_html__('Display post Content ?', 'medilink-core'),
					'type'  => 'checkbox',
				),
				'show_date'     => array(
					'label' => esc_html__('Display post date ?', 'medilink-core'),
					'type'  => 'checkbox',
				),
			);

			RT_Widget_Fields::display($fields, $instance, $this);
		}
	}

