<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'umeetevent_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category UmeetEvent
 * @package  umeetevent
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */



add_action( 'cmb2_admin_init', 'course_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function course_repeatable_group_field_metabox() {
	$prefix = 'course_group_';

	$cmb_meta = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Test Metabox', 'umeetevent' ),
		'object_types'  => array( 'course' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Trainer’s Name', 'umeetevent' ),
		'id'   => 'course_trainer',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Course Fee', 'umeetevent' ),
		'id'   => 'course_fee',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Available Seats ', 'umeetevent' ),
		'id'   => 'course_seat',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Time Schedule', 'umeetevent' ),
		'id'   => 'course_schedule',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Course Enroll URL', 'umeetevent' ),
		'id'   => 'course_enroll',
		'type' => 'text_url',
	) );

	
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Eligibility field', 'umeetevent' ),
		'desc' => esc_html__( 'field description (optional)', 'umeetevent' ),
		'id'   => 'course_eligibility',
		'type' => 'textarea',
	) );


	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => 'course_outline',
		'title'        => esc_html__( 'Course Outline', 'umeetevent' ),
		'object_types' => array( 'course' ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => 'course_outlines',
		'type'        => 'group',
		'options'     => array(
			'group_title'    => esc_html__( 'Outline {#}', 'umeetevent' ), // {#} gets replaced by row number
			'add_button'     => esc_html__( 'Add Outline', 'umeetevent' ),
			'remove_button'  => esc_html__( 'Remove Outline', 'umeetevent' ),
			'sortable'       => true,
			// 'closed'      => true, // true to have the groups closed by default
			// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'umeetevent' ), // Performs confirmation before removing group.
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Outline Title', 'umeetevent' ),
		'id'         => 'lesson_title',
		'type'       => 'text',
		// 'repeatable' => true,
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Outline Details URL', 'umeetevent' ),
		'id'         => 'outline_btn_url',
		'type'       => 'text_url',
		// 'repeatable' => true,
	) );


}
