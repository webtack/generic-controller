<?php namespace Webtack\GenericController\Traits;


trait SingleObjectTemplateTrait {
		
		use TemplateTrait;
		
		public function templateName() {
				$templateName = $this->getClassName($this);
				$templateName = $this->splitName($templateName, "-");
				return $templateName;
		}
		
}