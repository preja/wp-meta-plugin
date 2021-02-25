<?php

/**
 * Class PRVP_View
 * Outputs view in template
 */
class PRVP_View {

	/**
	 * @var string
	 */
	private $viewPath = 'templates';

	/**
	 * @var string
	 */
	protected $extension = 'php';

	/**
	 * @var string
	 */
	private $viewFile = 'index';

	/**
	 * @return PRVP_View
	 */
	public static function create() {
		return new PRVP_View();
	}

	/**
	 * @param       $template
	 * @param array $params
	 *
	 * @throws Exception
	 */
	public function render( $template, $params = [] ) {
         if (!$this->checkTemplate($template)) {
         	 return "";
         }
         $view =  $params;
         require_once 'PRVP_HtmlUtil.php';
         require_once $this->getTemplatePath();

	}

	protected function checkTemplate( $template ) {
		$this->viewFile = $template;

		if ( !file_exists(  $this->getFullPath()) ) {
			return  false;
		}
		return true;
    }

	/**
	 * @return string
	 */
	protected function getTemplatePath() {
		return $this->viewPath . DIRECTORY_SEPARATOR . $this->viewFile . '.' . $this->extension;
	}

	/**
	 * @return string
	 */
	private function getFullPath() {
	   return __DIR__ . DIRECTORY_SEPARATOR . $this->getTemplatePath();

     }


}