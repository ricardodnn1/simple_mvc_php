<?php

use App\Models\Tasks;
use App\Models\Users;
use app\Core\Controller;

class Task extends Controller {

    public function index() {
        $Tasks = $this->model('Tasks'); 
        $data = $Tasks::findAll();   
        $this->view('task/index', ['tasks' => $data]);
    }  
    
    /**
     * @method GET
     */
    public function create() {
        $Users = $this->model('Users');
        $dataUsers = $Users::findAll(); 
        $this->view('task/create', ['users' => $dataUsers]);
    }  

    /**
     * @method POST 
     */
    public function createTask() {
        $task = new Tasks();
        $task->title = $this->request->title;
        $task->category = $this->request->category;
        $task->status = $this->request->status;
        $task->users_id = $this->request->users_id;
        $task->create();
    }

}