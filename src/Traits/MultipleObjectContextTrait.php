<?php namespace Webtack\GenericController\Traits;


trait MultipleObjectContextTrait {
	
	use ContextTrait;
	
	protected function getContextData($request) {
		$model = $this->model();
		$data = $model::all();
		return [$this->contextObjectName() => $data];	
		
	}
	
	
}