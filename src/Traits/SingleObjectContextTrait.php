<?php namespace Webtack\GenericController\Traits;


trait SingleObjectContextTrait {
	
	use ContextTrait;
	
	protected function getContextData($request, $column = []) {
		$model = $this->model();
		
		if (empty($column)) {
			$data = $model->find($request->id);
		}
		else {
			$data = $model->where($column)->first();
		}
		
		return [$this->contextObjectName() => $data];
	}
	
}