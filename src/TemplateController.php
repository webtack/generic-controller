<?php namespace Webtack\GenericController;

use Webtack\GenericController\Traits\ContextTrait;
use Webtack\GenericController\Traits\TemplateTrait;


/**
 * Class TemplateController
 * Processes the specified template using a context that contains parameters from the URL.
 *
 * @package Webtack\GenericController
 */
abstract class TemplateController extends BaseController {
		
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