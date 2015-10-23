<?php
namespace App;

class Application
{
    protected $controllers = [];

    public function get($pattern, $callback)
    {

    }

    protected function getPath($reqused_uri = null)
    {
        $reqused_uri = $reqused_uri ? $reqused_uri : $_SERVER['REQUEST_URI'];

        $uri = explode('?', $reqused_uri, 2);
        $path = explode('/', $uri[0]);

        foreach ($path as $i => $val)
            if ($val == "")
                unset($path[$i]);
        return $path;
    }

    protected function getParams($reqused_uri = null)
    {
        $reqused_uri = $reqused_uri ? $reqused_uri : $_SERVER['REQUEST_URI'];
        $uri = explode('?', $reqused_uri, 2);

        $params = [];

        if (isset($uri[1]))
        {
            $ps = explode('&', $uri[1]);
            if ($ps[0] == "")
                $ps = [];


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

    public function run()
    {
        var_dump($this->getPath());
        var_dump($this->getParams());
    }
}
