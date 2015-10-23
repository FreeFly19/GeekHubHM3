<?php
namespace App;

class Application
{
    protected $controllers = [];

    public function get($pattern, $callback)
    {
        $this->controllers[$pattern] = $callback;
    }

    protected static function getPath($reqused_uri = null)
    {
        $reqused_uri = $reqused_uri ? $reqused_uri : $_SERVER['REQUEST_URI'];

        $uri = explode('?', $reqused_uri, 2);
        $path = explode('/', $uri[0]);

        foreach ($path as $i => $val) {
            if ($val == "") {
                unset($path[$i]);
            }
        }
        $path = array_values($path);
        return $path;
    }

    protected static function getParams($reqused_uri = null)
    {
        $reqused_uri = $reqused_uri ? $reqused_uri : $_SERVER['REQUEST_URI'];
        $uri = explode('?', $reqused_uri, 2);

        $params = [];

        if (isset($uri[1])) {
            $ps = explode('&', $uri[1]);
            if ($ps[0] == "") {
                $ps = [];
            }


            foreach ($ps as $param) {
                if (substr_count($param, "=") && $param[strlen($param - 1)] != "=") {
                    $param = explode("=", $param);
                    $params[$param[0]] = $param[1];
                } else {
                    $params[$param] = "";
                }
            }
        }
        return $params;
    }

    protected static function isEqualsPath($controllerPathPattern)
    {
        $path = static::getPath();

        $controllerPathPattern = static::getPath($controllerPathPattern);

        if (count($path) != count($controllerPathPattern)) {
            return false;
        }

        foreach ($controllerPathPattern as $n => $elem) {
            if (preg_match('|^\{(.*)\}$|', $elem)) {
                continue;
            }
            if ($elem != $path[$n]) {
                return false;
            }
        }
        return true;

    }

    protected static function getRequestPathVariables($pattern)
    {
        $result = [];

        $path = static::getPath();
        $pattern = static::getPath($pattern);

        foreach ($pattern as $n => $elem) {
            if (preg_match('|^\{(.*)\}$|', $elem)) {
                $param_name = substr($elem, 1, strlen($elem) - 2);
                $result[$param_name] = $path[$n];
            }
        }

        return $result;
    }

    public function run()
    {
        foreach ($this->controllers as $pattern => $controller) {
            if (static::isEqualsPath($pattern)) {
                $requst_arr = static::getRequestPathVariables($pattern);

                call_user_func_array($controller, $requst_arr);
                return;
            }
        }
        die("Error 404. This path have not a controller.");
    }
}
