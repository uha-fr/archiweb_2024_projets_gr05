<?php
namespace UHA\Routing;

class Web {
    protected $routes = [];

    public function addRoute(string $method, string $url, \Closure $target) {
        // Use regular expression to match parameters in the URL
        $pattern = preg_replace('#/{(\w+)}#', '/(?<$1>[^/]+)', $url);
        $pattern = '#^' . $pattern . '$#';

        $this->routes[$method][$pattern] = $target;
    }

    public function processRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $pattern => $target) {
                // Check if the URL matches the pattern
                if (preg_match($pattern, $url, $matches)) {
                    // Remove the first element (full match) from $matches
                    array_shift($matches);

                    // Call the target closure with parameters
                    echo call_user_func_array($target, $matches);
                    exit;
                }
            }
        }

        throw new \Exception('Route not found');
    }
}
?>
