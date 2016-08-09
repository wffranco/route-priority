<?php namespace Langaner\RoutePriority;

trait RouterTrait 
{
	/**
	 * Get the route dispatcher callback.
	 *
	 * @return \Closure
	 */
	protected function dispatchToRouter()
	{
		$this->router = $this->app['router'];
		
		if(!empty($this->middlewareGroups)) {
			foreach ($this->middlewareGroups as $key => $middleware) {
				$this->router->middlewareGroup($key, $middleware);
			}
		}		
		
		foreach ($this->routeMiddleware as $key => $middleware) {
			$this->router->middleware($key, $middleware);
		}

		foreach ($this->middlewareGroups as $key => $middleware) {
            $this->router->middlewareGroup($key, $middleware);
        }

		return parent::dispatchToRouter();
	}
}
