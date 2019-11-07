<?php

class Route {

    public static $routes = array();

    public static function set($route, $function)
    {
        self::$routes[] = $route;

        print_r(self::$routes);

        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }

	public static function parseUrl() {
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
    }
}