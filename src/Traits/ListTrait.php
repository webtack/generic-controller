<?php namespace Webtack\GenericController\Traits;


trait ListTrait {
		
		/**
		 * @return null | \Illuminate\Database\Eloquent\Model
		 */
		protected function model() {
				return null;
		}
		
		/**
		 * @return string
		 */
		protected function contextObjectName(): string {
				return null;
		}
}