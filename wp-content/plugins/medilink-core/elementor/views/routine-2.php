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
$thumb_size  = "{$prefix}-size4";

// week names array
	$weeknames = array(
		'mon' => __( 'Monday', 'medilink-core' ),
		'tue' => __( 'Tuesday', 'medilink-core' ),
		'wed' => __( 'Wednesday', 'medilink-core' ),
		'thu' => __( 'Thursday', 'medilink-core' ),
		'fri' => __( 'Friday', 'medilink-core' ),
		'sat' => __( 'Saturday', 'medilink-core' ),
		'sun' => __( 'Sunday', 'medilink-core' ),
	);

	$weeknames = apply_filters( "{$cpt}_weeknames", $weeknames );

	// class post types array
	$args = array(
		'posts_per_page'   => -1,
		'post_type'        => "{$cpt}_doctor",
		'suppress_filters' => false,
		'orderby'          => 'title',
		'order'            => 'ASC',
	);

	if ( !empty( $data['cat'] ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => "{$cpt}_doctor_category",
				'field' => 'term_id',
				'terms' =>  $data['cat'],
			)
		);
	}

$doctors = get_posts( $args );
$schedule = array();
$available_weeks = array();
$link = $data['link'];
$department_true = $data['department_true'];

foreach ( $doctors as $doctor ) {
	$metas = get_post_meta( $doctor->ID, "{$cpt}_doctors_schedule", true );
	$metas = ( $metas != '' ) ? $metas : array();

	foreach ( $metas as $meta ) {
		if ( empty( $meta['week'] ) || $meta['week'] == 'none' || empty( $meta['start_time'] ) ) {
			continue;
		}

		$start_time = strtotime( $meta['start_time'] );
		$end_time   = !empty( $meta['end_time'] ) ? strtotime( $meta['end_time'] ) : false;

		if ( RDTheme::$options['doctors_time_format'] == '24' ) {
			$start_time = date( "H:i", $start_time );
			$end_time   = $end_time ? date( "H:i", $end_time ) : '';
		}
		else {
			$start_time = date( "g:ia", $start_time );
			$end_time   = $end_time ? date( "g:ia", $end_time ) : '';
		}

		if ( !in_array( $meta['week'], $available_weeks ) ) {
			$available_weeks[] = $meta['week'];
		}

		$schedule[$start_time][$meta['week']][] = array(
			'id'        	 => $doctor->ID,
			'doctor'     	 => $doctor->post_title,
			'start_time' 	 => $start_time,
			'end_time'   	 => $end_time,
			'department'     => !empty( $meta['department'] ) ? get_the_title( $meta['department'] ) : '',
			'department_link'=> !empty( $meta['department'] ) ? get_the_permalink($meta['department'] ) : '',
		);
	}
}

// remove empty fields
foreach ( $weeknames as $key => $value ){
	if ( !in_array( $key, $available_weeks ) ) {
		unset( $weeknames[$key] );
	}
}

uksort( $schedule, array( $this, 'sort_by_time_as_key' ) );

?>

<div class="class-schedule-wrap1 layout-2">
	  <div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="rt-col-title rtin-first"><div class="schedule-time-heading"><?php esc_html_e( 'Time Table', 'medilink-core' )?></div></th>
					<?php foreach ( $weeknames as $weekname ): ?>
						<td class="rt-col-title"> <div class="schedule-day-heading"><?php echo esc_html( $weekname );?></div></td>
					<?php endforeach; ?>
				</tr>
			</thead>
				<tbody>
					<?php foreach ( $schedule as $schedule_time => $schedule_value ): ?>
					<tr>
					<th class="rt-row-title"><div class="schedule-time-wrapper"><?php echo $schedule_time;?></div></th>
					<?php
					// each week slot(cell)
					foreach ( $weeknames as $weekname => $weekvalue ) {
					$has_cell = false;
					// iterate over each week array
					foreach ( $schedule_value as $schedule_week => $routine ) {
					if ( $weekname == $schedule_week ) {
						echo '<td>';
						$this->print_routine( $routine, $link, $department_true );
						echo '</td>';
						$has_cell = true;
					}
					}
					if ( !$has_cell ) {
					echo '<td></td>';
					}
					}
					?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

