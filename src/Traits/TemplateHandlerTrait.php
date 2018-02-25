<?php namespace Webtack\GenericController\Traits;


use ErrorException;
use Illuminate\Support\Facades\View;

trait TemplateHandlerTrait {
	
	protected $templateName = Null;
	protected $templatePrefix = null;
	protected $templateSuffix = null;
	
	/**
	 * @param array $context
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	protected function renderToResponse(array $context) {
		return view($this->getTemplateName(), $context);
	}	
	
	/**
	 * Get name from template
	 * 
	 * @return string
	 */
	
	public function getTemplateName() {
		$templateName = $this->templateName;
		
		if($this->templatePrefix)
			$templateName = $this->templatePrefix . $templateName;
		
		if($this->templateSuffix)
			$templateName .= $this->templateSuffix;
		
		return $templateName;
	}
	
	/**
	 * Optional
	 * Init $templatePrefix property
	 * 
	 * @return null | string
	 */
	protected function templatePrefix() {
		return null;
	}
	
	/**
	 * Optional
	 * Init $templateSuffix property
	 *
	 * @return null | string
	 */
	protected function templateSuffix() {
		return null;
	}
	
	
}