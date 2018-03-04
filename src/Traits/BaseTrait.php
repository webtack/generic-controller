<?php namespace Webtack\GenericController\Traits;


trait BaseTrait {
		
		public function __get($name) {
				return call_user_func_array([$this, $name], []);
		}
		
}