<?php namespace Webtack\GenericController\Traits;


trait TemplateTrait {
		
		use BaseTrait;
		use ModifierNameTrait;
		
		/**
		 * @param array $context
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		protected function renderToResponse(array $context = []) {
				return view($this->getTemplateName(), $context);
		}
		
		/**
		 * Get full name from template
		 *
		 * @return string
		 */
		
		protected function getTemplateName() {
				$templateName = $this->templateName;
				
				if($templatePrefix = $this->templatePrefix())
						$templateName = $this->joinPrefix($templateName, $templatePrefix);
				
				if($templateSuffix = $this->templateSuffix())
						$templateName = $this->joinSuffix($templateName, $templateSuffix);
				
				return $templateName;
		}
		
		/**
		 * Init templateName property from view
		 *
		 * @return string
		 */
		abstract public function templateName();
		
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