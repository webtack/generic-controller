<?php namespace Webtack\GenericController;



/**
 * Class TemplateController
 * Processes the specified template using a context that contains parameters from the URL.
 *
 * @package Webtack\GenericController
 */
abstract class TemplateController extends BaseController {
		
		use \Webtack\GenericController\Traits\ContextTrait;
		use \Webtack\GenericController\Traits\TemplateTrait;
		
		
		public function get($request) {
				$context = $this->getContextData($request);
				
				return $this->renderToResponse($context);
		}
}