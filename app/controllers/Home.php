<?php
use App\Core\Controller;

class Home extends Controller {

    public function index() {
        $Tasks = $this->model('Tasks');
        $data = $Tasks::findAll();
        $this->view('home/index', ['tasks' => $data]);
    }  

}