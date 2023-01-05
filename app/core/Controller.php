<?php
namespace app\Core;

class Controller {

    public $request;

    public function __construct()
    {
        $this->request = new Request;
    }
    
    /**
     * @param string $model
     */
    public function model($model) {
        require '../app/models/' . $model . '.php';
        $object = 'app\\models\\'. $model;
        return new $object();
    }

    /**
     * @param string $view
     * @param array $data
     */
    public function view(string $view, $data = []) {
        require '../app/views/'.$view.'.php';
    }
    
    public function pageNotFound() {
        $this->view('erro404');
    }
}