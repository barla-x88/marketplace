<?php

namespace app;

class Router {
    public array $getRoutes = [];
    public array $postRoutes = [];
    public Database $dbConnection;

    public function __construct()
    {
       $this->dbConnection = new Database(); 
    }

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve() {
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this); //also passing argument $this
        } else {
            echo "Page Not Found";
        }
    }

    public function renderView($view, $params = []) {

        //creating variables that are required in view, Notice double $
        foreach($params as $key => $value) {
            $$key = $value;
        }

        //put whatever is included in array buffer
        ob_start();
        include_once __DIR__."/views/$view.php";
        //get the arraybuffer content and delete the buffer
        $content = ob_get_clean();
        $cssFile = '/css/' . "$view" . '.css';
        //simply contains the html skelton, $content will display inside this file
        include_once __DIR__."/views/_layout.php";
    }

}