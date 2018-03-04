<?php namespace Webtack\GenericController;

use Webtack\GenericController\Traits\BaseTrait;
use Webtack\GenericController\Traits\TemplateTrait;


/**
 * Class TemplateController
 * Processes the specified template using a context that contains parameters from the URL.
 *
 * @package Webtack\GenericController
 */
abstract class TemplateController extends BaseController {
	
	use BaseTrait;
	use TemplateTrait;
	
	
	public function get() {
		return $this->renderToResponse();
	}
	
	/**
	 * Init templateName property from view
	 *
	 * @return string
	 */
	abstract function templateName();
}