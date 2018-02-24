<?php namespace Webtack\GenericController;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Webtack\GenericController\Traits\RequestParamsHandler;

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
	 * @var \Illuminate\Http\Request $request
	 */
	protected $request;
	
	/**
	 * Try to dispatch to the right method; if a method doesn't exist,
	 * defer o the error handler. Also defer to the error handler if the
	 * request method isn't on the approved list.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return mixed
	 * @internal param array $parameters
	 *
	 */
	public function dispatch(Request $request) {
		$method_name = $request->method();
		
		if (in_array($method_name, $this->httpMethodNames)) {
			$this->request = $request;
			return $this->callAction($method_name, $this->getRequestParameters($request));
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
		return $this->dispatch($request);
	}
	
	/**
	 * If the view was called with an unsupported HTTP method, this method will be called
	 *
	 * @param string $method_name
	 */
	protected function httpMethodNotAllowed(string $method_name) {
		$class_name = __CLASS__;		
		$message = "Method: [{$method_name}] Not Allowed in property " . "[\$httpMethodNames] on class [{$class_name}]";
		
		throw new MethodNotAllowedException($this->httpMethodNames, $message);
	}
	
	/**
	 * Passes parameters to the called method.
	 * the rest are defined in your route
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	protected function getRequestParameters(Request $request) {
		return $request->route()->parameters;
	}
	
}