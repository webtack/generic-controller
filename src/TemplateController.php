<?php namespace Webtack\GenericController;

use Webtack\GenericController\Traits\ContextHandlerTrait;
use Webtack\GenericController\Traits\TemplateHandlerTrait;

/**
 * Class TemplateController
 * Processes the specified template using a context that contains parameters from the URL.
 * 
 * @package Webtack\GenericController
 */
abstract class TemplateController extends BaseController {
	
	use ContextHandlerTrait;
	use TemplateHandlerTrait;
	
	protected function initProperties() {
		$this->templateName = $this->templateName();
		$this->templatePrefix = $this->templatePrefix();
		$this->templateSuffix = $this->templateSuffix();
	}
	
	
	/**
	 * Init templateName from view
	 *
	 * @return string
	 */
	abstract protected function templateName();
	
	
	public function get() {
		$context = $this->getContextData($this->request);
		return $this->renderToResponse($context);

	}
}