<?php
require_once "PRVP_MetaProvider.php";

/**
 * Get single post data */
class PRVP_PostMeta implements PRVP_MetaProvider {
	/**
	 * @return mixed
	 */
	public function getMeta()   {
		 return get_post_meta( get_the_ID() );
	}
}