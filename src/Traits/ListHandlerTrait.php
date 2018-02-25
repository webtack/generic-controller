<?php namespace Webtack\GenericController\Traits;


trait ListHandlerTrait {
	
	protected $model;
	protected $contextObjectName;
	
	/**
	 * @return null | \Illuminate\Database\Eloquent\Model
	 */
	public function model() : \Illuminate\Database\Eloquent\Model {
		return null;
	}
	
	/**
	 * @return string
	 */
	public function contextObjectName() : string {
		return null;
	}
}