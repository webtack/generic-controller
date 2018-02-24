<?php namespace Webtack\GenericController\Traits;


use Illuminate\Http\Request;

trait ContextHandlerTrait {
	
	public function getContextData(Request $request) {
		
		$context = $this->getRequestParameters($request);
		unset($context['request']);
		
		return $context;
	}
	
}