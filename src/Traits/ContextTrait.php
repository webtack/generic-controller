<?php namespace Webtack\GenericController\Traits;


trait ContextTrait {
	
	/**
	 * @param       $request
	 * @param array $column
	 * @return array
	 */
	protected function getContextData($request, $column = []) {
		return [];
	}
	
	/**
	 * Init Model from Query
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	abstract function model();
	
	/**
	 * Init key from context in views
	 * by default returns the name of the model's slice
	 *
	 * @return string
	 */
	protected function contextObjectName(): string {
		$objectName = $this->getClassName($this->model());
		
		return $this->lcFirstName($objectName);
	}
	
}