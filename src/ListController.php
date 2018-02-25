<?php namespace Webtack\GenericController;

use Webtack\GenericController\Traits\ContextHandlerTrait;
use Webtack\GenericController\Traits\ListHandlerTrait;
use Webtack\GenericController\Traits\TemplateHandlerTrait;

class ListController extends BaseController {	
	
	use TemplateHandlerTrait;
	use ContextHandlerTrait;
	use ListHandlerTrait;

	
}