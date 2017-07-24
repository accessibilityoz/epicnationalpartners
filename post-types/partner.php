<?php

function partner_init() {

	$rewrite = array(
	    'slug'                 => 'partners',
	    'with_front'           => false,
	    'pages'                => true,
	);

	register_post_type( 'partner', array(
		'labels'            => array(
			'name'                => __( 'Partners', 'reverie' ),
			'singular_name'       => __( 'Partners', 'reverie' ),
			'all_items'           => __( 'All Partners', 'reverie' ),
			'new_item'            => __( 'New Partners', 'reverie' ),
			'add_new'             => __( 'Add New', 'reverie' ),
			'add_new_item'        => __( 'Add New Partners', 'reverie' ),
			'edit_item'           => __( 'Edit Partners', 'reverie' ),
			'view_item'           => __( 'View Partners', 'reverie' ),
			'search_items'        => __( 'Search Partners', 'reverie' ),
			'not_found'           => __( 'No Partners found', 'reverie' ),
			'not_found_in_trash'  => __( 'No Partners found in trash', 'reverie' ),
			'parent_item_colon'   => __( 'Parent Partners', 'reverie' ),
			'menu_name'           => __( 'Partners', 'reverie' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'has_archive'       => true,
		'rewrite'           => $rewrite,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'menu_position' 	=> 5,
		'show_in_rest'      => true,
		'rest_base'         => 'partner',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'partner_init' );

function partner_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['partner'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Partners updated. <a target="_blank" href="%s">View Partners</a>', 'reverie'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'reverie'),
		3 => __('Custom field deleted.', 'reverie'),
		4 => __('Partners updated.', 'reverie'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Partners restored to revision from %s', 'reverie'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Partners published. <a href="%s">View Partners</a>', 'reverie'), esc_url( $permalink ) ),
		7 => __('Partners saved.', 'reverie'),
		8 => sprintf( __('Partners submitted. <a target="_blank" href="%s">Preview Partners</a>', 'reverie'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Partners scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Partners</a>', 'reverie'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Partners draft updated. <a target="_blank" href="%s">Preview Partners</a>', 'reverie'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'partner_updated_messages' );
