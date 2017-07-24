<?php

function resource_init() {

	$rewrite = array(
	    'slug'                 => 'resources',
	    'with_front'           => false,
	    'pages'                => true,
	);

	register_post_type( 'resource', array(
		'labels'            => array(
			'name'                => __( 'Resources', 'reverie' ),
			'singular_name'       => __( 'Resources', 'reverie' ),
			'all_items'           => __( 'All Resources', 'reverie' ),
			'new_item'            => __( 'New Resources', 'reverie' ),
			'add_new'             => __( 'Add New', 'reverie' ),
			'add_new_item'        => __( 'Add New Resources', 'reverie' ),
			'edit_item'           => __( 'Edit Resources', 'reverie' ),
			'view_item'           => __( 'View Resources', 'reverie' ),
			'search_items'        => __( 'Search Resources', 'reverie' ),
			'not_found'           => __( 'No Resources found', 'reverie' ),
			'not_found_in_trash'  => __( 'No Resources found in trash', 'reverie' ),
			'parent_item_colon'   => __( 'Parent Resources', 'reverie' ),
			'menu_name'           => __( 'Resources', 'reverie' ),
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
		'rest_base'         => 'resource',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'resource_init' );

function resource_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['resource'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Resources updated. <a target="_blank" href="%s">View Resources</a>', 'reverie'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'reverie'),
		3 => __('Custom field deleted.', 'reverie'),
		4 => __('Resources updated.', 'reverie'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Resources restored to revision from %s', 'reverie'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Resources published. <a href="%s">View Resources</a>', 'reverie'), esc_url( $permalink ) ),
		7 => __('Resources saved.', 'reverie'),
		8 => sprintf( __('Resources submitted. <a target="_blank" href="%s">Preview Resources</a>', 'reverie'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Resources scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Resources</a>', 'reverie'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Resources draft updated. <a target="_blank" href="%s">Preview Resources</a>', 'reverie'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'resource_updated_messages' );
