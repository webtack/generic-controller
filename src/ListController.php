<?php namespace Webtack\GenericController;

use Webtack\GenericController\Traits\MultipleObjectContextTrait;
use Webtack\GenericController\Traits\MultipleObjectTemplateTrait;

abstract class ListController extends BaseController {	
	
	use MultipleObjectContextTrait;
	use MultipleObjectTemplateTrait;
	
	public function get() {
			
	}
		
		
}