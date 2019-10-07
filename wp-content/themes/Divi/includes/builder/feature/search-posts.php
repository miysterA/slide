<?php
/**
 * Handle ajax requests to search for posts.
 *
 * @since ??
 *
 * @return void
 */
function et_builder_ajax_search_posts() {
	et_core_security_check( 'edit_posts', 'et_builder_search_posts', 'nonce', '_GET' );

	$current_page     = isset( $_GET['page'] ) ? (int) $_GET['page'] : 0;
	$current_page     = max( $current_page, 1 );
	$post_type        = isset( $_GET['post_type'] ) ? sanitize_text_field( $_GET['post_type'] ) : '';
	$value            = isset( $_GET['value'] ) ? (int) $_GET['value'] : '';
	$search           = isset( $_GET['search'] ) ? sanitize_text_field( $_GET['search'] ) : '';
	$prepend_value    = $value > 0;
	$results_per_page = 20;
	$results          = array(
		'results' => array(),
		'meta'    => array(),
	);

	$public_post_types = et_builder_get_public_post_types();

	if ( ! isset( $public_post_types[ $post_type ] ) ) {
		$post_type = 'post';
	}

	$post_type_object = get_post_type_object( $post_type );
	$post_type_label  = $post_type_object ? $post_type_object->labels->singular_name : '';

	$query = array(
		'post_type'      => $post_type,
		'posts_per_page' => $results_per_page,
		'post_status'    => 'publish',
		's'              => $search,
		'orderby'        => 'date',
		'order'          => 'desc',
		'paged'          => $current_page,
	);

	if ( $prepend_value ) {
		$value_post = get_post( $value );

		if ( $value_post && 'publish' === $value_post->post_status && $value_post->post_type === $post_type ) {
			$results['results'][] = array(
				'value'     => $value,
				'label'     => et_core_intentionally_unescaped( strip_tags( $value_post->post_title ), 'react_jsx' ),
				'meta'      => array(
					'post_type' => et_core_intentionally_unescaped( $post_type_label, 'react_jsx' ),
				),
			);

			// We will manually prepend the current value so we need to reduce the number of results.
			$query['posts_per_page'] -= 1;
			$query['post__not_in']    = array( $value );
		}
	}

	$posts = new WP_Query( $query );

	foreach ( $posts->posts as $post ) {
		$results['results'][] = array(
			'value' => (int) $post->ID,
			'label' => et_core_intentionally_unescaped( strip_tags( $post->post_title ), 'react_jsx' ),
			'meta' => array(
				'post_type' => et_core_intentionally_unescaped( $post_type_label, 'react_jsx' ),
			),
		);
	}

	$results['meta']['pagination'] = array(
		'results' => array(
			'per_page' => (int) $results_per_page,
			'total'    => (int) $posts->found_posts,
		),
		'pages'   => array(
			'current'  => (int) $current_page,
			'total'    => (int) $posts->max_num_pages,
		),
	);

	wp_send_json_success( $results );
}
add_action( 'wp_ajax_et_builder_search_posts', 'et_builder_ajax_search_posts' );
