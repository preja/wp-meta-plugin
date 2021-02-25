<?php
require_once "PRVP_MetaProvider.php";

/**
 * Class PRVP_PostData
 */
class PRVP_PostData implements PRVP_MetaProvider {

	/**
	 * @return array|WP_Post|null
	 */
	public function getMeta()   {
		$post_fields = get_post( get_the_ID() );
		return $post_fields;
	}
}