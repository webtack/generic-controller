<?php namespace Webtack\GenericController;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

/**
 * Class GenericBaseController
 * --------------------------------------------------
 * Intentionally simple parent class for all views.
 * Only implements dispatch-by-method and simple sanity checking.
 *
 * @package Webtack\GenericView
 */
class GenericBaseController extends BaseController {
	/**
	 * Allowed methods
	 * @var array
	 */
	protected $httpMethodNames = [
			'GET',
			'POST',
			'PUT',
			'PATCH',
			'DELETE',
	];
	
	/**
	 * Try to dispatch to the right method; if a method doesn't exist,
	 * defer o the error handler. Also defer to the error handler if the
	 * request method isn't on the approved list.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @param array                    $parameters
	 *
	 * @return mixed
	 */
	public function dispatch(Request $request, array $parameters) {
		$method_name = $request->method();
		
		if (in_array($method_name, $this->httpMethodNames)) {
			
			array_unshift($parameters, $request);			
			return $this->callAction($method_name, $parameters);
		}
		else {
			$this->httpMethodNotAllowed($method_name);
		}
	}
	
	/**
	 * Main entry point for a request-response process.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function asView(Request $request) {
		$parameters = $request->route()->parameters;
		$parameters = array_values($parameters);
		return $this->dispatch($request, $parameters);
	}
	
	protected function httpMethodNotAllowed(string $method_name) {
		$class_name = __CLASS__;
		
		$message = "Method: [{$method_name}] Not Allowed in property " . "[\$httpMethodNames] on class [{$class_name}]";
		
		throw new MethodNotAllowedException($this->httpMethodNames, $message);
	}
	
}