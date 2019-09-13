<?php
/*
  Plugin Name: GUID overrides
  Description: Modifies the guid from a uri to a hash, for use with data relationships and deployments across environments
  Version: 1.0
  Author: Matt Beck
*/


/**
* Use an immutable uuid4 for WordPress GUID instead of the default (initial permalink) on post creation
*
* @param array $data slashed array of data
* @param array $postarr Array containing WP Post object (human readable)
* @return array $data modified
*/
function wpcd_guid_filter( $data, $postarr ) {
	if ( empty($data['guid']) ) {
		$data['guid'] = wp_slash( 'urn:uuid:' . wp_generate_uuid4() );
	}
	return $data;
}
add_filter( 'wp_insert_post_data', 'wpcd_guid_filter', 10, 2 );
