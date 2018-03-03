<?php namespace Webtack\GenericController\Traits;


trait MultipleObjectTemplateTrait  {
	
		use TemplateTrait;
		
		protected function templateSuffix() {
			return '-list';
		}
		
}