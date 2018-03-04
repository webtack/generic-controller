<?php namespace Webtack\GenericController;

use Webtack\GenericController\Traits\BaseTrait;
use Webtack\GenericController\Traits\ModifierNameTrait;
use Webtack\GenericController\Traits\MultipleObjectContextTrait;
use Webtack\GenericController\Traits\MultipleObjectTemplateTrait;


abstract class ListController extends BaseController {
	
	use BaseTrait;
	use ModifierNameTrait;
	use MultipleObjectContextTrait;
	use MultipleObjectTemplateTrait;
	
	public function get($request) {
		$context = $this->getContextData($request);
		return $this->renderToResponse($context);
	}
		
		
}