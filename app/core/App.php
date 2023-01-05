<?php
namespace App\Core;

class App {

    protected $controller = "Home";
    protected $method = "index";
    protected $page404 = false;
    protected $params = [];

    public function __construct() {
        $URL_ARRAY = $this->parseUrl();
        $this->getControllerFromUrl($URL_ARRAY);
        $this->getMethodFromUrl($URL_ARRAY);
        $this->getParamsFromUrl($URL_ARRAY);
    
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * 
     * @return array
     */ 
    private function parseUrl() {
        $REQUEST_URI = explode('/', substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 1));
        return $REQUEST_URI;
    }

    /**
     * @param array $url
     */
    private function getControllerFromUrl($url) {
        if ( !empty($url[0]) && isset($url[0]) ) {
            if ( file_exists('../App/controllers/' . ucfirst($url[0])  . '.php') ) {
                $this->controller = ucfirst($url[0]);
            } else {
                $this->page404 = true;
            }
        }
    
        require '../App/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();
    }

    /**
     * @param array $url
     */
    private function getMethodFromUrl($url) {
        if(!empty($url[1]) && isset($url[1])) {
           if(method_exists($this->controller, $url[1]) && !$this->page404) {
            $this->method = $url[1];
           } else {
            $this->method = 'pageNotFound';
           }
        }
    }

    /**
     * @param array $url
     */
    private function getParamsFromUrl($url) { 
        if(count($url) > 2) {
            $this->params = array_slice($url, 2);
        }
    }

}