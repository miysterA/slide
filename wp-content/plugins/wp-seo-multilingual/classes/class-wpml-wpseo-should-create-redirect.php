<?php

/**
 * Class WPML_WPSEO_Should_Create_Redirect
 *
 * Extra checks to decide when a redirect should be created.
 */
class WPML_WPSEO_Should_Create_Redirect implements IWPML_Action {

	/** @var string */
	private $unfiltered_url;

	public function add_hooks() {
		add_filter( 'wpseo_premium_post_redirect_slug_change', array( $this, 'dont_convert_url' ), 10, 4 );
	}

	/**
	 * @param bool    $result
	 * @param integer $post_id
	 * @param WP_Post $post
	 * @param WP_Post $post_before
	 *
	 * @return bool
	 */
	public function dont_convert_url( $result, $post_id, $post, $post_before ) {
		// This applies to drafts only.
		$status = get_post_status( $post_before );
		if ( in_array( $status, array( 'draft', 'auto-draft' ), true ) ) {
			add_filter( 'post_link', array( $this, 'save_unfiltered_url' ), 0 );
			add_filter( 'post_link', array( $this, 'restore_unfiltered_url' ), 20 );
		}

		return $result;
	}

	public function save_unfiltered_url( $url ) {
		$this->unfiltered_url = $url;

		return $url;
	}

	public function restore_unfiltered_url( $url ) {
		$url = $this->unfiltered_url;

		$this->unfiltered_url = null;
		remove_filter( 'post_link', array( $this, 'save_unfiltered_url' ), 0 );
		remove_filter( 'post_link', array( $this, 'restore_unfiltered_url' ), 20 );

		return $url;
	}

}
