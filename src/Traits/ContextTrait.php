<?php namespace Webtack\GenericController\Traits;


trait ContextTrait {
	
	/**
	 * @param Illuminate\Http\Request
	 *
	 * @return array
	 */
	protected function getContextData($request) {		
		$context = $request->route()->parameters;	
		return $context;
	}
	
}