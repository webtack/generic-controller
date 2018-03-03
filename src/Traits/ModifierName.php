<?php namespace Webtack\GenericController\Traits;


trait ModifierName {
		
		protected function getClassName($object): string {
				$path = get_class($object);
				$path = explode("\\", $path);
				$path = array_pop($path);
				$path = str_replace("Controller", "", $path);
				$path = str_replace("Model", "", $path);
				$path = str_replace("Class", "", $path);
				$path = str_replace("Trait", "", $path);
				
				return $path;
		}
		
		
		protected function splitName(string $string, string $delimiter) {
				
				$string = preg_replace("/(?=[A-Z])/", $delimiter, $string);
				$string = str_replace("_", $delimiter, $string);
				$string = str_replace($delimiter . $delimiter, $delimiter, $string);
				$string = substr($string, 1);
				$string = mb_strtolower($string);
				
				return $string;
		}
		
		protected function joinPrefix(string $string, $prefix) {
				
				if (!empty($prefix)) {
						return $prefix . $string;
				}
				else {
						return $string;
				}
		}
		
		protected function joinSuffix(string $name, $suffix) {
				
				if (!empty($suffix)) {
						return $name . $suffix;
				}
				else {
						return $name;
				}
		}
}