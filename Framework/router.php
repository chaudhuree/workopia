<?php
namespace Framework;
// use App\Controllers\ErrorController;


// use App\Controllers\ErrorController;

class Router
{
  protected $routes = [];

   /**
   * Add a new route
   *
   * @param string $method
   * @param string $uri
   * @param string $action
   * @return void
   */

   // action is like HomeController@index
   // so after explode, $controller = HomeController and $controllerMethod = index
  public function registerRoute($method, $uri, $action)
  {
    list($controller, $controllerMethod) = explode('@', $action);
    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller,
      'controllerMethod' => $controllerMethod
    ];
  }

  /**
   * Add a GET route
   * 
   * @param string $uri
   * @param string $controller
   * @return void
   */
  public function get($uri, $controller)
  {
    $this->registerRoute('GET', $uri, $controller);
  }

  /**
   * Add a POST route
   * 
   * @param string $uri
   * @param string $controller
   * @return void
   */
  public function post($uri, $controller)
  {
    $this->registerRoute('POST', $uri, $controller);
  }

  /**
   * Add a PUT route
   * 
   * @param string $uri
   * @param string $controller
   * @return void
   */
  public function put($uri, $controller)
  {
    $this->registerRoute('PUT', $uri, $controller);
  }

  /**
   * Add a DELETE route
   * 
   * @param string $uri
   * @param string $controller
   * @return void
   */
  public function delete($uri, $controller)
  {
    $this->registerRoute('DELETE', $uri, $controller);
  }

  /**
   * Load error page
   * @param int $httpCode
   *  
   * @return void
   */
  // public function error($httpCode = 404)
  // {
  //   http_response_code($httpCode);
  //   loadView("error/{$httpCode}");
  //   exit;
  // }

  /**
   * Route the request
   * 
   * @param string $uri
   * @param string $method
   * @return void
   */
  // explanation is for HomeController@index
  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === $method) {
        $controller = 'App\\Controllers\\' . $route['controller']; 
        // \\ is an escape character, so it's like App\Controllers\HomeController

        // $controller = App\Controllers\HomeController;
        $controllerMethod = $route['controllerMethod'];
        // $controllerMethod = index;

        // Instatiate the controller and call the method
        $controllerInstance = new $controller(); 
        // new App\Controllers\HomeController();
        $controllerInstance->$controllerMethod();
        // $controllerInstance->index();
        return;
      }
    }
    \App\Controllers\ErrorController::notFound();
    // $this->error();
  }
}
