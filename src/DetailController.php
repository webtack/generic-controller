<?php namespace Webtack\GenericController;


use Webtack\GenericController\Traits\BaseTrait;
use Webtack\GenericController\Traits\ContextTrait;
use Webtack\GenericController\Traits\ModifierNameTrait;
use Webtack\GenericController\Traits\SingleObjectContextTrait;
use Webtack\GenericController\Traits\SingleObjectTemplateTrait;

abstract class DetailController extends BaseController {
		
		use BaseTrait;
		use ModifierNameTrait;
		use SingleObjectTemplateTrait;
		use SingleObjectContextTrait;
		
		
		public function get($request) {
				$context = $this->getContextData($request);
				return $this->renderToResponse($context);
		}
		
}