<?php namespace Webtack\GenericController;

use Webtack\GenericController\Traits\ContextHandlerTrait;
use Webtack\GenericController\Traits\TemplateHandlerTrait;

class GenericTemplateController extends GenericBaseController {
	
	use ContextHandlerTrait;
	use TemplateHandlerTrait;
	
	public function get() {
		$context = $this->getContextData($this->request);
		return $this->renderToResponse($context);

	}
}