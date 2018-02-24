<?php namespace Webtack\GenericController\Traits;


trait TemplateHandlerTrait {
	
	public $templateName = '';
	
	private function getTemplateName() {
		
		if($this->templateName === '') {
			$className = $this->getClassName();
			$className = $this->replaceTemplateName($className);
			return $className;
		}
		else {
			return $this->templateName;
		}		
	}
	
	public function renderToResponse($context) {		
		$templateName = $this->getTemplateName();		
		return view($templateName, $context);
	}
	
	private function getClassName() {
		$path = get_class($this);
		$path = explode("\\", $path);
		$path = array_pop($path);	
		
		return $path;
	}
	
	private function replaceTemplateName(string $className) {
		$className = str_replace("Controller", "", $className);
		$className = preg_replace("/(?=[A-Z])/", "-", $className);
		$className = str_replace("_", "-", $className);
		$className = str_replace("--", "-", $className);
		$className = mb_strtolower($className);
		$className = substr($className, 1);
		
		return $className;
	}
}