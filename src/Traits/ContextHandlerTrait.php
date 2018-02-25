<?php namespace Webtack\GenericController\Traits;


trait ContextHandlerTrait {
	
	/**
	 * @param Illuminate\Http\Request
	 *
	 * @return array
	 */
	public function getContextData($request) {		
		$context = $request->route()->parameters;	
		return $context;
	}
	
}